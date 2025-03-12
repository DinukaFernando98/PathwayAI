<?php

namespace PathwayAI\Models\Page;

use PathwayAI\Controllers\ContactPageController;

class ContactPage extends \Page
{
	private static $controller_name = ContactPageController::class;

	private static $table_name = 'ContactPage';

	private static $db = [

	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->addFieldsToTab('Root.Main', [

		]);

		return $fields;
	}
}
