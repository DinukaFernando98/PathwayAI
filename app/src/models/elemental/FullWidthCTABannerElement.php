<?php

namespace PathwayAI\Models\Elemental;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\TextField;
class FullWidthCTABannerElement extends BaseElement
{
	private static $singular_name = 'Full Width CTA Banner';

	private static $plural_name = 'Full Width CTA Banner';

	private static $description = 'Full Width CTA Banner with background image.';

	private static $inline_editable = true;

	private static $table_name = 'FullWidthCTABanner';
	
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
		return 'Full width CTA Banner';
	}
}