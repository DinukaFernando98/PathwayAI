<?php

namespace PathwayAI\Pages;

use PathwayAI\Controllers\ProfilePageController;

class ProfilePage extends \Page
{
    private static $controller_name = ProfilePageController::class;

	private static $table_name = 'ProfilePage';

    public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		return $fields;
	}
}

