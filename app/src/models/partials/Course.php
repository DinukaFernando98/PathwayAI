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
use PathwayAI\Partials\Company;

class Course extends DataObject
{
	private static $table_name = 'Course';

	private static $db = [
		'CourseType' => "Enum('Business Management,Accounting,Information Technology,Human Resources,Engineering,Architecture,Fashion Design,Other')",
		'Title' => 'Varchar',
		'Duration' => 'Varchar',
		'Link' => 'Varchar'
	];

	private static $has_one = [
		'Image' => Image::class,
		'Host' => Company::class
	];

	private static $owns = [
		'Image'
	];

	private static $summary_fields = [
		'Title',
		'Duration',
		'Host.Name' => 'Host'
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->addFieldsToTab('Root.Main', [
			DropdownField::create('CourseType', 'Course type', $this->dbObject('CourseType')->enumValues()),
			UploadField::create('Image', 'Image'),
			TextField::create('Title', 'Course name'),
			TextField::create('Duration', 'Duration'),
			DropdownField::create('HostID', 'Host', Company::get()->map('ID', 'Title'))
            ->setEmptyString('Select Host'),
			TextField::create('Link', 'Link')
		]);

		return $fields;
	}

}
