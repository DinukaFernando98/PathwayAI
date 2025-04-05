<?php

namespace PathwayAI\Partials;

use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class Vacancy extends DataObject
{
	private static $table_name = 'Vacancy';

	private static $db = [
		'Title' => 'Varchar',
		'Type' => "Enum('Full Time,Part Time')",
		'Location' => 'Varchar',
		'Content' => 'HTMLText'
	];

	private static $has_one = [
		'Company' => Company::class
	];

	private static $has_many = [
		'Applications' => JobApplication::class
	];

	private static $summary_fields = [
		'Title',
		'Company.Name'
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->addFieldsToTab('Root.Main', [
			TextField::create('Title', 'Position'),
			DropdownField::create('Type', 'Type', $this->dbObject('Type')->enumValues()),
			TextField::create('Location', 'Location'),
			HTMLEditorField::create('Content', 'Content')
		]);

		return $fields;
	}

	public function getObfuscatedID()
	{
		return $this->encodeSelf();
	}
	
	private function encodeSelf()
	{
		$encoded = base_convert($this->ID * 98765, 10, 36);
		return str_pad($encoded, 6, 'x', STR_PAD_LEFT);
	}
	
	public static function decodeObfuscatedID($obfuscatedID)
	{
		$decoded = base_convert(ltrim($obfuscatedID, 'x'), 36, 10);
		return intval($decoded / 98765);
	}

}
