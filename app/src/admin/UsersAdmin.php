<?php

namespace PathwayAI\Admin;

use PathwayAI\Partials\User;
use SilverStripe\Admin\ModelAdmin;
use PathwayAI\Partials\Enquiry;

class UsersAdmin extends ModelAdmin
{
	private static $menu_title = 'Users';

	private static $url_segment = 'users';

	private static $managed_models = [
		User::class
	];

	private static $menu_priority = 6;

	//Icons can be found at: https://gbaumeister.github.io/ss4-icons/
	private static $menu_icon_class = 'font-icon-list';
}
