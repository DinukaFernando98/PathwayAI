<?php

namespace PathwayAI\Partials;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class ImageGridItem extends DataObject
{
	private static $table_name = 'ImageGridItem';

	private static $db = [
		'Title' => 'Varchar',
		'Caption' => 'Varchar'
	];

	private static $has_one = [
		'Image' => Image::class
	];

	private static $owns = [
		'Image'
	];

	private static $summary_fields = [
		'Image.CMSThumbnail' => 'Image',
		'Title' => 'Title'
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->addFieldsToTab('Root.Main', [
			UploadField::create('Image', 'Image'),
			TextField::create('Title', 'Title'),
			TextField::create('Caption', 'Caption')
		]);

		return $fields;
	}

}
