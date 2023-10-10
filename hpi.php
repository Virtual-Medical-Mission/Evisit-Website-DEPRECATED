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
global $evisit_db;
if(!isset($_SESSION['hpi_ready'])) {
    redirect_to('index.php');
}

use Questionnaire\{Questionnaire, Question, Form, RadioCheck, TextBox, Select, Calendar, Node, DxTx};

$hpi = new Questionnaire('hpi', [

    new Form(

        'page1',
        [
            new Select('Primary Language', '1', 'English,Swahili', 'SELECT_DEFAULT'),
            new Select('Are you part of a tribe?', '2', "Yes,No", "SELECT_DEFAULT"),
            new TextBox('Where have you lived for the past 6 weeks?', '3', "TEXTBOX_DEFAULT"),
            new Calendar('When did you start living in that location?', '4', 'CALENDAR_DEFAULT')
        ]

    ),

    new Form(

        'page2',
        [
            new TextBox('Do you have any chronic medical conditions? If so, please list them:', '1', 'TEXTBOX_DEFAULT'),
            new TextBox('Do you take any medications? If so, please list them:', '2', 'TEXTBOX_DEFAULT'),
            new TextBox('Have you had any surgeries in the past? If so, please list them:', '3', 'TEXTBOX_DEFAULT'),
            new TextBox('Do you have any allergies? If so, please list them:', '4', 'TEXTBOX_DEFAULT'),
            new Select('Have you ever been hospitalized?', '5', 'No,Yes', 'SELECT_DEFAULT')
        ]

    ),

    new Form(
        'page3',
        [
            new Select('Do you have access to clean water?', '1', 'Yes,No', 'SELECT_DEFAULT'),
            new TextBox('What is your primary method of transportation?', '2', 'TEXTBOX_DEFAULT'),
            new Select('Are you up to date on all of your immunizations?', '3', 'Yes,No', 'SELECT_DEFAULT'),
            new TextBox('Do you have any dietary restrictions? If so, please list them:', '4', 'TEXTBOX_DEFAULT'),
        ]
    ),

    new Form(
        'page4',
        [
            new Select('How often do you smoke?', '1', 'Never,Occasionally,Daily', "SELECT_DEFAULT"),
            new Select('How often do you drink alcohol?', '2', 'Never,Occasionally,Daily', "SELECT_DEFAULT"),
            new Select('How often do you use recreational drugs?', '3', 'Never,Occasionally,Daily', "SELECT_DEFAULT"),
            new TextBox('Do you engage in physical activities? If so, please list them:', '4', 'TEXTBOX_DEFAULT'),
            new TextBox('Do you have any family history of disease? If so, please list them:', '5', 'TEXTBOX_DEFAULT')

        ]
    )

],
'survey',
$evisit_db,
'survey.php'
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
<?php vmm_banner('E-visit Survey'); ?>
<section class="shadow contact-clean" style="background-color: antiquewhite">

    <form class="border rounded border-secondary shadow-lg" action="hpi.php" method="post">

        <?php

        $hpi->render();

        ?>



    </form>

</section>

<?php include 'private/temps/footer.temp.php'?>