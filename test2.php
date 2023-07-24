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

$BL_Demo = new Questionnaire('demoBL',

    [
        new Form('wet_or_dry',
            [
                new RadioCheck('Is your cough wet or dry?', 1, 'Wet,Dry', "RADIO_DEFAULT")
            ],
            [
                new Node('blood_in_cough', "Wet"),
                new Node( "runny_nose", "Dry")
            ]
        ),

        new Form('blood_in_cough',
            [
                new RadioCheck('Do you have blood in your cough?', 1, 'Yes,No', "RADIO_DEFAULT")
            ],
            [
                new Node( new DxTx('none', 'Antibiotics CAP') )
            ]
        ),

        new Form('runny_nose',
            [
                new RadioCheck('Do you have a runny nose?', 1, 'Yes,No', "RADIO_DEFAULT")
            ],
            [
                new Node( new DxTx('Upper Respiratory Infections', 'Education'), 'Yes' ),
                new Node( new DxTx('No Respiratory Infections', 'Education'), 'No' ),
            ]
        )

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

    <form class="border rounded border-secondary shadow-lg" action="test2.php" method="post">

        <?php

        $BL_Demo->render();

        ?>



    </form>

</section>

<?php include 'private/temps/footer.temp.php'?>

</body>


</html>
