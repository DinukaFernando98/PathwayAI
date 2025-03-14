<?php

namespace PathwayAI\Admin;

use PathwayAI\Partials\Company;
use SilverStripe\Admin\ModelAdmin;

class CompaniesAdmin extends ModelAdmin
{
	private static $menu_title = 'Companies';

	private static $url_segment = 'companies';

	private static $managed_models = [
		Company::class
	];

	private static $menu_priority = 3;

	//Icons can be found at: https://gbaumeister.github.io/ss4-icons/
	private static $menu_icon_class = 'font-icon-list';
}
