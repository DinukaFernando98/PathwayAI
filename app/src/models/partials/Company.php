<?php

namespace PathwayAI\Partials;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;
use PathwayAI\Partials\Event;

class Company extends DataObject
{
	private static $table_name = 'Company';

	private static $db = [
		'Name' => 'Varchar',
		'Email' => 'Varchar',
		'Description' => 'Varchar'
	];

	private static $has_one = [
		'Image' => Image::class
	];

	private static $has_many = [
		'Events' => Event::class
	];

	private static $owns = [
		'Image'
	];

	private static $summary_fields = [
		'Name'
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->addFieldsToTab('Root.Main', [
			TextField::create('Name', 'Company name'),
			UploadField::create('Image', 'Logo'),
			TextField::create('Email', 'Email'),
			TextareaField::create('Description', 'Description')
		]);

		return $fields;
	}

}
