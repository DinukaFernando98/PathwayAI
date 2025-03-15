<?php

namespace PathwayAI\Admin;

use PathwayAI\Models\Page\QuizPage;
use SilverStripe\Admin\ModelAdmin;

class QuizzesAdmin extends ModelAdmin
{
	private static $menu_title = 'Quizzes';

	private static $url_segment = 'quizzes';

	private static $managed_models = [
		QuizPage::class
	];

	private static $menu_priority = 3;

	//Icons can be found at: https://gbaumeister.github.io/ss4-icons/
	private static $menu_icon_class = 'font-icon-list';
}
