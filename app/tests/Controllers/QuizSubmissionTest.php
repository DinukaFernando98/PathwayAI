<?php

namespace PathwayAI\Tests\Controllers;

use PathwayAI\Partials\QuizSubmission;
use PathwayAI\Partials\User;
use PathwayAI\Models\Page\QuizPage;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\ORM\ValidationException;
use SilverStripe\Core\Environment;

class QuizSubmissionTest extends SapphireTest
{
    protected static $fixture_file = null;

    protected function setUp(): void
    {
        parent::setUp();
        Environment::setEnv('SS_DATABASE_NAME', 'ss_test');
    }

    public function testQuizSubmission()
    {
        // Create a quiz page
        $quizPage = QuizPage::create();
        $quizPage->Title = 'Sample Quiz';
        $quizPage->write();

        // Create a user
        $user = User::create();
        $user->FirstName = 'John';
        $user->LastName = 'Doe';
        $user->Email = 'john.doe@example.com';
        $user->write();

        // Simulate submitting the quiz
        $quizSubmission = QuizSubmission::create();
        $quizSubmission->UserID = $user->ID;
        $quizSubmission->QuizPageID = $quizPage->ID;
        $quizSubmission->Score = 80;  // Simulated score
        $quizSubmission->SubmittedDate = '2025-04-06 12:00:00'; // Simulate a submission date
        $quizSubmission->write();

        // Test that the submission has been written to the database
        $this->assertNotNull($quizSubmission->ID, 'Quiz submission was created successfully');
        $this->assertEquals($quizSubmission->Score, 80, 'Quiz submission score matches');
        $this->assertEquals($quizSubmission->UserID, $user->ID, 'User is correct for quiz submission');
        $this->assertEquals($quizSubmission->QuizPageID, $quizPage->ID, 'Quiz page ID is correct');

        // Test that the quiz submission returns the correct submission information
        $retrievedSubmission = QuizSubmission::get()->byID($quizSubmission->ID);
        $this->assertEquals($retrievedSubmission->Score, 80, 'Retrieved submission score is correct');
        $this->assertEquals($retrievedSubmission->SubmittedDate, '2025-04-06 12:00:00', 'Retrieved submission date is correct');
    }
}
