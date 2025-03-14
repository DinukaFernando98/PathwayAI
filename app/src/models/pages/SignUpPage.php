<?php

namespace PathwayAI\Pages;

use PathwayAI\Controllers\SignUpPageController;

class SignUpPage extends \Page
{
    private static $controller_name = SignUpPageController::class;

	private static $table_name = 'SignUpPage';

    public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		return $fields;
	}
}

