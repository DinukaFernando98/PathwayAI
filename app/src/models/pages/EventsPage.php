<?php

namespace PathwayAI\Models\Page;

use PathwayAI\Controllers\EventsPageController;

class EventsPage extends \Page
{
	private static $controller_name = EventsPageController::class;

	private static $table_name = 'EventsPage';

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		return $fields;
	}
}
