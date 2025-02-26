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

class SplitBannerElement extends BaseElement
{
	private static $singular_name = 'Split Banner';

	private static $plural_name = 'Split Banners';

	private static $description = 'Banner with content and an image.';

	private static $inline_editable = false;

	private static $table_name = 'SplitBannerElement';

	private static $icon = 'font-icon-columns';

	private static $db = [
		'Title' => 'Varchar',
		'Subtitle' => 'Varchar',
		'Content' => 'HTMLText',
		'Swap' => 'Boolean',
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
			CheckboxField::create('Swap', 'Swap layout?')
		]);

		return $fields;
	}

	public function getSummary()
	{
		return DBField::create_field('Varchar', $this->Content)->Summary(20);
	}

	public function getType()
	{
		return 'Split Banner';
	}
}
