<?php

namespace PathwayAI\Tests\Controllers;

use SilverStripe\Core\Environment;
use SilverStripe\Dev\SapphireTest;
use PathwayAI\Partials\User;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Control\Session;
use PathwayAI\Controllers\SignUpPageController;

class SignUpPageControllerTest extends SapphireTest 
{
    protected static $fixture_file = null;

    protected function setUp(): void 
    {
        parent::setUp();
        Environment::setEnv('SS_DATABASE_NAME', 'ss_test');

        // Remove all existing users
        User::get()->removeAll();
    }

    public function testDoSignUpSuccess()
    {
        $controller = new SignUpPageController();
        $request = new HTTPRequest('POST', '/sign-up');
        $session = new Session([]);
        $request->setSession($session);
        $controller->setRequest($request);

        $form = $controller->SignUpForm();
        $data = [
            'FirstName' => 'John',
            'LastName' => 'Doe',
            'Email' => 'existinguser@example.com',
            'PhoneNumber' => '1234567890',
            'Password' => 'password123'
        ];

        $response = $controller->doSignUp($data, $form);

        // Assert whethe user is created and their email is saved
        $user = User::get()->filter('Email', 'existinguser@example.com')->first();
        $this->assertNotNull($user);
    }

    public function testDoSignUpFail()
    {
        $controller = new SignUpPageController();
        $request = new HTTPRequest('POST', '/sign-up');
        $session = new Session([]);
        $request->setSession($session);
        $controller->setRequest($request);

        $form = $controller->SignUpForm();
        $data = [
            'FirstName' => 'John',
            'LastName' => 'Doe',
            'Email' => 'existinguser@example.com',
            'PhoneNumber' => '1234567890',
            'Password' => 'password123'
        ];

        // Create an existing user with the same email for the failure case
        $user = User::create();
        $user->Email = 'existinguser@example.com';
        $user->Password = password_hash('password123', PASSWORD_DEFAULT);
        $user->write();

        $controller->doSignUp($data, $form);
        $fetchedUser = User::get()->filter('Email', $data['Email'])->first();

        // Check the user email is already existing 
        $this->assertEquals($user->ID, $fetchedUser->ID);
        $this->assertEquals(1, User::get()->filter('Email', $data['Email'])->count());
    }
}
