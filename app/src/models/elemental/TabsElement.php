<?php

namespace PathwayAI\Models\Elemental;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
use PathwayAI\Partials\TabItem;

class TabsElement extends BaseElement
{
	private static $singular_name = 'Tabs';

	private static $plural_name = 'Tabs';

	private static $description = 'Tabs.';

	private static $inline_editable = false;

	private static $table_name = 'TabsElement';

	private static $icon = 'font-icon-page-multiple';

	private static $db = [

	];

	private static $many_many = [
		'TabItems' => TabItem::class
	];

	private static $many_many_extraFields = [
		'TabItems' => [
			'Sort' => 'Int'
		]
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->removeByName([
			'TabItems'
		]);

		$fields->addFieldsToTab('Root.Main', [
			GridField::create(
				'TabItems',
				'Tabs',
				$this->TabItems(),
				GridFieldConfig_RecordEditor::create()
					->addComponent(GridFieldOrderableRows::create('Sort'))
			)
		]);

		return $fields;
	}

	public function getType()
	{
		return 'Tabs';
	}

	public function getTabs()
	{
		return $this->TabItems()->Sort('Sort');
	}
}
