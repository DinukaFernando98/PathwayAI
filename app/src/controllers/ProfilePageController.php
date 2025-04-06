<?php

namespace PathwayAI\Controllers;

use PathwayAI\Partials\JobApplication;
use PathwayAI\Partials\QuizSubmission;
use PathwayAI\Partials\User;
use PathwayAI\Partials\EventRegistration;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Assets\File;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FileField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextField;
use SilverStripe\Security\Security;
use SilverStripe\Forms\DropdownField;

class ProfilePageController extends \PageController
{
    private static $allowed_actions = ['ProfileForm', 'doUpdateProfile'];

    protected function init()
    {
        parent::init();

		$session = $this->getRequest()->getSession();
		$userID = $session->get('LoggedInUserID');
	
		// Check if user is logged in, if not, redirect to sign-in
		if (!$userID) {
			return $this->redirect('/sign-in');
		}

		if (!session_id()) {
			session_start();
		}
    }

    public function index(HTTPRequest $request)
    {
        return $this->renderWith([
            'ProfilePage',
            'Page'
        ]);
    }

    public function getLoggedInUser()
    {
		$session = $this->getRequest()->getSession();

		if (!session_id()) {
			session_start();
		}
	
		$userID = $session->get('LoggedInUserID');
		if ($userID) {
			return User::get()->byID($userID);
		}
		return null;
    }

    public function getRegisteredEvents()
    {
        $user = $this->getLoggedInUser();
        return EventRegistration::get()->filter('UserID', $user->ID);
    }

    public function getQuizzes()
    {
        $user = $this->getLoggedInUser();
    
        if (!$user) {
            return null;
        }
    
        $submissions = QuizSubmission::get()
            ->filter('UserID', $user->ID)
            ->sort('SubmittedDate', 'DESC');
    
        foreach ($submissions as $submission) {
            $totalQuestions = $submission->QuizPage()->Questions()->count();
            $percentage = $totalQuestions > 0 ? round(($submission->Score / $totalQuestions) * 100, 2) : 0;
    
            if ($percentage >= 90) {
                $grade = 'A';
            } elseif ($percentage >= 80) {
                $grade = 'B';
            } elseif ($percentage >= 70) {
                $grade = 'C';
            } elseif ($percentage >= 60) {
                $grade = 'D';
            } else {
                $grade = 'F';
            }
    
            // Attach computed fields to each submission
            $submission->Percentage = $percentage;
            $submission->Grade = $grade;
        }
    
        return $submissions;
    }

    public function getVacancies()
    {
        $user = $this->getLoggedInUser();
        return JobApplication::get()->filter('UserID', $user->ID)->sort('Created', 'DESC');
    }


