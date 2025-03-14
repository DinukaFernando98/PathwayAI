<?php

namespace PathwayAI\Controllers;

use PathwayAI\Partials\Enquiry;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Control\Email\Email;

class ContactPageController extends \PageController
{
	public function index()
	{
		return $this->renderWith([
			'ContactPage',
			'Page'
		]);
	}

	private static $allowed_actions = ['ContactForm'];

	public function ContactForm()
	{
		$fields = FieldList::create(
			TextField::create('Name', 'Name*')
				->setAttribute('class', 'form-control')
				->setAttribute('required', true),
		
			TextField::create('TelephoneNumber', 'Phone*')
				->setAttribute('class', 'form-control')
				->setAttribute('required', true),
		
			EmailField::create('Email', 'Email*')
				->setAttribute('class', 'form-control')
				->setAttribute('required', true),
		
			TextField::create('Subject', 'Subject*')
				->setAttribute('class', 'form-control')
				->setAttribute('required', true),
		
			TextareaField::create('Message', 'Message*')
				->setAttribute('class', 'form-control')
				->setAttribute('rows', 4)
				->setAttribute('required', true)
		);
		
		$actions = FieldList::create(
			FormAction::create('submit', 'Send Message')
				->setAttribute('class', 'mt-5 btn-form btn blue')
		);

		$validator = RequiredFields::create('Name', 'TelephoneNumber', 'Email', 'Subject', 'Message');

		$form = Form::create($this, 'ContactForm', $fields, $actions, $validator);

		return $form;
	}

	public function submit($data, $form)
	{
		$email = new Email();
		$email->setTo('test@test.com');
		$email->setFrom('info@test.com', 'PathwayAI');
		$email->setReplyTo($data['Email']);
		$email->setSubject("Contact enquiry from the PathwayAI website.");

		$messageBody ="
            <p><strong>Name:</strong> {$data['Name']}</p>
            <p><strong>Telephone:</strong> {$data['TelephoneNumber']}</p>
            <p><strong>Email:</strong> {$data['Email']}</p>
            <p><strong>Subject:</strong> {$data['Subject']}</p>
            <p><strong>Message:</strong> {$data['Message']}</p>
        ";

		$email->setBody($messageBody);
		//$email->send();
		$enquiry = Enquiry::create($data);
		$enquiry->write();

		$this->redirect("/thank-you-for-your-enquiry");
	}

}
