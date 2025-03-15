<?php

namespace PathwayAI\Models\Page;

use PathwayAI\Controllers\CoursesPageController;

class CoursesPage extends \Page
{
	private static $controller_name = CoursesPageController::class;

	private static $table_name = 'CoursesPage';

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		return $fields;
	}
}
