<?php

namespace PathwayAI\Admin;

use PathwayAI\Partials\Course;
use SilverStripe\Admin\ModelAdmin;

class CoursesAdmin extends ModelAdmin
{
	private static $menu_title = 'Courses';

	private static $url_segment = 'courses';

	private static $managed_models = [
		Course::class
	];

	private static $menu_priority = 6;

	//Icons can be found at: https://gbaumeister.github.io/ss4-icons/
	private static $menu_icon_class = 'font-icon-check-mark-circle';
}
