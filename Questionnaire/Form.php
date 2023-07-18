<?php

namespace Questionnaire;
class Form implements \Iterator
{
    private $position = 0;
    public $form_name;
    public $questions;
    public function __construct($form_name, $questions) {
        $this->form_name = $form_name;
        $this->questions = $questions;
    }

    public function display() {
        foreach($this->questions as $question) {
            echo $question->displayQuestion();
        }
    }

    public function validate() {
        foreach($this->questions as $question) {
            $question->validateQuestion();
        }
    }

    public function current() {
        return $this->questions[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        $this->position = $this->position + 1;
    }

    public function rewind() {
        $this->position = 0;
    }

    public function valid() {
        return $this->position < count($this->questions);
    }

}
