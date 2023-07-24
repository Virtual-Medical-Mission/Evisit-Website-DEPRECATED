<?php
require_once 'private/init.php';
require_once 'Questionnaire/Question.php';
require_once 'Questionnaire/Form.php';
require_once 'Questionnaire/RadioCheck.php';
require_once 'Questionnaire/TextBox.php';
require_once 'Questionnaire/Select.php';
require_once 'Questionnaire/Calendar.php';
require_once 'Questionnaire/Questionnaire.php';
require_once 'Questionnaire/Node.php';
require_once 'Questionnaire/DxTx.php';

use Questionnaire\{Questionnaire, Question, Form, RadioCheck, TextBox, Select, Calendar, Node, DxTx};

$hpi = new Questionnaire('hpi',

    [
        new Form('page1',
            [
                new RadioCheck('Do you feel sick today?', '1', 'Yes,No', "RADIO_DEFAULT"),
                new Select("What is your favorite color?", 2, 'Green,Red,Blue,Purple', "SELECT_DEFAULT"),
                new TextBox('What is your name?', 3, "TEXTBOX_DEFAULT"),
                new Calendar("When were you born?", 4, "CALENDAR_DEFAULT")
            ]
        ),

        new Form('page2',
            [
                new TextBox('What is your age?', 1, "TEXTBOX_DEFAULT"),
                new RadioCheck('Do you have a cough?', 2, 'Yes,No', "RADIO_DEFAULT"),
            ]
        ),

        new Form('page3',
            [
                new TextBox('What is your favorite food?', 1, "TEXTBOX_DEFAULT"),
                new RadioCheck('Do you have a fever?', 2, 'Yes,No', "RADIO_DEFAULT"),
            ]
        ),

    ]
);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/private/assets/css/style.css" />
    <link rel="stylesheet" href="/private/assets/css/questionnaire.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Survey</title>
</head>

<body>
<?php vmm_banner('Demo Survey'); ?>
<section class="shadow contact-clean" style="background-color: antiquewhite">

    <form class="border rounded border-secondary shadow-lg" action="test.php" method="post">

        <?php

        $hpi->render();

        ?>



    </form>

</section>

<?php include 'private/temps/footer.temp.php'?>

</body>


</html>