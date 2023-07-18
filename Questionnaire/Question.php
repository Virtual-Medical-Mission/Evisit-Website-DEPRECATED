<?php

namespace Questionnaire;

abstract class Question
{
    public $question;
    public $question_name;
    public $question_HTML;
    public $question_validation;
    public function displayQuestion() {
        echo $this->question_HTML;
    }

    abstract public function validateQuestion();
    abstract public function sessionSerialize();

}
