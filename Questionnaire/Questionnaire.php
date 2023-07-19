<?php

namespace Questionnaire;

class Questionnaire
{
    public $name;
    public $forms;
    public $position;


    public function SESSION_STORE() {
        foreach($this->forms[$this->position]->questions as $question) {
            $_SESSION[$this->name][$question->question_name] = $_POST[$question->question_name];
        }
    }

    public function NEXT() {
        $this->SESSION_STORE();
        if($this->forms[$this->position]->nodes == null or count($this->forms[$this->position]->questions) > 1) {
            $this->position++;
            $_SESSION[$this->name]['position'] = $this->position;
        }

    }

    public function BACK() {
        if($this->forms[$this->position]->nodes == null or count($this->forms[$this->position]->questions) > 1) {
            $this->position--;
            $_SESSION[$this->name]['position'] = $this->position;
        }
    }

    public function __construct($name, $forms) {


        if(!isset($_SESSION[$name])) {
            $this->name = $name;
            $this->forms = $forms;
            $this->position = 0;
            $_SESSION[$name]['position'] = 0;
        } elseif (isset($_SESSION[$name])) {
            $this->name = $name;
            $this->forms = $forms;
            $this->position = $_SESSION[$name]['position'];
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            if(isset($_POST['next'])) {
                $error = $this->forms[$this->position]->validate();
                if(!$error) {
                    $this->NEXT();
                }
            }

            elseif(isset($_POST['back'])) {
                $this->BACK();
            }

        }

    }

    public function render() {
        $this->forms[$this->position]->display();
        if($this->position == 0) {
            echo '<div class="text-center mt-5">
                        <input class="btn" style="background-color: mediumseagreen" type="submit" name="next" value="next">
                    </div>';
        } elseif($this->position > 0 and $this->position < count($this->forms) - 1) {
            echo '<div class="text-center mt-5">
                        <input class="btn" style="background-color: mediumseagreen" type="submit" name="back" value="back">
                        <input class="btn" style="background-color: mediumseagreen" type="submit" name="next" value="next">
                    </div>';
        } else {
            echo ' <div class="text-center mt-5">
                        <input class="btn" style="background-color: mediumseagreen" type="submit" name="back" value="back">
                        <input class="btn" style="background-color: mediumseagreen" type="submit" name="finish" value="finish">
                    </div>';
        }

    }

}
