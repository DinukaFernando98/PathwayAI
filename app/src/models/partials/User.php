<?php

namespace PathwayAI\Partials;

use SilverStripe\Assets\File;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;

class User extends DataObject
{
    private static $table_name = 'User';
    
    private static $db = [
        'FirstName' => 'Varchar',
        'LastName' => 'Varchar',
        'Email' => 'Varchar(255)',
        'Phone' => 'Varchar',
        'Password' => 'Varchar(255)'
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

    public function getFullName()
    {
        return $this->FirstName . ' ' . $this->LastName;
    }
}