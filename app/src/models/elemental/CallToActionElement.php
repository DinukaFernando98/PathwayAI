<?php

namespace PathwayAI\Models\Elemental;

use DNADesign\Elemental\Models\BaseElement;
use Sheadawson\Linkable\Forms\LinkField;
use Sheadawson\Linkable\Models\Link;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\FieldType\DBField;

class CallToActionElement extends BaseElement
{
	private static $singular_name = 'Call to Action';

	private static $plural_name = 'Call to Action';

	private static $description = 'Call to action.';

	private static $inline_editable = false;

	private static $table_name = 'CallToActionElement';

	private static $icon = 'font-icon-image';

	private static $db = [
		'Title' => 'Varchar',
		'Subtitle' => 'Varchar',
		'Content' => 'HTMLText',
		'FullHeight' => 'Boolean'
	];

	private static $has_one = [
		'Image' => Image::class,
		'Button' => Link::class
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
			TextField::create('Subtitle', 'Subtitle'),
			HTMLEditorField::create('Content', 'Content'),
			LinkField::create('ButtonID', 'Button'),
		]);

		$fields->addFieldsToTab('Root.Settings', [
			CheckboxField::create('FullHeight', 'Make full height?')
		]);

		return $fields;
	}

	public function getSummary()
	{
		return DBField::create_field('Varchar', $this->Content)->Summary(20);
	}

	public function getType()
	{
		return 'Call to Action';
	}
}
