<?php

namespace PathwayAI\Partials;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use PathwayAI\Partials\Answer;
use PathwayAI\Models\Page\QuizPage;

class Question extends DataObject
{
    private static $table_name = 'Question';

    private static $db = [
        'QuestionText' => 'Text',
    ];

    private static $has_one = [
        'QuizPage' => QuizPage::class,
    ];

    private static $has_many = [
        'Answers' => Answer::class,
    ];

    private static $summary_fields = [
        'QuestionText' => 'Question',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab(
            'Root.Answers',
            GridField::create(
                'Answers',
                'Answers',
                $this->Answers(),
                GridFieldConfig_RecordEditor::create()
            )
        );

        return $fields;
    }
}
