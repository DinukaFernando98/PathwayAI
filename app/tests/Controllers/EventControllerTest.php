<?php

namespace PathwayAI\Tests\Controllers;

use SilverStripe\Dev\SapphireTest;
use PathwayAI\Partials\User;
use PathwayAI\Partials\EventRegistration;
use PathwayAI\Partials\Event;
use SilverStripe\Assets\Image;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Control\Session;

class EventControllerTest extends SapphireTest
{
    protected function setUp(): void
    {
        parent::setUp();

        // Create a dummy user
        $this->user = User::create();
        $this->user->FirstName = 'John';
        $this->user->LastName = 'Doe';
        $this->user->Email = 'john.doe@example.com';
        $this->user->Phone = '1234567890';
        $this->user->Password = 'password123';
        $this->user->write();

        // Create a dummy event
        $this->event = Event::create();
        $this->event->Title = 'Sample Event';
        $this->event->Type = 'Workshop';
        $this->event->Content = 'This is a sample event for testing purposes.';
        $this->event->Date = '2025-05-20';
    

        // Save the event
        $this->event->write();
    }

    public function testEventRegistration()
    {
        // Simulate event registration
        $registration = EventRegistration::create();
        $registration->UserID = $this->user->ID;
        $registration->EventID = $this->event->ID;
        $registration->write();

        // Fetch the registration from the database
        $registered = EventRegistration::get()->filter([
            'UserID' => $this->user->ID,
            'EventID' => $this->event->ID
        ])->first();

        // Assert that the registration was successfully created
        $this->assertNotNull($registered);
        $this->assertEquals($this->user->ID, $registered->UserID);
        $this->assertEquals($this->event->ID, $registered->EventID);
    }
}
