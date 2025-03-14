<?php

namespace PathwayAI\Partials;

use PathwayAI\Partials\Event;
use PathwayAI\Partials\User;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\DropdownField;

class EventRegistration extends DataObject
{
    private static $table_name = 'EventRegistration';

    private static $db = [
        'Status' => "Enum('Pending, Confirmed, Cancelled', 'Pending')",
    ];

    private static $has_one = [
        'User' => User::class,
        'Event' => Event::class,
    ];

    private static $summary_fields = [
        'User.FirstName' => 'First Name',
        'User.LastName' => 'Last Name',
        'User.Email' => 'Email',
        'User.Phone' => 'Phone',
        'Event.Title' => 'Event',
        'Status' => 'Registration Status'
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
            'Registration Status',
            singleton(__CLASS__)->dbObject('Status')->enumValues()
        ));
    

        return $fields;
    }
}
