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

class SignInPageController extends \PageController
{
	public function index()
	{
		return $this->renderWith([
			'SignInPage',
			'Page'
		]);
	}

	private static $allowed_actions = ['SignInForm'];

    protected function init()
    {
        parent::init();
        $session = $this->getRequest()->getSession();
        $session->clear('LoggedInUserID');
    }

    public function SignInForm()
    {
        $fields = FieldList::create(
            EmailField::create('Email', 'Email')
                ->setAttribute('class', 'mb-4 form-control')
                ->setAttribute('required', true),

            PasswordField::create('Password', 'Password')
                ->setAttribute('class', 'form-control')
                ->setAttribute('required', true)
                ->setAttribute('style', 'border: none; border-bottom: 1px solid var(--bs-green);')
        );

        $actions = FieldList::create(
            FormAction::create('doSignIn', 'Sign In')
                ->setAttribute('class', 'mt-5 btn-form btn blue')
        );

        $validator = RequiredFields::create('Email', 'Password');

		$form = Form::create($this, 'SignInForm', $fields, $actions, $validator);

		return $form;
    }

    public function doSignIn($data, Form $form)
    {
        $user = User::get()->filter('Email', $data['Email'])->first();

        if (!$user || !password_verify($data['Password'], $user->Password)) {
            $form->sessionMessage('Invalid credentials.', 'bad');
            return $this->redirectBack();
        }

        $session = $this->getRequest()->getSession();
        $session->set('LoggedInUserID', $user->ID);

        return $this->redirect('/my-profile');
    }

}
