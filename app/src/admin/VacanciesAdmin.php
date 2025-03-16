<?php

namespace PathwayAI\Admin;

use PathwayAI\Partials\Vacancy;
use SilverStripe\Admin\ModelAdmin;

class VacanciesAdmin extends ModelAdmin
{
	private static $menu_title = 'Vacancies';

	private static $url_segment = 'vacancies';

	private static $managed_models = [
		Vacancy::class
	];

	private static $menu_priority = 4;

	//Icons can be found at: https://gbaumeister.github.io/ss4-icons/
	private static $menu_icon_class = 'font-icon-list';
}
