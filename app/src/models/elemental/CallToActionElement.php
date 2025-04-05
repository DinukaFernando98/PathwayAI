<?php

namespace PathwayAI\Models\Elemental;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;

class CallToActionElement extends BaseElement
{
	private static $inline_editable = false;

	private static $table_name = 'CallToActionElement';

	private static $icon = 'font-icon-image';

	private static $db = [
		'Title' => 'Varchar',
		'Content' => 'HTMLText'
	];

	private static $has_one = [
		'Image' => Image::class
	];

	private static $owns = [
		'Image'
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->addFieldsToTab('Root.Main', [
			UploadField::create('Image', 'Image'),
			TextField::create('Title', 'Title'),
			HTMLEditorField::create('Content', 'Content')
		]);

		return $fields;
	}

	public function getType()
	{
		return 'Call to Action';
	}
}
