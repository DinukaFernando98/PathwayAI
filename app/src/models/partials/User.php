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
        'InterestedArea' => 'Varchar',
        'InterestedPosition' => 'Varchar'
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

        $user = $this->ID;

        $positions = [
            'Business Management' => [
                'Intern' => 'Intern',
                'Junior Manager' => 'Junior Manager',
                'Assistant Manager' => 'Assistant Manager',
                'Manager' => 'Manager',
                'Senior Manager' => 'Senior Manager',
                'Lead Manager' => 'Lead Manager',
                'Department Head' => 'Department Head',
                'General Manager' => 'General Manager',
                'Executive Manager' => 'Executive Manager',
                'Vice President' => 'Vice President',
                'Senior Vice President' => 'Senior Vice President',
                'Chief Operating Officer (COO)' => 'Chief Operating Officer (COO)',
                'Chief Executive Officer (CEO)' => 'Chief Executive Officer (CEO)'
            ],
            'Accounting' => [
                'Intern' => 'Intern',
                'Junior Accountant' => 'Junior Accountant',
                'Accountant' => 'Accountant',
                'Senior Accountant' => 'Senior Accountant',
                'Accounting Supervisor' => 'Accounting Supervisor',
                'Accounting Manager' => 'Accounting Manager',
                'Finance Manager' => 'Finance Manager',
                'Senior Finance Manager' => 'Senior Finance Manager',
                'Financial Controller' => 'Financial Controller',
                'Finance Director' => 'Finance Director',
                'Vice President of Finance' => 'Vice President of Finance',
                'Chief Financial Officer (CFO)' => 'Chief Financial Officer (CFO)'
            ],
            'Information Technology' => [
                'Intern' => 'Intern',
                'Junior Developer' => 'Junior Developer',
                'Developer' => 'Developer',
                'Senior Developer' => 'Senior Developer',
                'Lead Developer' => 'Lead Developer',
                'Software Engineer' => 'Software Engineer',
                'Senior Software Engineer' => 'Senior Software Engineer',
                'Tech Lead' => 'Tech Lead',
                'Engineering Manager' => 'Engineering Manager',
                'Software Architect' => 'Software Architect',
                'Engineering Director' => 'Engineering Director',
                'Vice President of Engineering' => 'Vice President of Engineering',
                'Chief Technology Officer (CTO)' => 'Chief Technology Officer (CTO)'
            ],
            'Human Resources' => [
                'Intern' => 'Intern',
                'Junior HR Officer' => 'Junior HR Officer',
                'HR Officer' => 'HR Officer',
                'Senior HR Officer' => 'Senior HR Officer',
                'HR Manager' => 'HR Manager',
                'Senior HR Manager' => 'Senior HR Manager',
                'HR Director' => 'HR Director',
                'VP of HR' => 'VP of HR',
                'Chief Human Resources Officer (CHRO)' => 'Chief Human Resources Officer (CHRO)'
            ],
            'Engineering' => [
                'Intern' => 'Intern',
                'Junior Engineer' => 'Junior Engineer',
                'Engineer' => 'Engineer',
                'Senior Engineer' => 'Senior Engineer',
                'Lead Engineer' => 'Lead Engineer',
                'Principal Engineer' => 'Principal Engineer',
                'Engineering Manager' => 'Engineering Manager',
                'Senior Engineering Manager' => 'Senior Engineering Manager',
                'Director of Engineering' => 'Director of Engineering',
                'VP of Engineering' => 'VP of Engineering',
                'Chief Engineering Officer (CEO)' => 'Chief Engineering Officer (CEO)'
            ],
            'Architecture' => [
                'Intern' => 'Intern',
                'Junior Architect' => 'Junior Architect',
                'Architect' => 'Architect',
                'Senior Architect' => 'Senior Architect',
                'Lead Architect' => 'Lead Architect',
                'Principal Architect' => 'Principal Architect',
                'Senior Principal Architect' => 'Senior Principal Architect',
                'Director of Architecture' => 'Director of Architecture',
                'VP of Architecture' => 'VP of Architecture',
                'Chief Architect' => 'Chief Architect'
            ]
        ];

        $selectedArea = $this->InterestedArea;
        $selectedPositions = isset($positions[$selectedArea]) ? $positions[$selectedArea] : [];

		$fields->addFieldsToTab('Root.Main', [
			DropdownField::create('EntryLevel', 'Entry Level', $this->dbObject('EntryLevel')->enumValues()),
            DropdownField::create(
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
            ),
            DropdownField::create('InterestedPosition', 'Interested Position', $selectedPositions)
                ->setAttribute('class', 'form-control')
                ->setEmptyString('Select your position')
        ]);

		return $fields;
	}

    public function getFullName()
    {
        return $this->FirstName . ' ' . $this->LastName;
    }
}