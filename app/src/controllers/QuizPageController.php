<?php

namespace PathwayAI\Controllers;

use PathwayAI\Models\Page\QuizPage;
use PathwayAI\Partials\Answer;
use PathwayAI\Partials\Quiz;
use PathwayAI\Partials\QuizSubmission;
use PathwayAI\Partials\User;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\OptionsetField;
use SilverStripe\ORM\FieldType\DBDatetime;
class QuizPageController extends \PageController
{
	public function index()
	{
		$user = $this->getLoggedInUser();

		// Default values
		$quizSubmission = null;
		$quizScore = null;
		$quizTotalQuestions = null;
		$quizCompleted = false;
		$percentage = 0;
		$grade = 'F';
	
		if ($user) {
			$quizSubmission = QuizSubmission::get()
				->filter('UserID', $user->ID)
				->filter('QuizPageID', $this->ID)
				->sort('SubmittedDate', 'DESC')
				->first();
	
			if ($quizSubmission) {
				$quizScore = $quizSubmission->Score;
				$quizTotalQuestions = $this->getQuestions()->count();
				$quizCompleted = true;
	
				if ($quizTotalQuestions > 0) {
					$percentage = round(($quizScore / $quizTotalQuestions) * 100, 2);
				}
	
				if ($percentage >= 90) {
					$grade = 'A';
				} elseif ($percentage >= 80) {
					$grade = 'B';
				} elseif ($percentage >= 70) {
					$grade = 'C';
				} elseif ($percentage >= 60) {
					$grade = 'D';
				}
			}
		} else {
			return $this->redirect('/sign-in');
		}
	
		return $this->renderWith([
			'QuizPage',
			'Page'
		], [
			'quiz_score' => $quizScore,
			'quiz_total_questions' => $quizTotalQuestions,
			'quiz_completed' => $quizCompleted,
			'percentage' => $percentage,
			'grade' => $grade
		]);
	}

	private static $allowed_actions = ['startQuiz', 'QuizForm', 'submitQuiz'];

    public function getQuiz()
    {
        return QuizPage::get()->byID($this->ID);
    }

    public function getQuestions()
    {
        return $this->getQuiz()->Questions();
    }

	public function QuizForm()
	{
		$fields = FieldList::create();

		foreach ($this->getQuestions() as $question) {
			$answers = $question->Answers();
			$options = [];

			foreach ($answers as $answer) {
				$options[$answer->ID] = $answer->AnswerText;
			}

			$fields->push(OptionsetField::create(
				"question-{$question->ID}",
				$question->QuestionText,
				$options
			));
		}

		$actions = FieldList::create(
			FormAction::create('submitQuiz', 'Submit Quiz')
			->setAttribute('class', 'mt-4 btn btn-green')
		);

		$form = Form::create($this, 'QuizForm', $fields, $actions);

		return $form;
	}

	public function submitQuiz($data, $form)
	{
		$score = 0;
		$totalQuestions = 0;
	
		foreach ($this->getQuestions() as $question) {
			$totalQuestions++;
			$selectedAnswerID = $data['question-' . $question->ID] ?? null;
	
			if ($selectedAnswerID) {
				$answer = Answer::get()->byID($selectedAnswerID);
				if ($answer && $answer->IsCorrect) {
					$score++;
				}
			}
		}

		$user = $this->getLoggedInUser();
		$quizSubmission = QuizSubmission::create();
		$quizSubmission->Score = $score;
		$quizSubmission->SubmittedDate = DBDatetime::now()->Rfc2822();
		$quizSubmission->UserID = $user->ID;
		$quizSubmission->QuizPageID = $this->ID;
		$quizSubmission->write();
	
		return $this->redirectBack();
	}

	public function getLoggedInUser()
    {
		$session = $this->getRequest()->getSession();

		$userID = $session->get('LoggedInUserID');
		if ($userID) {
			return User::get()->byID($userID);
		}
		return null;
    }

}
