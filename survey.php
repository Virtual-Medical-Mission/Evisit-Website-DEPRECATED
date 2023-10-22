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
                new Node(new DxTx('none', 'Rescue Inhaler'), 'Yes'),
                new Node('smoker', 'No')
            ]
        ),

        new Form(
            'smoker',
            [
                new RadioCheck('Are you a smoker?', 1, 'Yes,No', 'RADIO_DEFAULT')
            ],
            [
                new Node(new DxTx('none', 'Laisx x3 Days + Inhaler'), 'Yes'),
                new Node(new DxTx('none', 'Inhaler'), 'No'),
            ]
        ),

        new Form(
            'known_heart_condition',
            [
                new RadioCheck('Do you have a known heart condition?', 1, 'Yes,No', 'RADIO_DEFAULT')
            ],
            [
                new Node(new DxTx('none', 'Nitro SL'), 'Yes'),
                new Node('burning_sensation', 'No')
            ]
        ),

        new Form(
            'burning_sensation',
            [
                new RadioCheck('Do you have a burning sensation?', 1, 'Yes,No', 'RADIO_DEFAULT')
            ],
            [
                new Node('throatchest_burning', 'Yes'),
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
                new Node(new DxTx('none', 'Rescue Inhaler'), 'No')
            ]
        ),

        new Form(
            'asthma_copd',
            [
                new RadioCheck('Do you have Asthma/COPD?', 1, 'Yes,No', 'RADIO_DEFAULT')
            ],
            [
                new Node(new DxTx('none', 'Long term and rescue inhaler'), 'Yes'),
                new Node(new DxTx('none', 'Rescue Inhaler'), 'No'),
            ]
        ),


        new Form(
            'SOB_cause',
            [
                new TextBox('Describe what causes this shortness of breath?', 1, 'TEXTBOX_DEFAULT')
            ],
            [
                new Node(new DxTx('none', 'none'), false)
            ]
        ),

        //SOB Gerd

        new Form(
                'throatchest_burning',
                [
                    new RadioCheck("Do you have a burning sensation in your chest or throat?", '1', 'Yes,No', 'RADIO_DEFAULT')
                ],

                [
                        new Node('regurgitating', "Yes"),
                        new Node(new DxTx('false', 'false'), 'No')
                ]
        ),

        new Form(
            'regurgitating',
            [
                new RadioCheck("Do you have regurgitation?", '1', 'Yes,No', 'RADIO_DEFAULT')
            ],

            [
                new Node('reg_morethanonceperweek', "Yes"),
                new Node(new DxTx('Acid Reflux', 'none'), 'No')
            ]
        ),

        new Form(
            'reg_morethanonceperweek',
            [
                new RadioCheck("Does it occure more than once per week?", '1', 'Yes,No', 'RADIO_DEFAULT')
            ],

            [
                new Node('chestpainbehindbreastbone', "Yes"),
                new Node(new DxTx('Gastris Gallstone Peptic ulcer', 'none'), 'No')
            ]
        ),

        new Form(
            'chestpainbehindbreastbone',
            [
                new RadioCheck("Do you have chest pain?", '1', 'Yes,No', 'RADIO_DEFAULT')
            ],

            [
                new Node('asthmadiagnosed', "Yes"),
                new Node('paindifficultyswallowing', 'No')
            ]
        ),

        new Form(
            'asthmadiagnosed',
            [
                new RadioCheck("Do you have a diagnosis of asthma?", '1', 'Yes,No', 'RADIO_DEFAULT')
            ],

            [
                new Node(new Dxtx('Asthma', 'Use inhaler or other remedy'), "Yes"),
                new Node('paindifficultyswallowing', 'No')
            ]
        ),

        new Form(
            'asthmadiagnosed',
            [
                new RadioCheck("Do you have a diagnosis of asthma?", '1', 'Yes,No', 'RADIO_DEFAULT')
            ],

            [
                new Node('asthmadiagnosed', "Yes"),
                new Node('paindifficultyswallowing', 'No')
            ]
        ),

        new Form(
            'paindifficultyswallowing',
            [
                new RadioCheck("Do you have pain or difficulty swallowing?", '1', 'Yes,No', 'RADIO_DEFAULT')
            ],

            [
                new Node(new DxTx('false', 'false'), "Yes"),
                new Node('chroniccoughunrelatedtocold', 'No')
            ]
        ),

        new Form(
            'chroniccoughunrelatedtocold',
            [
                new RadioCheck("Do you have a chronic cough that is not related to cold.", '1', 'Yes,No', 'RADIO_DEFAULT')
            ],

            [
                new Node(new DxTx('false', 'false'), "Yes"),
                new Node('changesinvoice', 'No')
            ]
        ),

        new Form(
            'changesinvoice',
            [
                new RadioCheck("Do you have any changes in your voice currently?", '1', 'Yes,No', 'RADIO_DEFAULT')
            ],

            [
                new Node(new DxTx('false','false'), "Yes"),
                new Node(new DxTx('false','false'), 'No')
            ]
        ),

        //Cough Track

        new Form(
            'Cough',
            [
                new RadioCheck("Do you have a cough?", 1, "Yes,No", 'RADIO_DEFAULT')
            ],
            [
                new Node('fever', 'Yes'),
                new Node(new DxTx('none', 'none'), 'No')
            ]
        ),

        new Form(
            'fever',
            [
                new RadioCheck("Do you have a fever?", 1, "Yes,No", 'RADIO_DEFAULT')
            ],
            [
                new Node('traveled_recently', 'Yes'),
                new Node('when_cough', 'No')
            ]
        ),

        new Form(
            'traveled_recently',
            [
                new RadioCheck("Have you traveled recently?", 1, "Yes,No", 'RADIO_DEFAULT')
            ],
            [
                new Node(new DxTx('none', 'none'), 'Yes'),
                new Node('cough_duration', 'No')
            ]
        ),

        new Form(
            'cough_duration',
            [
                new RadioCheck("How long have you had a cough with fever for?", 1, "<1 wk,>1-3 wks,>3 wks", 'RADIO_DEFAULT')
            ],
            [
                new Node('wetdry', '<1 wk'),
                new Node('blood_in_cough', '>1-3 wks'),
                new Node('blood_in_cough', '>3 wks'),
            ]
        ),

        new Form(
            'wetdry',
            [
                new RadioCheck("Is your cough wet or dry?", 1, "Wet,Dry", 'RADIO_DEFAULT')
            ],
            [
                new Node('blood_in_cough2', 'Wet'),
                new Node('runny_nose', 'Dry')
            ]
        ),

        new Form(
            'blood_in_cough2',
            [
                new RadioCheck("Do you have blood in your cough?", 1, "Yes,No", 'RADIO_DEFAULT')
            ],
            [
                new Node(new DxTx('none', 'Antibiotics CAP'), false)
            ]
        ),

        new Form(
            'runny_nose',
            [
                new RadioCheck("Do you have a runny_nose", 1, "Yes,No", 'RADIO_DEFAULT')
            ],
            [
                new Node(false)
            ]
        ),

        new Form(
            'blood_in_cough',
            [
                new RadioCheck("Do you have blood in your cough?", 1, "Yes,No", 'RADIO_DEFAULT')
            ],
            [
                new Node('history_tuberculosis', 'Yes'),
                new Node('weight_loss', 'No')
            ]
        ),

        new Form(
            'history_tuberculosis',
            [
                new RadioCheck("Do you have a history of Tuberculosis?", 1, "Yes,No", 'RADIO_DEFAULT')
            ],
            [
                new Node(new DxTx('Possible TB with CAP', 'none'), 'Yes'),
                new Node('weightloss_or_sweatnchills', 'No')
            ]
        ),

        new Form(
            'weightloss_or_sweatnchills',
            [
                new RadioCheck("Do you have weight loss or sweat and chills?", 1, "Yes,No", 'RADIO_DEFAULT')
            ],
            [
                new Node(new DxTx('HIV or TB', 'TB, CAP'), 'Yes'),
                new Node('HIV', 'No')
            ]
        ),

        new Form(
            'HIV',
            [
                new RadioCheck("Do you have HIV", 1, "Yes,No", 'RADIO_DEFAULT')
            ],
            [
                new Node(new DxTx('HIV or TB', 'Bacterium and CAP'), 'Yes'),
                new Node(new DxTx('CAP', 'none'), 'No')
            ]
        ),

        new Form(
            'weight_loss',
            [
                new RadioCheck("Do you have weight loss?", 1, "Yes,No", 'RADIO_DEFAULT')
            ],
            [
                new Node(new DxTx('HIV or TB', 'TB, CAP'), 'Yes'),
                new Node('history_tuberculosis2', 'No')
            ]
        ),

        new Form(
            'history_tuberculosis2',
            [
                new RadioCheck("Do you have a history of tuberculosis", 1, "Yes,No", 'RADIO_DEFAULT')
            ],
            [
                new Node(new DxTx('CAP', 'none'), 'Yes'),
                new Node('sweatnchills', 'No')
            ]
        ),

        new Form(
            'sweatnchills',
            [
                new RadioCheck("Do you have Sweat or Chills?", 1, "Yes,No", 'RADIO_DEFAULT')
            ],
            [
                new Node(new DxTx('HIV or TB', 'CAP+Bac'), 'Yes'),
                new Node(new DxTx('none', 'none'), 'No'),
            ]
        ),

        new Form(
            'when_cough',
            [
                new RadioCheck("When do you Cough?", 1, "Day Only, Night Only,Both", 'RADIO_DEFAULT')
            ],
            [
                new Node('environment', 'Day Only'),
                new Node(new DxTx('GERD', 'GERD'), 'Night Only'),
                new Node('cough_duration2', 'Both'),
            ]
        ),

        new Form(
            'environment',
            [
                new TextBox('What is your environment like?', 1, 'TEXTBOX_DEFAULT')
            ],
            [
                new Node('diet')
            ]
        ),

        new Form(
            'diet',
            [
                new TextBox('What is your diet like?', 1, 'TEXTBOX_DEFAULT')
            ],
            [
                new Node(new DxTx('GERD', 'GERD'))
            ]
        ),

        new Form(
            'cough_duration2',
            [
                new RadioCheck("How long have you had cough for?", 1, "<1 wk,>1-3 wks,>3 wks", 'RADIO_DEFAULT')
            ],
            [
                new Node('wetordry1', '<1 wk'),
                new Node('wetordry2', '>1-3 wks'),
                new Node('wetordry3', '>3 wks'),
            ]
        ),

        new Form(
            'wetordry1',
            [
                new RadioCheck("Is your cough wet or dry?", 1, "Wet,Dry", 'RADIO_DEFAULT')
            ],
            [
                new Node('spit_color', 'Wet'),
                new Node(new DxTx('Acute Bronchitis vs Allergy/Other', 'Zpac + OTC allergy'), 'Dry')

            ]
        ),

        new Form(
            'spit_color',
            [
                new RadioCheck("What is the color of your spit?", 1, "White Or Clear,Yellow or Green,Red", 'RADIO_DEFAULT')
            ],
            [
                new Node(new DxTx('Acute Bronchitis vs Allergy/Other', 'Zpac + OTC allergy'), 'White or Clear'),
                new Node(new DxTx('Acute Bronchitis', 'Zpac'), 'Yellow or Green'),
                new Node(new DxTx('none', 'none'), 'Red')
            ]
        ),

        new Form(
            'wetordry2',
            [
                new RadioCheck("Is your cough wet or dry?", 1, "Wet,Dry", 'RADIO_DEFAULT')
            ],
            [
                new Node('spit_color', 'Wet'),
                new Node('asthma', 'Dry')
            ]
        ),

        new Form(
            'asthma',
            [
                new RadioCheck("Do you have Asthma?", 1, "Yes,No", 'RADIO_DEFAULT')
            ],
            [
                new Node(new DxTx('none', 'Zpac or doxy'), 'Yes'),
                new Node('smoker2', 'No')
            ]
        ),

        new Form(
            'smoker2',
            [
                new RadioCheck("Are you a Smoker?", 1, "Yes,No", 'RADIO_DEFAULT')
            ],
            [
                new Node(new DxTx('none', 'Zpac or doxy'), 'Yes'),
                new Node(new DxTx('Acute Bronchitis', 'Zpac'), 'No'),
            ]
        ),

        new Form(
            'wetordry3',
            [
                new RadioCheck("Is your cough wet or dry?", 1, "Wet,Dry", 'RADIO_DEFAULT')
            ],
            [
                new Node('blood_in_spit', 'Wet'),
                new Node('allergies', 'Dry')
            ]
        ),

        new Form(
            'blood_in_spit',
            [
                new RadioCheck("Do you have blood in your spit?", 1, "Yes,No", 'RADIO_DEFAULT')
            ],
            [
                new Node(new DxTx('none', 'none'), 'Yes'),
                new Node('allergies', 'No')
            ]
        ),

        new Form(
            'allergies',
            [
                new RadioCheck("Do you have any allergies?", 1, "Yes,No", 'RADIO_DEFAULT')
            ],
            [
                new Node(new DxTx('Allergies', 'OTC Allergy / Sinus'), false)
            ]
        ),

    ],
'diagnosis',
$evisit_db,
'thankyou.html'
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
