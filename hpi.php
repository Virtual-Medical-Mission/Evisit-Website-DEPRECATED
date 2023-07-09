<?php

require_once 'private/init.php';
require __DIR__ . '/vendor/autoload.php'; // remove this line if you use a PHP Framework.
use Orhanerday\OpenAi\OpenAi;






//Requires user to be logged in and an HPI session to be started
require_login('login.php');
require_hpi_session('login.php');

//Setup HPI AI
$open_ai_key = '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';
$HPI_AI = new OpenAi($open_ai_key);


//Error variable handler
$errors = [
    'present' => false,
    'language' => '',
    'tribe' => '',
    'location' => '',
    'start_date' => '',
    'medical_conditions' => '',
    'medications' => '',
    'surgeries' => '',
    'allergies' => '',
    'hospitalized' => '',
    'clean_water' => '',
    'transportation' => '',
    'immunizations' => '',
    'dietary_restrictions' => '',
    'smoke_rate' => '',
    'alcohol_rate' => '',
    'drug_rate' => '',
    'physical_activities' => '',
    'family_history' => '',
];

//Handler for the current HPI data stored in session storage
$hpi_data = $_SESSION['hpi'];
//current page of the HPI form
$hpi_page = $hpi_data['page'];
//what number the last page is for HPI form
$end_page = $hpi_data['page_end'];

//If a post request is made
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    //If the back button is not pressed which means next button and finish button
    if(!isset($_POST['back'])) {
        //Validates the data, updates session storage if data passes validation, and returns errors
        $validate = loadValidation($hpi_page, $_POST, $HPI_AI);
        //If there are no errors
        if(!$validate['present']) {
            //If the next button is pressed
            if(isset($_POST['next'])) {
                //Update session storage and increment page number
                $_SESSION['hpi']['page'] = $hpi_page + 1;
                //reassigns hpi data handler
                $hpi_data = $_SESSION['hpi'];
                //reassigns page number handler
                $hpi_page++;
            }
            //Else if the finish button is pressed
            elseif (isset($_POST['finish'])) {
                //if it passes validation, submits the HPI data to the database, deletes HPI session, and redirects to the pairing page
                submit_hpi($_SESSION['hpi']);
                redirect_to('pairing.php');
            }

        } else {
            //if there were errors in the validation, reassigns errors handler
            $errors = $validate;
            $hpi_data = $_SESSION['hpi'];
        }
    }
    //Else if the back button is pressed
    elseif(isset($_POST['back'])) {
        //decrements page number and reassigns hpi data handler
        $_SESSION['hpi']['page'] = $hpi_page - 1;
        $hpi_data = $_SESSION['hpi'];
        $hpi_page--;
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/private/assets/css/style.css" />
    <link rel="stylesheet" href="/private/assets/css/hpi.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>HPI</title>
</head>


<body>
<?php vmm_banner('HPI Form'); ?>
<section class="shadow contact-clean" style="background-color: antiquewhite">
    <h2 class="text-center">Page <?=$hpi_page?>/<?= $end_page?></h2>
    <form class="bg-light border rounded border-secondary shadow-lg" action="hpi.php" method="post">
        <!-- Loads different pages of form questions based off of current HPI page, the hpi data handler which allows it to remember user response, and errors-->
        <?php loadPage($hpi_page, $hpi_data, $errors); ?>


        <!-- If the current page is the first page, only show the next button, if it is between first and last page show back and next button, if it is last page show back and final button -->
        <?php if($hpi_page == 1) { ?>
            <div class="text-center mt-5">
                <input class="btn" style="background-color: mediumseagreen" type="submit" name="next" value="next">
            </div>
        <?php } elseif($hpi_page > 1 and $hpi_page < $end_page){ ?>
            <div class="text-center mt-5">
                <input class="btn" style="background-color: mediumseagreen" type="submit" name="back" value="back"/>
                <input class="btn" style="background-color: mediumseagreen" type="submit" name="next" value="next"/>
            </div>
        <?php } elseif($hpi_page == $end_page){ ?>
            <div class="text-center mt-5">
                <input class="btn" style="background-color: mediumseagreen" type="submit" name="back" value="back">
                <input class="btn" style="background-color: mediumseagreen" type="submit" name="finish" value="finish">
            </div>
        <?php } ?>
    </form>
</section>

<?php include 'private/temps/footer.temp.php'?>
</body>


</html>
