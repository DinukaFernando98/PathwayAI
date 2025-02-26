<?php

namespace PathwayAI\Partials;

use Sheadawson\Linkable\Forms\LinkField;
use Sheadawson\Linkable\Models\Link;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class Card extends DataObject
{
	private static $table_name = 'Card';

	private static $db = [
		'Title' => 'Varchar',
		'Content' => 'Varchar'
	];

	private static $has_one = [
		'Image' => Image::class,
		'Button' => Link::class
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
			UploadField::create('Image', 'Image'),
			TextField::create('Title', 'Title'),
			TextareaField::create('Content', 'Content'),
			LinkField::create('ButtonID', 'Button')
		]);

		return $fields;
	}

}
