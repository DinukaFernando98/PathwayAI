<?php

namespace PathwayAI\Controllers;

use PathwayAI\Partials\EventRegistration;
use PathwayAI\Partials\User;
use SilverStripe\Control\HTTPRequest;
use PathwayAI\Partials\Event;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;

class JobController extends \PageController
{
    public function index(HTTPRequest $request)
    {
        $encodedID = $request->param('ObfuscatedID');
        $eventID = Event::decodeObfuscatedID($encodedID);
        $event = Event::get()->byID($eventID);

        if (!$event) {
            return $this->httpError(404, 'Event not found');
        }

        return $this->customise([
            'Event' => $event
        ])->renderWith(['Event_show', 'Page']);
    }
    private static $allowed_actions = ['index', 'EventForm', 'submit'];


	public function EventForm()
	{
        $encodedID = $this->getRequest()->param('ObfuscatedID');
        $eventID = Event::decodeObfuscatedID($encodedID);
        
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

            HiddenField::create('EventID', '', $eventID)
        );

        $actions = new FieldList(
            FormAction::create('submit', 'Register now')
                ->setAttribute('class', 'mt-4 btn-form btn blue')
        );

        $form = new Form($this, 'EventRegistrationForm', $fields, $actions);

		$form = Form::create($this, 'EventForm', $fields, $actions);
        $form->setFormMethod('POST')->setFormAction('/event/' . $this->getRequest()->param('ObfuscatedID') . '/submit');

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
        
        $registration = EventRegistration::create();
        $registration->UserID = $user->ID;
        $registration->EventID = $data['EventID'];
        $registration->write();

		$this->redirect("/thank-you");
	}

}
