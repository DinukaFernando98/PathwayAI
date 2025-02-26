<?php

namespace PathwayAI\Models\Elemental;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
use PathwayAI\Partials\Card;

class CardsElement extends BaseElement
{
	private static $singular_name = 'Cards';

	private static $plural_name = 'Cards';

	private static $description = 'Cards.';

	private static $inline_editable = false;

	private static $table_name = 'CardsElement';

	private static $icon = 'font-icon-block-banner';

	private static $db = [

	];

	private static $many_many = [
		'Cards' => Card::class
	];

	private static $many_many_extraFields = [
		'Cards' => [
			'Sort' => 'Int'
		]
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->removeByName([
			'Cards'
		]);

		$fields->addFieldsToTab('Root.Main', [
			GridField::create(
				'Cards',
				'Cards',
				$this->Cards(),
				GridFieldConfig_RecordEditor::create()
					->addComponent(GridFieldOrderableRows::create('Sort'))
			)
		]);

		return $fields;
	}

	public function getType()
	{
		return 'Cards';
	}

	public function getCards()
	{
		return $this->Cards()->Sort('Sort');
	}
}
