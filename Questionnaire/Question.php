<?php

namespace Questionnaire;

abstract class Question
{
    public $question;
    public $question_name;
    public $question_validation;
    public $question_error = '';

    public static function Error($message) {
        return '<div class="p text-danger">' . $message . '</div>';
    }


    abstract public function validateQuestion();
    abstract public function displayQuestion();

}
