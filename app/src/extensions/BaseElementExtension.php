<?php

namespace PathwayAI\Extensions;

use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

class BaseElementExtension extends DataExtension
{
	private static $db = [
		'RemoveTopMargin' => 'Boolean',
		'RemoveBottomMargin' => 'Boolean'
	];

	public function updateCMSFields(FieldList $fields)
	{
		parent::updateCMSFields($fields);

		$fields->addFieldsToTab('Root.Settings', [
			CheckboxField::create('RemoveTopMargin'),
			CheckboxField::create('RemoveBottomMargin')
		]);

		return $fields;
	}

}
