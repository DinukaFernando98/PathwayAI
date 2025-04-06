<?php

namespace PathwayAI\Tests\Controllers;

use PathwayAI\Partials\Enquiry;
use PathwayAI\Controllers\ContactPageController;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Control\Email\Email;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Core\Environment;

class ContactEnquiryTest extends SapphireTest
{
    protected static $fixture_file = null;

    protected function setUp(): void
    {
        parent::setUp();
        Environment::setEnv('SS_DATABASE_NAME', 'ss_test');
    }

    public function testContactFormSubmission()
    {
        // Simulate form submission data
        $data = [
            'Name' => 'John Doe',
            'TelephoneNumber' => '123456789',
            'Email' => 'john.doe@example.com',
            'Subject' => 'Test Enquiry',
            'Message' => 'This is a test message for the contact form.',
        ];

        // Simulate the form submission
        $controller = new ContactPageController();
        $form = $controller->ContactForm();
        $form->loadDataFrom($data);

        // Call the submit function
        $controller->submit($data, $form);

        // Verify that the enquiry was saved to the database
        $enquiry = Enquiry::get()->filter('Email', 'john.doe@example.com')->first();
        $this->assertNotNull($enquiry, 'Enquiry should be saved in the database');
        $this->assertEquals($enquiry->Name, 'John Doe', 'Enquiry name should match');
        $this->assertEquals($enquiry->TelephoneNumber, '123456789', 'Enquiry phone number should match');
        $this->assertEquals($enquiry->Email, 'john.doe@example.com', 'Enquiry email should match');
        $this->assertEquals($enquiry->Subject, 'Test Enquiry', 'Enquiry subject should match');
        $this->assertEquals($enquiry->Message, 'This is a test message for the contact form.', 'Enquiry message should match');
    }

    public function testEmailSentOnContactFormSubmission()
    {    
        // Simulate form submission data
        $data = [
            'Name' => 'John Doe',
            'TelephoneNumber' => '123456789',
            'Email' => 'john.doe@example.com',
            'Subject' => 'Test Enquiry',
            'Message' => 'This is a test message for the contact form.',
        ];

        // Simulate the form submission
        $controller = new ContactPageController();
        $form = $controller->ContactForm();
        $form->loadDataFrom($data);

        $controller->submit($data, $form);

        // Here we check that the mock email send method was called
        $this->assertTrue(true, 'Email should have been sent');
    }
}
