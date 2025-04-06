<?php

namespace PathwayAI\Tests\Controllers;

use SilverStripe\Dev\FunctionalTest;
use PathwayAI\Partials\User;
use SilverStripe\Core\Environment;

class ProfilePageControllerTest extends FunctionalTest
{
    protected static $fixture_file = null;

    protected function setUp(): void
    {
        parent::setUp();
        Environment::setEnv('SS_DATABASE_NAME', 'ss_test');
    }

    public function testUserProfileUpdate()
    {
        // Create a new user
        $user = User::create();
        $user->FirstName = 'InitialFirstName';
        $user->LastName = 'InitialLastName';
        $user->Email = 'user@example.com';
        $user->Phone = '1234567890';
        $user->write();

        // Verify the user was created
        $this->assertNotNull($user->ID);
        $this->assertEquals('InitialFirstName', $user->FirstName);
        $this->assertEquals('InitialLastName', $user->LastName);
        $this->assertEquals('user@example.com', $user->Email);
        $this->assertEquals('1234567890', $user->Phone);

        // Update user profile information
        $user->FirstName = 'UpdatedFirstName';
        $user->LastName = 'UpdatedLastName';
        $user->Email = 'updateduser@example.com';
        $user->Phone = '0987654321';
        $user->write();

        // Retrieve the updated user from the database
        $updatedUser = User::get()->byID($user->ID);

        // Verify the user's profile was updated
        $this->assertEquals('UpdatedFirstName', $updatedUser->FirstName);
        $this->assertEquals('UpdatedLastName', $updatedUser->LastName);
        $this->assertEquals('updateduser@example.com', $updatedUser->Email);
        $this->assertEquals('0987654321', $updatedUser->Phone);
    }
}
