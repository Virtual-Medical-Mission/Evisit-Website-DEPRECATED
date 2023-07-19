<?php

namespace Questionnaire;
class Form
{
    public $form_name;
    public $questions;
    public $nodes;
    public function __construct($form_name, $questions, $nodes = null) {
        $this->form_name = $form_name;
        $this->questions = $questions;
        $this->nodes = $nodes;
    }

    public function display() {
        foreach($this->questions as $question) {
            echo $question->displayQuestion();
        }
    }

    public function validate() {
        $error = false;
        foreach($this->questions as $question) {
            if($question->validateQuestion()) {
                $error = true;
            }
        }
        return $error;
    }


}
