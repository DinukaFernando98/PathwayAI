<?php

namespace PathwayAI\Controllers;

use PathwayAI\Partials\User;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\PasswordField;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextField;

class SignUpPageController extends \PageController
{
	public function index()
	{
		return $this->renderWith([
			'SignUpPage',
			'Page'
		]);
	}

	private static $allowed_actions = ['SignUpForm'];

    public function SignUpForm()
    {
        $fields = FieldList::create(
            TextField::create('FirstName', 'First Name')
                ->setAttribute('class', 'form-control')
                ->setAttribute('required', true),
            
            TextField::create('LastName', 'Last Name')
                ->setAttribute('class', 'form-control')
                ->setAttribute('required', true),

			TextField::create('PhoneNumber', 'Phone Number')
				->setAttribute('class', 'form-control')
				->setAttribute('id', 'phone-number'),

            EmailField::create('Email', 'Email')
                ->setAttribute('class', 'mt-4 form-control')
                ->setAttribute('required', true),

            PasswordField::create('Password', 'Password')
                ->setAttribute('class', 'mt-4 form-control')
                ->setAttribute('required', true)
				->setAttribute('style', 'border: none; border-bottom: 1px solid var(--bs-green);')
        );

        $actions = FieldList::create(
            FormAction::create('doSignUp', 'Sign Up')
                ->setAttribute('class', 'mt-5 btn-form btn blue')
        );

        $validator = RequiredFields::create('FirstName', 'LastName', 'Email', 'Password');

		$form = Form::create($this, 'SignUpForm', $fields, $actions, $validator);

		return $form;
    }

    public function doSignUp($data, Form $form)
    {
        $existingUser = User::get()->filter('Email', $data['Email'])->first();

        if ($existingUser) {
            $form->sessionMessage('Email already exists.', 'bad');
            return $this->redirectBack();
        }

        $user = User::create();
        $user->FirstName = $data['FirstName'];
        $user->LastName = $data['LastName'];
        $user->Email = $data['Email'];
		$user->Phone = $data['PhoneNumber'];
        $user->Password = password_hash($data['Password'], PASSWORD_DEFAULT);
        $user->write();

        $session = $this->getRequest()->getSession();
        $session->set('LoggedInUserID', $user->ID);

        return $this->redirect('/my-profile');
    }
}
