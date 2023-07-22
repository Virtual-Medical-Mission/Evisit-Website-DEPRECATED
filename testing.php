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

use Questionnaire\{Questionnaire, Form, RadioCheck, TextBox, Select, Calendar, Node};

$evisit = new Questionnaire('evisit',

    [
            //Start
            new Form( 'SOB',
                [
                        new RadioCheck('Do you have shortness of breath?', 1, 'Yes,No', 'RADIO_DEFAULT')
                ],
                [
                        new Node('SOB_resting', 'Yes'),
                        new Node('Cough', 'No')
                ]
            ),

            //SOB pathway
            new Form(
                    'SOB_resting',
                [
                        new RadioCheck('Do you have shortness of breath while resting?', 1, 'Yes,No', 'RADIO_DEFAULT')
                ],
                [
                        new Node('swelling', 'Yes'),
                        new Node('SOB_exercise', 'No')
                ]
            ),

            new Form(
                   'swelling',
                [
                        new RadioCheck('Do you have swelling?', 1, 'Yes,No', 'RADIO_DEFAULT')
                ],
                [
                    new Node('chest_pain', 'Yes'),
                    new Node('wheezing', 'No')
                ]
            ),

            new Form(
                'chest_pain',
                [
                    new RadioCheck('Do you have chest_pain?', 1, 'Yes,No', 'RADIO_DEFAULT')
                ],
                [
                    new Node('known_heart_condition', 'Yes'),
                    new Node('wheezing', 'No')
                ]
            ),

            new Form(
                'wheezing',
                [
                    new RadioCheck('Do you have wheezing?', 1, 'Yes,No', 'RADIO_DEFAULT')
                ],
                [
                    new Node(false, 'Yes'),
                    new Node('smoker', 'No')
                ]
            ),

            new Form(
                'smoker',
                [
                    new RadioCheck('Are you a smoker?', 1, 'Yes,No', 'RADIO_DEFAULT')
                ],
                [
                    new Node(false)
                ]
            ),

            new Form(
                       'known_heart_condition',
                    [
                            new RadioCheck('Do you have a known heart condition?', 1, 'Yes,No', 'RADIO_DEFAULT')
                    ],
                    [
                        new Node(false, 'Yes'),
                        new Node('burning_sensation', 'No')
                    ]
                ),

            new Form(
                'burning_sensation',
                [
                    new RadioCheck('Do you have a burning sensation?', 1, 'Yes,No', 'RADIO_DEFAULT')
                ],
                [
                    new Node(false, 'Yes'),
                    new Node('wheezing', 'No')
                ]
            ),

            new Form(
                'SOB_exercise',
                [
                    new RadioCheck('Do you have shortness of breath while exercising?', 1, 'Yes,No', 'RADIO_DEFAULT')
                ],
                [
                    new Node('wheezing2', 'Yes'),
                    new Node('SOB_cause', 'No')
                ]
            ),

            new Form(
                'wheezing2',
                [
                    new RadioCheck('Do you have wheezing', 1, 'Yes,No', 'RADIO_DEFAULT')
                ],
                [
                    new Node('asthma_copd', 'Yes'),
                    new Node(false, 'No')
                ]
            ),

            new Form(
                'asthma_copd',
                [
                    new RadioCheck('Do you have Asthma/COPD?', 1, 'Yes,No', 'RADIO_DEFAULT')
                ],
                [
                    new Node(false)
                ]
            ),


            new Form(
                    'SOB_cause',
                [
                     new TextBox('Describe what causes this shortness of breath?', 1, 'TEXTBOX_DEFAULT')
                ],
                [
                     new Node(false)
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
<?php vmm_banner('E-visit Survey'); ?>
<section class="shadow contact-clean" style="background-color: antiquewhite">

    <form class="border rounded border-secondary shadow-lg" action="testing.php" method="post">

        <?php

        $evisit->render();

        ?>



    </form>

</section>

<?php include 'private/temps/footer.temp.php'?>

</body>


</html>
