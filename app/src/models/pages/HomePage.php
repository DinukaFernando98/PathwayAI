<?php

namespace PathwayAI\Models\Page;

use PathwayAI\Controllers\HomePageController;

class HomePage extends \Page
{
	private static $controller_name = HomePageController::class;

	private static $table_name = 'HomePage';

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		return $fields;
	}
}
