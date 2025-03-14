<?php

namespace PathwayAI\Partials;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TabSet;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;

class Enquiry extends DataObject
{

	private static $table_name = 'Enquiry';

	private static $db = [
		'Name' => 'Varchar',
		'TelephoneNumber' => 'Varchar',
		'Email' => 'Varchar',
		'Subject' => 'Varchar',
		'Message' => 'Text',
	];

	private static $summary_fields = [
		'Name' => 'Name',
		'Email' => 'Email',
	];

	public function getCMSFields()
	{
		$fields = FieldList::create(Tabset::create('Root'));

		$fields->addFieldsToTab('Root.Main', [
			TextField::create('Name')->performReadonlyTransformation(),
			TextField::create('TelephoneNumber')->performReadonlyTransformation(),
			TextField::create('Email')->performReadonlyTransformation(),
			TextField::create('Subject')->performReadonlyTransformation(),
			TextareaField::create('Message')->performReadonlyTransformation(),
		]);

		return $fields;
	}
}
