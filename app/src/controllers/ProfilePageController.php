<?php

namespace PathwayAI\Controllers;

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

    public function ProfileForm()
    {
        $user = $this->getLoggedInUser();

        $fields = FieldList::create(
            TextField::create('FirstName', 'First Name')->setValue($user->FirstName)
                ->setAttribute('class', 'form-control'),

            TextField::create('LastName', 'Last Name')->setValue($user->LastName)
                ->setAttribute('class', 'form-control'),

            EmailField::create('Email', 'Email')->setValue($user->Email)
                ->setAttribute('class', 'form-control'),

            TextField::create('Phone', 'Phone')->setValue($user->Phone)
                ->setAttribute('class', 'mb-4 form-control'),

            FileField::create('ProfilePhoto', 'Upload Profile Photo')
                ->setAttribute('class', 'mt-4 mb-4'),

			FileField::create('CV', 'Upload CV (PDF/DOC)')
                ->setAttribute('class', 'mt-4')
        );

        $actions = FieldList::create(
            FormAction::create('doUpdateProfile', 'Update Profile')
                ->setAttribute('class', 'mt-5 btn-form btn btn--bs-teal')
        );

        $validator = RequiredFields::create('FirstName', 'LastName', 'Email');

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
