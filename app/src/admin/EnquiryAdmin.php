<?php

namespace PathwayAI\Admin;

use SilverStripe\Admin\ModelAdmin;
use PathwayAI\Partials\Enquiry;

class EnquiryAdmin extends ModelAdmin
{
	private static $menu_title = 'Enquiries';

	private static $url_segment = 'enquiries';

	private static $managed_models = [
		Enquiry::class
	];

	private static $menu_priority = 6;

	//Icons can be found at: https://gbaumeister.github.io/ss4-icons/
	private static $menu_icon_class = 'font-icon-box';
}
