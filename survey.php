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
global $evisit_db;
if(!isset($_SESSION['survey']) or !isset($_SESSION['username'])) {
    redirect_to('index.php');
}
$evisit = new Questionnaire('evisit',

    [
new Form(
'40',
[
new RadioCheck('Question', 1,'Option1,Option2', 'RADIO_DEFAULT')
],
[
new Node('14', 'Option1'),
new Node('18', 'Option2')
]
),

new Form(
'18',
[
new RadioCheck('Question', 1,'Option1,Option2', 'RADIO_DEFAULT')
],
[
new Node(new DxTx('Diagnosis', 'Treatment'), 'Option1'),
new Node(new DxTx('diagnosisPending', 'treatmentPending'), 'Option2')
]
),

new Form(
'14',
[
new RadioCheck('Question', 1,'Option1,Option2', 'RADIO_DEFAULT')
],
[
new Node(new DxTx('Diagnosis', 'Treatment'), 'Option1'),
new Node(new DxTx('diagnosisPending', 'treatmentPending'), 'Option2')
]
),

],
'diagnosis',
$evisit_db,
'thankyou.php'
);

//var_dump($_SESSION);
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

    <form class="border rounded border-secondary shadow-lg" action="survey.php" method="post">

        <?php

        $evisit->render();

        ?>



    </form>

</section>

<?php include 'private/temps/footer.temp.php'?>

</body>


</html>