<?php

namespace PathwayAI\Admin;

use PathwayAI\Partials\QuizSubmission;
use SilverStripe\Admin\ModelAdmin;

class QuizSubmissionsAdmin extends ModelAdmin
{
	private static $menu_title = 'Quiz Submissions';

	private static $url_segment = 'quiz-submissions';

	private static $managed_models = [
		QuizSubmission::class
	];

	private static $menu_priority = 3;

	//Icons can be found at: https://gbaumeister.github.io/ss4-icons/
	private static $menu_icon_class = 'font-icon-edit-write';
}
