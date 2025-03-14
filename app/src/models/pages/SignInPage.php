<?php

namespace PathwayAI\Pages;

use PathwayAI\Controllers\SignInPageController;

class SignInPage extends \Page
{
    private static $controller_name = SignInPageController::class;

	private static $table_name = 'SignInPage';

    public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		return $fields;
	}
}

