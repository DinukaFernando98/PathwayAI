<?php

namespace PathwayAI\Partials;

use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class TabItem extends DataObject
{
	private static $table_name = 'TabItem';

	private static $db = [
		'Title' => 'Varchar',
		'Content' => 'HTMLText'
	];

	private static $summary_fields = [
		'Title'
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->addFieldsToTab('Root.Main', [
			TextField::create('Title', 'Title'),
			HTMLEditorField::create('Content', 'Content')
		]);

		return $fields;
	}

}
