<?php

namespace PathwayAI\Models\Elemental;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
use PathwayAI\Partials\ImageGridItem;

class ImageGridElement extends BaseElement
{
	private static $singular_name = 'Image Grid';

	private static $plural_name = 'Image Grids';

	private static $description = 'Image grid with lightbox functionality for a gallery.';

	private static $inline_editable = false;

	private static $table_name = 'ImageGridElement';

	private static $icon = 'font-icon-thumbnails';

	private static $db = [
		'IsGallery' => 'Boolean'
	];

	private static $many_many = [
		'ImageGridItems' => ImageGridItem::class
	];

	private static $many_many_extraFields = [
		'ImageGridItems' => [
			'Sort' => 'Int'
		]
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->removeByName([
			'ImageGridItems'
		]);

		$fields->addFieldsToTab('Root.Main', [
			GridField::create(
				'ImageGridItems',
				'Image Grid Items',
				$this->ImageGridItems(),
				GridFieldConfig_RecordEditor::create()
					->addComponent(GridFieldOrderableRows::create('Sort'))
			)
		]);

		$fields->addFieldsToTab('Root.Settings', [
			CheckboxField::create('IsGallery', 'Is gallery?')
		]);

		return $fields;
	}

	public function getType()
	{
		return 'Image Grid';
	}

	public function getImageGridItems()
	{
		return $this->ImageGridItems()->Sort('Sort');
	}
}
