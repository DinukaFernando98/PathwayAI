<?php
namespace PathwayAI\Controllers;

use PathwayAI\Partials\JobApplication;
use PathwayAI\Partials\User;
use PathwayAI\Partials\Vacancy;
use SilverStripe\Assets\Upload;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FileField;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\File;

class JobController extends \PageController
{
    public function index(HTTPRequest $request)
    {
        $encodedID = $request->param('ObfuscatedID');
        $vacancyID = Vacancy::decodeObfuscatedID($encodedID);
        $vacancy = Vacancy::get()->byID($vacancyID);

        if (!$vacancy) {
            return $this->httpError(404, 'Job not found');
        }

        return $this->customise([
            'Job' => $vacancy
        ])->renderWith(['Job_show', 'Page']);
    }
    private static $allowed_actions = ['index', 'JobForm', 'submit'];


	public function JobForm()
	{
        $encodedID = $this->getRequest()->param('ObfuscatedID');
        $vacancyID = Vacancy::decodeObfuscatedID($encodedID);
        
        $fields = new FieldList(
            TextField::create('FirstName', 'First Name *')
                ->setAttribute('class', 'form-control')
                ->setAttribute('id', 'first-name')
                ->setAttribute('required', true),
                
            TextField::create('LastName', 'Last Name *')
                ->setAttribute('class', 'form-control')
                ->setAttribute('id', 'last-name')
                ->setAttribute('required', true),

            EmailField::create('Email', 'Email *')
                ->setAttribute('class', 'form-control')
                ->setAttribute('id', 'the-email')
                ->setAttribute('required', true),

            TextField::create('PhoneNumber', 'Phone Number')
                ->setAttribute('class', 'form-control')
                ->setAttribute('id', 'phone-number'),

            FileField::create('CV', 'Upload CV (PDF/DOC)')
                ->setAttribute('class', 'mt-4'),

            HiddenField::create('vacancyID', '', $vacancyID)
        );

        $actions = new FieldList(
            FormAction::create('submit', 'Apply now')
                ->setAttribute('class', 'mt-4 btn-form btn blue')
        );

        $form = new Form($this, 'JobApplicationForm', $fields, $actions);

		$form = Form::create($this, 'JobForm', $fields, $actions);
        $form->setFormMethod('POST')->setEncType('multipart/form-data')
             ->setFormAction('/job/' . $this->getRequest()->param('ObfuscatedID') . '/submit');

        return $form;
	}

	public function submit($data, Form $form = null)
	{
		$user = User::get()->filter('Email', $data['Email'])->first();
        if (!$user) {
            $user = User::create();
            $user->FirstName = $data['FirstName'];
            $user->LastName = $data['LastName'];
            $user->Email = $data['Email'];
            $user->Phone = $data['PhoneNumber'];
            $user->write();
        }
        
        $registration = JobApplication::create();
        $registration->UserID = $user->ID;
        $registration->JobID = $data['vacancyID'];

        // Handle CV Upload
        if (isset($_FILES['CV']) && $_FILES['CV']['error'] === 0) {
            $upload = Injector::inst()->create(Upload::class);
            $file = new File();
            $upload->loadIntoFile($_FILES['CV'], $file);
            $registration->CVID = $file->ID;
        }

        $registration->write();

		$this->redirect("/thank-you");
	}
}
