<?php

namespace Questionnaire;

class Questionnaire
{
    //Used to allocate memory into session storage
    public $name;
    public $forms;
    public $unlock;
    public $db;
    public $next;
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

        if($_SESSION[$this->name]['nextCount'] == 0) {
            return true;
        } else {
            return false;
        }
    }

    //Checks if a form is a root/leads to DxTx (no next forms) Only applies to Branching Logic
    function isRoot() {
        $root = false;
        foreach($this->forms[$this->position]->nodes as $node) {
            if( DxTx::isDxTx($node->next_form) and !$node->response) {
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

    //Used to load the next form
    public function NEXT() {

        $this->SESSION_STORE();

        if($this->BranchingLogicDisabled()) {
            $this->position++;
            $_SESSION[$this->name]['position'] = $this->position;

        } else {
            // ----------------- BRANCHING LOGIC -----------------

            //Check if the current form has a node with a response that matches the current form response
            foreach($this->forms[$this->position]->nodes as $node) {
                if($node->response == $_SESSION[$this->name][$this->forms[$this->position]->form_name][$this->forms[$this->position]->questions[0]->question_name] ) {
                    //Check if the next form is DxTx
                    if(DxTx::isDxTx($node->next_form)) {
                        $_SESSION[$this->name]['path'][ $_SESSION[$this->name]['nextCount'] ] = $this->position;
                        $_SESSION[$this->name]['nextCount'] = $_SESSION[$this->name]['nextCount'] + 1;
                        //Allocate DxTx into session storage
                        $_SESSION[$this->name]['Dx'] = $node->next_form->diagnosis;
                        $_SESSION[$this->name]['Tx'] = $node->next_form->treatment;
                        $this->FINISH();
                    }
                    //Add form into path storage
                    $_SESSION[$this->name]['path'][ $_SESSION[$this->name]['nextCount'] ] = $this->position;
                    $_SESSION[$this->name]['nextCount'] = $_SESSION[$this->name]['nextCount'] + 1;
                    //Set up next form
                    $this->position = $this->getFormPositionByName($node->next_form);
                    $_SESSION[$this->name]['position'] = $this->position;
                    return 1;
                }
            }

            //Scan for default nodes with no response required
            foreach($this->forms[$this->position]->nodes as $node) {
                if(!$node->response) {
                    $_SESSION[$this->name]['path'][ $_SESSION[$this->name]['nextCount'] ] = $this->position;
                    $_SESSION[$this->name]['nextCount'] = $_SESSION[$this->name]['nextCount'] + 1;
                    $this->position = $this->getFormPositionByName($node->next_form);
                    $_SESSION[$this->name]['position'] = $this->position;
                    return 1;
                }
            }

            echo '<h1 class="text-danger">BRANCHING LOGIC ERROR: COULD NOT FIND NEXT FORM FROM NODES, CHECK YOUR BRANCHING LOGIC</h1>';

        }

    }

    //Used to load the previous form
    public function BACK() {
        if($this->BranchingLogicDisabled()) {
            $this->position--;
            $_SESSION[$this->name]['position'] = $this->position;
        } else {

            // ----------------- BRANCHING LOGIC -----------------
            //Uses path storage to quickly load the previous form without having to scan any nodes at all
            $this->position = $_SESSION[$this->name]['path'][ $_SESSION[$this->name]['nextCount'] - 1 ];
            $_SESSION[$this->name]['position'] = $this->position;
            $_SESSION[$this->name]['nextCount'] = $_SESSION[$this->name]['nextCount'] - 1;
            unset($_SESSION[$this->name]['path'][ $_SESSION[$this->name]['nextCount'] ]);


        }
    }

    public function FINISH() {
        $this->SESSION_STORE();
        if($this->BranchingLogicDisabled()) {
            foreach($this->forms as $form) {
                foreach($form->questions as $question) {
                    $sql = 'INSERT INTO embedded_responses (questionnaire, question, uid, response, apid) VALUES(';
                    $sql.= "'" . $this->name . "', ";
                    $sql.= "'" . $question->question . "', ";
                    $sql.= "'" . $_SESSION['uid'] . "', ";
                    $sql.= "'" . db_escape($this->db,$_SESSION[$this->name][$form->form_name][$question->question_name]). "', ";
                    $sql.= "'" . $_SESSION['apid'] . "')";
                    $result = mysqli_query($this->db, $sql);
                    confirm_result_set($result);

                }
            }
        }
        else {
            foreach ($_SESSION[$this->name]['path'] as $formPosition) {
                foreach ($this->forms[$formPosition]->questions as $question) {
                    $sql = 'INSERT INTO embedded_responses (questionnaire, question, uid, response, apid) VALUES(';
                    $sql.= "'" . $this->name . "', ";
                    $sql.= "'" . $question->question . "', ";
                    $sql.= "'" . $_SESSION['uid'] . "', ";
                    $sql.= "'" . db_escape($this->db,$_SESSION[$this->name][$this->forms[$formPosition]->form_name][$question->question_name]). "', ";
                    $sql.= "'" . $_SESSION['apid'] . "')";
                    $result = mysqli_query($this->db, $sql);
                    confirm_result_set($result);
                }
            }
        }
        $_SESSION[$this->unlock] = 'Unlocked';
        redirect_to($this->next);
    }

    //Main Construct function ran every time HTTP REQUEST is made
    public function __construct($name, $forms, $unlock, $db, $next) {

        //First initialization of the questionnaire
        if(!isset($_SESSION[$name])) {
            $this->name = $name;
            $this->forms = $forms;
            $this->unlock = $unlock;
            $this->db = $db;
            $this->next = $next;
            $this->position = 0;
            $_SESSION[$name]['position'] = 0;
            if(!$this->BranchingLogicDisabled()) {
                $_SESSION[$this->name]['path'] = array();
                $_SESSION[$this->name]['nextCount'] = 0;
            }

        }
        //Loads Questionnaire from session storage
        elseif (isset($_SESSION[$name])) {
            $this->name = $name;
            $this->forms = $forms;
            $this->unlock = $unlock;
            $this->db = $db;
            $this->next = $next;
            $this->position = $_SESSION[$name]['position'];
        }

        //----------------- POST REQUEST HANDLER -----------------
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Next button handler
            if(isset($_POST['next'])) {
                //Branching Logic enabled and Form Node is type root:
                if(!$this->BranchingLogicDisabled() and $this->isRoot()) {
                    $error = $this->forms[$this->position]->validate();
                    if(!$error) {
                        $this->SESSION_STORE();
                        $_SESSION[$this->name]['path'][ $_SESSION[$this->name]['nextCount'] ] = $this->position;
                        $_SESSION[$this->name]['nextCount'] = $_SESSION[$this->name]['nextCount'] + 1;
                        $_SESSION[$this->name]['Dx'] = $this->forms[$this->position]->nodes[0]->next_form->diagnosis;
                        $_SESSION[$this->name]['Tx'] = $this->forms[$this->position]->nodes[0]->next_form->treatment;
                        $this->FINISH();
                    }

                } else {
                    //Handles any Questionnaire type
                    $error = $this->forms[$this->position]->validate();
                    if(!$error) {
                        $this->NEXT();
                    }
                }
            }
            //Handles back button
            elseif(isset($_POST['back'])) {
                $this->BACK();
            }

            //Handles finish button
            elseif(isset($_POST['finish'])) {
                $this->FINISH();
            }


        }

    }

    //Renders the current form and displays it
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
