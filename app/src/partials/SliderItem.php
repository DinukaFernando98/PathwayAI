<?php

namespace PathwayAI\Partials;

use Sheadawson\Linkable\Forms\LinkField;
use Sheadawson\Linkable\Models\Link;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class SliderItem extends DataObject
{
	private static $table_name = 'SliderItem';

	private static $db = [
		'Title' => 'Varchar',
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
			LinkField::create('ButtonID', 'Button')
		]);

		return $fields;
	}

}
