<?php

namespace PathwayAI\Models\Elemental;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
use PathwayAI\Partials\SliderItem;

class SliderElement extends BaseElement
{
	private static $singular_name = 'Slider';

	private static $plural_name = 'Slider';

	private static $description = 'Slider.';

	private static $inline_editable = false;

	private static $table_name = 'SliderElement';

	private static $icon = 'font-icon-block-carousel';

	private static $db = [

	];

	private static $many_many = [
		'SliderItems' => SliderItem::class
	];

	private static $many_many_extraFields = [
		'SliderItems' => [
			'Sort' => 'Int'
		]
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->removeByName([
			'Title',
			'SliderItems'
		]);

		$fields->addFieldsToTab('Root.Main', [
			GridField::create(
				'SliderItems',
				'Slider Items',
				$this->SliderItems(),
				GridFieldConfig_RecordEditor::create()
					->addComponent(GridFieldOrderableRows::create('Sort'))
			)
		]);

		return $fields;
	}

	public function getType()
	{
		return 'Slider';
	}

	public function getSliderItems()
	{
		return $this->SliderItems()->Sort('Sort');
	}
}
