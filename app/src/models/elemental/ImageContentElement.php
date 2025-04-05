<?php

namespace PathwayAI\Models\Elemental;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\TextField;
class ImageContentElement extends BaseElement
{
	private static $singular_name = 'Image content banner';

	private static $plural_name = 'Image content banners';

	private static $description = 'Image content banner.';

	private static $inline_editable = true;

	private static $table_name = 'ImageContentBannerElement';
	
	private static $icon = 'font-icon-image';

	private static $db = [
		'Title' => 'Varchar'
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->addFieldsToTab('Root.Main', [
			TextField::create('Title', 'Title')
		]);

		return $fields;
	}

	public function getType()
	{
		return 'Image Content Banner';
	}
}