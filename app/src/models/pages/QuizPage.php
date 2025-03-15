<?php

namespace PathwayAI\Models\Page;

use PathwayAI\Controllers\QuizPageController;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use PathwayAI\Partials\Question;
use SilverStripe\Forms\TextField;

class QuizPage extends \Page
{
	private static $controller_name = QuizPageController::class;

	private static $table_name = 'QuizPage';

    private static $db = [
        'Title' => 'Varchar',
        'Type' => "Enum('Business Management,Accounting,Information Technology,Human Resources,Engineering,Architecture,Fashion Design,Other')",
        'Duration' => 'Int',
    ];

    private static $has_one = [
        'Image' => Image::class
    ];

    private static $owns = [
		'Image'
	];


    private static $has_many = [
        'Questions' => Question::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('Content');
        $fields->removeByName('Metadata');

		$fields->addFieldsToTab('Root.Main', [
            DropdownField::create('Type', 'Quiz type', $this->dbObject('Type')->enumValues()),
			UploadField::create('Image', 'Image'),
			TextField::create('Title', 'Quiz name'),
			TextField::create('Duration', 'Duration')->setDescription('Minutes')
		]);

        $fields->addFieldToTab(
            'Root.Questions',
            GridField::create(
                'Questions',
                'Questions',
                $this->Questions(),
                GridFieldConfig_RecordEditor::create()
            )
        );

        return $fields;
    }
}
