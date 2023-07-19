<?php

require_once 'private/init.php';
require_once 'Questionnaire/Question.php';
require_once 'Questionnaire/Form.php';
require_once 'Questionnaire/RadioCheck.php';
require_once 'Questionnaire/TextBox.php';
require_once 'Questionnaire/Select.php';
require_once 'Questionnaire/Questionnaire.php';
require_once 'Questionnaire/Node.php';
use Questionnaire\{Questionnaire ,Form, RadioCheck, TextBox, Select, Node};
$hpi = new Questionnaire( 'HPI',

        [
                new Form(
                        'test',
                        [
                                new RadioCheck('test',1, 'yes,no', 'RADIO_DEFAULT'),
                                new RadioCheck('test',2, 'acnee,fever', 'RADIO_DEFAULT'),
                                new TextBox('te st',3, 'TEXTBOX_DEFAULT'),
                                new Select('test',4, 'yes,no', 'SELECT_DEFAULT')
                        ],
                ),

                new Form(
                        'test2',
                        [
                                new RadioCheck('test',1, 'yes,no', 'RADIO_DEFAULT'),
                                new RadioCheck('test',2, 's,fever', 'RADIO_DEFAULT'),
                                new TextBox('te st',3, 'TEXTBOX_DEFAULT'),
                                new Select('test',4, 'yes,no', 'SELECT_DEFAULT')
                        ]
                ),

                new Form(
                        'test3',
                        [
                                new RadioCheck('test',1, 'yes,no', 'RADIO_DEFAULT'),
                                new RadioCheck('test',2, 's,fever', 'RADIO_DEFAULT'),
                                new TextBox('te st',3, 'TEXTBOX_DEFAULT'),
                                new Select('test',4, 'yes,no', 'SELECT_DEFAULT')
                        ]
                )
        ],


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

            <form class="border rounded border-secondary shadow-lg" action="survey.php" method="post">

                <?php

                    $hpi->render();

                ?>



            </form>

        </section>

        <?php include 'private/temps/footer.temp.php'?>

    </body>


</html>
