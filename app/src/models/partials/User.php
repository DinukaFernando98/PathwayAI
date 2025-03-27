<?php

namespace PathwayAI\Partials;

use SilverStripe\Assets\File;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\ListboxField;
use SilverStripe\ORM\DataObject;
use SilverStripe\TagField\TagField;

class User extends DataObject
{
    private static $table_name = 'User';
    
    private static $db = [
        'FirstName' => 'Varchar',
        'LastName' => 'Varchar',
        'Email' => 'Varchar(255)',
        'Phone' => 'Varchar',
        'Password' => 'Varchar(255)',
        'EntryLevel' => "Enum('School Leaver,Undergraduate,Postgraduate,Masters,Doctorate')",
        'InterestedArea' => 'Varchar'
    ];

    private static $has_one = [
        'ProfilePhoto' => Image::class,
        'CV' => File::class
    ];

    private static $owns = [
        'ProfilePhoto',
        'CV'
    ];
    
    private static $has_many = [
        'Registrations' => EventRegistration::class,
        'QuizSubmissions' => QuizSubmission::class
    ];

    private static $many_many = [
        'Applications' => Vacancy::class
    ];

    public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->addFieldsToTab('Root.Main', [
			DropdownField::create('EntryLevel', 'Entry Level', $this->dbObject('EntryLevel')->enumValues()),
            ListboxField::create(
                'InterestedArea',
                'Interested Area',
                [
                    'Business Management' => 'Business Management',
                    'Accounting' => 'Accounting',
                    'Information Technology' => 'Information Technology',
                    'Human Resources' => 'Human Resources',
                    'Engineering' => 'Engineering',
                    'Architecture' => 'Architecture',
                    'Fashion Design' => 'Fashion Design',
                    'Other' => 'Other'
                ]
            )
        		]);

		return $fields;
	}

    public function getFullName()
    {
        return $this->FirstName . ' ' . $this->LastName;
    }
}