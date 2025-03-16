<?php

namespace PathwayAI\Partials;

use Sheadawson\Linkable\Forms\LinkField;
use Sheadawson\Linkable\Models\Link;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class Vacancy extends DataObject
{
	private static $table_name = 'Vacancy';

	private static $db = [
		'Title' => 'Varchar',
		'Type' => "Enum('Full Time,Part Time')",
		'Location' => 'Varchar',
		'Content' => 'HTMLText'
	];

	private static $has_one = [
		'Company' => Company::class
	];

	private static $many_many = [
		'Applicants' => User::class
	];

	private static $summary_fields = [
		'Title',
		'Company.Name'
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->addFieldsToTab('Root.Main', [
			TextField::create('Title', 'Position'),
			DropdownField::create('Type', 'Type', $this->dbObject('Type')->enumValues()),
			TextField::create('Location', 'Location'),
			HTMLEditorField::create('Content', 'Content')
		]);

		return $fields;
	}

}
