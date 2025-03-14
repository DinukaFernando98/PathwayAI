<?php

namespace PathwayAI\Partials;

use Sheadawson\Linkable\Forms\LinkField;
use Sheadawson\Linkable\Models\Link;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class Event extends DataObject
{
	private static $table_name = 'Event';

	private static $db = [
		'Type' => 'Enum("Workshop, Career Fair, Campaign, Event")',
		'Title' => 'Varchar',
		'Content' => 'HTMLText',
		'Date' => 'Date'
	];

	private static $has_one = [
		'Image' => Image::class,
		'Company' => Company::class
	];

	private static $has_many = [
		'Registrations' => EventRegistration::class
	];

	private static $owns = [
		'Image'
	];

	private static $summary_fields = [
		'Title'
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->addFieldsToTab('Root.Main', [
			DropdownField::create('Type', 'Event type', $this->dbObject('Type')->enumValues()),
			UploadField::create('Image', 'Image'),
			TextField::create('Title', 'Event name'),
			DateField::create('Date', 'Event date'),
			HTMLEditorField::create('Content', 'Content')
		]);

		return $fields;
	}

	public function getFormattedDate()
	{
		return $this->Date ? date('j F Y', strtotime($this->Date)) : null;
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