    public function ProfileForm()
    {
        $user = $this->getLoggedInUser();

        $positions = [
            'Business Management' => [
                'Intern' => 'Intern',
                'Junior Manager' => 'Junior Manager',
                'Assistant Manager' => 'Assistant Manager',
                'Manager' => 'Manager',
                'Senior Manager' => 'Senior Manager',
                'Lead Manager' => 'Lead Manager',
                'Department Head' => 'Department Head',
                'General Manager' => 'General Manager',
                'Executive Manager' => 'Executive Manager',
                'Vice President' => 'Vice President',
                'Senior Vice President' => 'Senior Vice President',
                'Chief Operating Officer (COO)' => 'Chief Operating Officer (COO)',
                'Chief Executive Officer (CEO)' => 'Chief Executive Officer (CEO)'
            ],
            'Accounting' => [
                'Intern' => 'Intern',
                'Junior Accountant' => 'Junior Accountant',
                'Accountant' => 'Accountant',
                'Senior Accountant' => 'Senior Accountant',
                'Accounting Supervisor' => 'Accounting Supervisor',
                'Accounting Manager' => 'Accounting Manager',
                'Finance Manager' => 'Finance Manager',
                'Senior Finance Manager' => 'Senior Finance Manager',
                'Financial Controller' => 'Financial Controller',
                'Finance Director' => 'Finance Director',
                'Vice President of Finance' => 'Vice President of Finance',
                'Chief Financial Officer (CFO)' => 'Chief Financial Officer (CFO)'
            ],
            'Information Technology' => [
                'Intern' => 'Intern',
                'Junior Developer' => 'Junior Developer',
                'Developer' => 'Developer',
                'Senior Developer' => 'Senior Developer',
                'Lead Developer' => 'Lead Developer',
                'Software Engineer' => 'Software Engineer',
                'Senior Software Engineer' => 'Senior Software Engineer',
                'Tech Lead' => 'Tech Lead',
                'Engineering Manager' => 'Engineering Manager',
                'Software Architect' => 'Software Architect',
                'Engineering Director' => 'Engineering Director',
                'Vice President of Engineering' => 'Vice President of Engineering',
                'Chief Technology Officer (CTO)' => 'Chief Technology Officer (CTO)'
            ],
            'Human Resources' => [
                'Intern' => 'Intern',
                'Junior HR Officer' => 'Junior HR Officer',
                'HR Officer' => 'HR Officer',
                'Senior HR Officer' => 'Senior HR Officer',
                'HR Manager' => 'HR Manager',
                'Senior HR Manager' => 'Senior HR Manager',
                'HR Director' => 'HR Director',
                'VP of HR' => 'VP of HR',
                'Chief Human Resources Officer (CHRO)' => 'Chief Human Resources Officer (CHRO)'
            ],
            'Engineering' => [
                'Intern' => 'Intern',
                'Junior Engineer' => 'Junior Engineer',
                'Engineer' => 'Engineer',
                'Senior Engineer' => 'Senior Engineer',
                'Lead Engineer' => 'Lead Engineer',
                'Principal Engineer' => 'Principal Engineer',
                'Engineering Manager' => 'Engineering Manager',
                'Senior Engineering Manager' => 'Senior Engineering Manager',
                'Director of Engineering' => 'Director of Engineering',
                'VP of Engineering' => 'VP of Engineering',
                'Chief Engineering Officer (CEO)' => 'Chief Engineering Officer (CEO)'
            ],
            'Architecture' => [
                'Intern' => 'Intern',
                'Junior Architect' => 'Junior Architect',
                'Architect' => 'Architect',
                'Senior Architect' => 'Senior Architect',
                'Lead Architect' => 'Lead Architect',
                'Principal Architect' => 'Principal Architect',
                'Senior Principal Architect' => 'Senior Principal Architect',
                'Director of Architecture' => 'Director of Architecture',
                'VP of Architecture' => 'VP of Architecture',
                'Chief Architect' => 'Chief Architect'
            ]
        ];
        

        $selectedArea = $user->InterestedArea;
        $selectedPositions = isset($positions[$selectedArea]) ? $positions[$selectedArea] : [];

        $fields = FieldList::create(
            TextField::create('FirstName', 'First Name')->setValue($user->FirstName)
                ->setAttribute('class', 'form-control'),

            TextField::create('LastName', 'Last Name')->setValue($user->LastName)
                ->setAttribute('class', 'form-control'),

            EmailField::create('Email', 'Email')->setValue($user->Email)
                ->setAttribute('class', 'form-control'),

            TextField::create('Phone', 'Phone')->setValue($user->Phone)
                ->setAttribute('class', 'mb-4 form-control'),

            DropdownField::create('EntryLevel', 'Entry Level', [
                'School Leaver' => 'School Leaver',
                'Undergraduate' => 'Undergraduate',
                'Postgraduate' => 'Postgraduate',
                'Masters' => 'Masters',
                'Doctorate' => 'Doctorate'
            ])->setValue($user->EntryLevel)
              ->setAttribute('class', 'form-control')
              ->setEmptyString('Select your entry level'),
    
            DropdownField::create('InterestedArea', 'Interested Area', [
                'Business Management' => 'Business Management',
                'Accounting' => 'Accounting',
                'Information Technology' => 'Information Technology',
                'Human Resources' => 'Human Resources',
                'Engineering' => 'Engineering',
                'Architecture' => 'Architecture',
                'Fashion Design' => 'Fashion Design',
                'Other' => 'Other'
            ])->setValue($user->InterestedArea)
              ->setAttribute('class', 'form-control')
              ->setEmptyString('Select your area of interest'),
                
              DropdownField::create('InterestedPosition', 'Interested Position', $selectedPositions)
              ->setValue($user->InterestedPosition)
              ->setAttribute('class', 'form-control')
              ->setEmptyString('Select your position')
              ->setHasEmptyDefault(true),

            FileField::create('ProfilePhoto', 'Upload Profile Photo')
                ->setAttribute('class', 'mt-4 mb-4'),

			FileField::create('CV', 'Upload CV (PDF/DOC)')
                ->setAttribute('class', 'mt-4')
        );

        $actions = FieldList::create(
            FormAction::create('doUpdateProfile', 'Update Profile')
                ->setAttribute('class', 'mt-5 btn-form btn btn--bs-teal')
        );

        $validator = RequiredFields::create('FirstName', 'LastName', 'Email', 'EntryLevel', 'InterestedArea');

        return Form::create($this, 'ProfileForm', $fields, $actions, $validator)
            ->setFormMethod('POST')
            ->setEncType('multipart/form-data');
    }

    public function doUpdateProfile($data, Form $form)
    {
		$session = $this->getRequest()->getSession();
		$user = $this->getLoggedInUser();
	
		if (!$user) {
			return $this->redirect('/sign-in');
		}
	
		if (!session_id()) {
			session_start();
			$session->set('LoggedInUserID', $user->ID);
		}

        $user = $this->getLoggedInUser();

        $user->FirstName = $data['FirstName'];
        $user->LastName = $data['LastName'];
        $user->Email = $data['Email'];
        $user->Phone = $data['Phone'];
        $user->EntryLevel = $data['EntryLevel'];
        $user->InterestedArea = $data['InterestedArea'];

        $user->InterestedPosition = $data['InterestedPosition'];

        // Handle Profile Photo Upload
        if (!empty($_FILES['ProfilePhoto']['name'])) {
            $profilePhoto = Image::create();
            $profilePhoto->setFromLocalFile($_FILES['ProfilePhoto']['tmp_name'], $_FILES['ProfilePhoto']['name']);
            $profilePhoto->write();
            $user->ProfilePhotoID = $profilePhoto->ID;
        }

        // Handle CV Upload
        if (!empty($_FILES['CV']['name'])) {
            $cv = File::create();
            $cv->setFromLocalFile($_FILES['CV']['tmp_name'], $_FILES['CV']['name']);
            $cv->write();
            $user->CVID = $cv->ID;
        }

        $user->write();
		$session->set('LoggedInUserID', $user->ID);
        $form->sessionMessage('Profile updated successfully!', 'good');

        return $this->redirectBack();
    }
}
