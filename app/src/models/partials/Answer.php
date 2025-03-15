<?php

namespace PathwayAI\Partials;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use PathwayAI\Partials\Question;

class Answer extends DataObject
{
    private static $table_name = 'Answer';

    private static $db = [
        'AnswerText' => 'Varchar(255)',
        'IsCorrect' => 'Boolean',
    ];

    private static $has_one = [
        'Question' => Question::class,
    ];

    private static $summary_fields = [
        'AnswerText' => 'Answer',
        'IsCorrect.Nice' => 'Correct Answer?',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        return $fields;
    }
}
