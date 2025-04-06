<?php

namespace PathwayAI\Partials;

use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\FieldType\DBDatetime;
use PathwayAI\Partials\User;
use PathwayAI\Models\Page\QuizPage;

class QuizSubmission extends DataObject
{
    private static $table_name = 'QuizSubmission';

    private static $db = [
        'Score' => 'Int',
        'SubmittedDate' => 'Datetime',
    ];

    private static $has_one = [
        'User' => User::class,
        'QuizPage' => QuizPage::class,
    ];

    private static $summary_fields = [
        'QuizPage.Title' => 'Quiz',
        'User.FullName' => 'User',
        'Score' => 'Score',
        'SubmittedDate' => 'Submitted Date',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $userMap = User::get()->map('ID', 'FullName')->toArray();
        $fields->replaceField('UserID', DropdownField::create(
            'UserID',
            'User',
            $userMap
        )->setEmptyString('Select user')->setDisabled(true));

        $fields->dataFieldByName('Score')->setDisabled(true);
        $fields->dataFieldByName('SubmittedDate')->setDisabled(true);
        $fields->dataFieldByName('QuizPageID')->setDisabled(true);

        return $fields;
    }

    // In PathwayAI\Partials\QuizSubmission

public function getPercentage()
{
    $totalQuestions = $this->QuizPage()->Questions()->count();
    return $totalQuestions > 0 ? round(($this->Score / $totalQuestions) * 100, 2) : 0;
}

public function getGrade()
{
    $percentage = $this->getPercentage();

    if ($percentage >= 90) {
        return 'A';
    } elseif ($percentage >= 80) {
        return 'B';
    } elseif ($percentage >= 70) {
        return 'C';
    } elseif ($percentage >= 60) {
        return 'D';
    } else {
        return 'F';
    }
}

}
