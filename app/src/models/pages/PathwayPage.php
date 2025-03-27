<?php

namespace PathwayAI\Models\Page;

use PathwayAI\Controllers\PathwayPageController;

class PathwayPage extends \Page
{
	private static $controller_name = PathwayPageController::class;

	private static $table_name = 'PathwayPage';

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		return $fields;
	}
}
