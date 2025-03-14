<?php

namespace PathwayAI\Partials;

use SilverStripe\ORM\DataObject;

class User extends DataObject
{
    private static $table_name = 'User';
    
    private static $db = [
        'FirstName' => 'Varchar',
        'LastName' => 'Varchar',
        'Email' => 'Varchar(255)',
        'Phone' => 'Varchar'
    ];
    
    private static $has_many = [
        'Registrations' => EventRegistration::class,
    ];

    public function getFullName()
    {
        return $this->FirstName . ' ' . $this->LastName;
    }
}