<?php

namespace PathwayAI\Models\Page;

use PathwayAI\Controllers\JobController;

class JobPage extends \Page
{
	private static $controller_name = JobController::class;

	private static $table_name = 'JobPage';

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		return $fields;
	}
}
