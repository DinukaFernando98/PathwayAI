<?php

namespace PathwayAI\Models\Page;

use PathwayAI\Controllers\VacanciesPageController;

class VacanciesPage extends \Page
{
	private static $controller_name = VacanciesPageController::class;

	private static $table_name = 'VacanciesPage';

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		return $fields;
	}
}
