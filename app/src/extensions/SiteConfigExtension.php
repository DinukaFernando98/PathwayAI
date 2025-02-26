<?php

namespace PathwayAI\Extensions;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;

class SiteConfigExtension extends DataExtension
{
	private static $db = [];

	public function updateCMSFields(FieldList $fields)
	{
		parent::updateCMSFields($fields);
		return $fields;
	}
}
