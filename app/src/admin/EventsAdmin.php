<?php

namespace PathwayAI\Admin;

use PathwayAI\Partials\Event;
use SilverStripe\Admin\ModelAdmin;

class EventsAdmin extends ModelAdmin
{
	private static $menu_title = 'Events';

	private static $url_segment = 'events';

	private static $managed_models = [
		Event::class
	];

	private static $menu_priority = 4;

	//Icons can be found at: https://gbaumeister.github.io/ss4-icons/
	private static $menu_icon_class = 'font-icon-list';
}
