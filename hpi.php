<?php

require_once 'private/init.php';
require_login('login.php');

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

$hpi_data = $_SESSION['hpi'];
$hpi_page = $hpi_data['page'];
$end_page = $hpi_data['page_end'];
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!isset($_POST['back'])) {
        $validate = loadValidation($hpi_page, $_POST);
        if(!$validate['present']) {
            $_SESSION['hpi']['page'] = $hpi_page + 1;
            $hpi_data = $_SESSION['hpi'];
            $hpi_page++;
        } else {
            $errors = $validate;
        }
    } elseif(isset($_POST['back'])) {
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

        <?php loadPage($hpi_page, $hpi_data, $errors); ?>

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
