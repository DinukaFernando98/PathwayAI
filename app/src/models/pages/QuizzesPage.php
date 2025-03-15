<?php

namespace PathwayAI\Models\Page;

use PathwayAI\Controllers\QuizzesPageController;

class QuizzesPage extends \Page
{
	private static $controller_name = QuizzesPageController::class;

	private static $table_name = 'QuizzesPage';

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		return $fields;
	}
}
