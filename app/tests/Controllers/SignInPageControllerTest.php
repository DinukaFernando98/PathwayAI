<?php

namespace PathwayAI\Tests\Controllers;

use SilverStripe\Core\Environment;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Control\Session;
use PathwayAI\Controllers\SignInPageController;
use PathwayAI\Partials\User;

class SignInPageControllerTest extends SapphireTest
{
    protected static $fixture_file = null;

    protected function setUp(): void
    {
        parent::setUp();

        Environment::setEnv('SS_DATABASE_NAME', 'ss_test');
        User::get()->removeAll();

        // Create a dummy user
        $user = User::create();
        $user->Email = 'test@example.com';
        $user->Password = password_hash('test1234', PASSWORD_DEFAULT);
        $user->write();
    }

    public function testDoSignInSuccess()
    {
        $controller = new SignInPageController();
        $request = new HTTPRequest('POST', '/sign-in');
        $session = new Session([]);
        $request->setSession($session);
        $controller->setRequest($request);

        $form = $controller->SignInForm();
        $data = [
            'Email' => 'test@example.com',
            'Password' => 'test1234',
        ];

        $response = $controller->doSignIn($data, $form);
        $this->assertEquals('test@example.com', User::get()->first()->Email);
        $this->assertNotNull($session->get('LoggedInUserID'));
    }

    public function testDoSignInFail()
    {
        $controller = new SignInPageController();
        $request = new HTTPRequest('POST', '/sign-in');
        $session = new Session([]);
        $request->setSession($session);
        $controller->setRequest($request);

        $form = $controller->SignInForm();
        $data = [
            'Email' => 'wrong@example.com',
            'Password' => 'wrongpassword',
        ];

        $response = $controller->doSignIn($data, $form);
        $this->assertNull($session->get('LoggedInUserID'));
    }
}
