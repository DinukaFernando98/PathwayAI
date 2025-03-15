<?php

namespace PathwayAI\Controllers;

use PathwayAI\Models\Page\QuizPage;
use PathwayAI\Partials\Quiz;
class QuizzesPageController extends \PageController
{
	public function index()
	{
		return $this->renderWith([
			'QuizzesPage',
			'Page'
		]);
	}

	public function getQuizzes()
    {
        return QuizPage::get();
    }
}
