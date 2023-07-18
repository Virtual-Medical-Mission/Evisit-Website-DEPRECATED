<?php

namespace Questionnaire;
class RadioCheck extends Question
{
     public static function RADIO_DEFAULT() {
        return true;
    }
    public function __construct($question, $question_name, $options, $question_validation)
    {
        $this->question = $question;
        $this->question_name = $question_name;
        $options = explode(',', $options);
        $this->question_HTML .= "<h5 class='fs-5 mb-2 mt-2'>" . $question . "</h5>";
        foreach ($options as $option) {
            $this->question_HTML .= "<div class='form-check'>";
            $this->question_HTML .= "<input class='form-check-input' type='radio' name='" . $question_name . "' value='" . $option . "' id='" . $option . "'>";
            $this->question_HTML .= "<label class='form-check-label' for='" . $option . "'>" . $option . "</label>";
            $this->question_HTML .= "</div>";
        }
        $this->question_validation = $question_validation;
    }

    public function validateQuestion()
    {
        $function = $this->question_validation;
        RadioCheck::$function();
    }

    public function sessionSerialize()
    {
        $_SESSION[$this->question_name] = $_POST[$this->question_name];
    }

}