<?php

namespace PathwayAI\Models\Page;

use PathwayAI\Controllers\EventController;

class EventPage extends \Page
{
	private static $controller_name = EventController::class;

	private static $table_name = 'EventPage';

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		return $fields;
	}
}
