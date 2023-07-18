<?php

namespace Questionnaire;

class TextBox extends Question
{
    public static function TEXTBOX_DEFAULT()
    {
        return true;
    }

    public function sessionSerialize()
    {
        $_SESSION[$this->question_name] = $_POST[$this->question_name];
    }

    public function __construct($question, $question_name, $question_validation) {
        $this->question = $question;
        $this->question_name = $question_name;
        $this->question_HTML .= "<h5 class='fs-5 mb-2 mt-2'>" . $question . "</h5>";
        $this->question_HTML .= "<div class='input-group-md'>";
        $this->question_HTML .= "<input type='text' class='form-control' name='" . $question_name . "' id='" . $question_name . "'>";
        $this->question_HTML .= "</div>";
        $this->question_validation = $question_validation;
    }

    public function validateQuestion()
    {
        $function = $this->question_validation;
        TextBox::$function();
    }
}