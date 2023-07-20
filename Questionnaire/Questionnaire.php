<?php

namespace Questionnaire;

class Questionnaire
{
    public $name;
    public $forms;
    public $position;

    //Checks if the current form has branching logic compatibility disabled
    //Requirements: 1 question for a form to be compatible with branching logic and have nodes which describe next form based on the current form response
    public function BranchingLogicDisabled() {
        if($this->forms[$this->position]->nodes == null or count($this->forms[$this->position]->questions) > 1) {
            return true;
        } else {
            return false;
        }
    }

    //Gets the position of a form in the forms array by its name
    public function getFormPositionByName($form_name) {
        $position = 0;
        foreach($this->forms as $form) {
            if($form->form_name == $form_name) {
                return $position;
            }
            $position++;
        }
        return $this->position;
    }

    //Check if a form is an origin (no previous forms) Only applies to Branching Logic
    public function isOrigin() {
        $origin = true;
        foreach($this->forms as $form) {
            foreach($form->nodes as $node) {
                if($node->next_form == $this->forms[$this->position]->form_name) {
                    $origin = false;
                }
            }
        }
        return $origin;
    }

    //Checks if a form is a root/leads to dx (no next forms) Only applies to Branching Logic
    function isRoot() {
        $root = false;
        foreach($this->forms[$this->position]->nodes as $node) {
            if(!$node->next_form and !$node->response) {
                $root = true;
            }
        }
        return $root;
    }

    //Serializes the current form responses from a POST request in the $_SESSION storage
    public function SESSION_STORE() {
        foreach($this->forms[$this->position]->questions as $question) {
            $_SESSION[$this->name][$this->forms[$this->position]->form_name][$question->question_name] = $_POST[$question->question_name];
        }
    }

    public function NEXT() {
        $this->SESSION_STORE();
        if($this->BranchingLogicDisabled()) {
            $this->position++;
            $_SESSION[$this->name]['position'] = $this->position;
        } else {
            //Check if the current form has a node with a response that matches the current form response
            foreach($this->forms[$this->position]->nodes as $node) {
                if($node->response == $_SESSION[$this->name][$this->forms[$this->position]->form_name][$this->forms[$this->position]->questions[0]->question_name] ) {
                    if(!$node->next_form) {
                        unset($_SESSION[$this->name]);
                        redirect_to('index.php');
                    }
                    $this->position = $this->getFormPositionByName($node->next_form);
                    $_SESSION[$this->name]['position'] = $this->position;
                    return 1;
                }
            }

            //Scan for default nodes with no response required
            foreach($this->forms[$this->position]->nodes as $node) {
                if(!$node->response) {
                    $this->position = $this->getFormPositionByName($node->next_form);
                    $_SESSION[$this->name]['position'] = $this->position;
                    return 1;
                }
            }

            echo '<h1 class="text-danger">BRANCHING LOGIC ERROR: COULD NOT FIND NEXT FORM FROM NODES, CHECK YOUR BRANCHING LOGIC</h1>';

        }

    }

    public function BACK() {
        if($this->BranchingLogicDisabled()) {
            $this->position--;
            $_SESSION[$this->name]['position'] = $this->position;
        } else {

            foreach($this->forms as $form) {
                foreach($form->nodes as $node) {
                    if($node->next_form == $this->forms[$this->position]->form_name) {
                        $this->position = $this->getFormPositionByName($form->form_name);
                        $_SESSION[$this->name]['position'] = $this->position;
                    }
                }
            }

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
                if(!$this->BranchingLogicDisabled() and $this->isRoot()) {
                    $error = $this->forms[$this->position]->validate();
                    if(!$error) {
                        unset($_SESSION[$this->name]);
                        redirect_to('index.php');
                    }
                } else {
                    $error = $this->forms[$this->position]->validate();
                    if(!$error) {
                        $this->NEXT();
                    }
                }
            }

            elseif(isset($_POST['back'])) {
                $this->BACK();
            }

        }

    }

    public function render() {
        $this->forms[$this->position]->display($this->name);
        if($this->BranchingLogicDisabled()) {
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
        } else {

            if($this->isOrigin()) {
                echo '<div class="text-center mt-5">
                        <input class="btn" style="background-color: mediumseagreen" type="submit" name="next" value="next">
                    </div>';
            } else {
                echo '<div class="text-center mt-5">
                        <input class="btn" style="background-color: mediumseagreen" type="submit" name="back" value="back">
                        <input class="btn" style="background-color: mediumseagreen" type="submit" name="next" value="next">
                    </div>';
            }

        }

    }

}
