<?php

namespace Questionnaire;

class Node
{
    public $question_name;
    public $response;
    public $next_question;

    public function __construct($question_name, $response, $next_question) {
        $this->question_name = $question_name;
        $this->response = $response;
        $this->next_question = $next_question;
    }

}