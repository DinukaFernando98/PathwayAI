<?php

namespace PathwayAI\Partials;

use PathwayAI\Partials\Vacancy;
use PathwayAI\Partials\User;
use SilverStripe\Assets\File;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\DropdownField;

class JobApplication extends DataObject
{
    private static $table_name = 'JobApplication';

    private static $db = [
        'Status' => "Enum('Pending, Confirmed, Rejected, Short-listed', 'Pending')",
    ];

    private static $has_one = [
        'CV' => File::class,
        'User' => User::class,
        'Job' => Vacancy::class,
    ];

    private static $owns = [
        'CV'
    ];

    private static $summary_fields = [
        'User.FirstName' => 'First Name',
        'User.LastName' => 'Last Name',
        'User.Email' => 'Email',
        'User.Phone' => 'Phone',
        'Job.Title' => 'Event',
        'Status' => 'Application Status'
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $userMap = User::get()->map('ID', 'FullName')->toArray();
    
        $fields->replaceField('UserID', DropdownField::create(
            'UserID',
            'User',
            $userMap
        )->setEmptyString('-- Select a User --'));
    
        $fields->addFieldToTab('Root.Main', DropdownField::create(
            'Status',
            'Application Status',
            singleton(__CLASS__)->dbObject('Status')->enumValues()
        ));
    

        return $fields;
    }
}

