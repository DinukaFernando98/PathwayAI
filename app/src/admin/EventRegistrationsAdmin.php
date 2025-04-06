<?php

namespace PathwayAI\Admin;

use PathwayAI\Partials\EventRegistration;
use SilverStripe\Admin\ModelAdmin;

class EventRegistrationsAdmin extends ModelAdmin
{
	private static $menu_title = 'Event Registrations';

	private static $url_segment = 'event-registrations';

	private static $managed_models = [
		EventRegistration::class
	];

	private static $menu_priority = 5;

	//Icons can be found at: https://gbaumeister.github.io/ss4-icons/
	private static $menu_icon_class = 'font-icon-picture';
}
