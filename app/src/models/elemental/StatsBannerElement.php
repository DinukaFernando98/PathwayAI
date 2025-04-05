<?php

namespace PathwayAI\Models\Elemental;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\TextField;
class StatsBannerElement extends BaseElement
{
	private static $inline_editable = true;

	private static $table_name = 'StatsBannerElement';

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
		return 'Stats Banner';
	}
}
