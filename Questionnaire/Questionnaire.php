<?php

namespace Questionnaire;

class Questionnaire
{
    public $name;
    public $forms;
    public $position = 0;
    public function __construct($name, $forms) {
        $this->name = $name;
        $this->forms = $forms;
    }

    public function render() {
        $this->forms[$this->position]->display();
        echo "<div class='text-center mt-5'>";
        if($this->position == 0) {
            echo "<input style='background-color: mediumseagreen' type='submit' class='btn' name='next' value='next'>";
        } elseif ($this->position > 0 and $this->position < count($this->forms) - 1) {
            echo "<input style='background-color: mediumseagreen' type='submit' class='btn mr-2' name='back' value='back'>";
            echo "<input style='background-color: mediumseagreen' type='submit' class='btn' name='next' value='next'>";
        } else {
            echo "<input style='background-color: mediumseagreen' type='submit' class='btn' name='back' value='back'>";
            echo "<input style='background-color: mediumseagreen' type='submit' class='btn' name='finish' value='finish'>";
        }
        echo "</div>";

    }

}