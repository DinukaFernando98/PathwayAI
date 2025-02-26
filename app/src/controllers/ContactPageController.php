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
		$fields = new FieldList(
			$name = new TextField('Name', 'Name*'),
			$telephone_number = new TextField('TelephoneNumber', 'Phone*'),
			$email_address = new EmailField('Email', 'Email*'),
			$subject = new TextField('Subject', 'Subject*'),
			$message = new TextareaField('Message', 'Message*')
		);

		$name->setAttribute('placeholder', 'Name');
		$telephone_number->setAttribute('placeholder', 'Phone');
		$email_address->setAttribute('placeholder', 'Email');
		$subject->setAttribute('placeholder', 'Subject');
		$message->setAttribute('placeholder', 'Message');

		$actions = new FieldList(
			new FormAction('submit', 'Send Message')
		);

		$validator = RequiredFields::create('Name', 'TelephoneNumber', 'Email', 'Subject', 'Message');

		$form = Form::create($this, 'ContactForm', $fields, $actions, $validator)->enableSpamProtection();

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
		$email->send();
		$enquiry = Enquiry::create($data);
		$enquiry->write();

		$this->redirect($this->Link("/?success=contact"));
	}

	public function Success()
	{
		return isset($_REQUEST['success']) && $_REQUEST['success'] == "contact";
	}
}
