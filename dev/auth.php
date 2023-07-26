<?php
session_start();
require_once '../private/util.php';
require_once '../private/server.php';
require_once '../private/database/db_credentials.php';
require_once '../private/database/database.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $xx = client_ipv4();
    if(!isset($_SESSION['blocked'])) {
        $blocked = false;
        if($_POST['name'] == '') {
            $blocked = true;
        }

        if($_POST['auth'] != 'alskdjfhggqpwoeirutyzmxncbv') {
            $blocked = true;
        }

        if(!$blocked) {
            $db = db_connect();
            $sql = "INSERT INTO auth (full_name,xxe) VALUES (";
            $sql .= "'" . db_escape($db, $_POST['name']) . "',";
            $sql .= "'" . $xx . "')";
            $result = mysqli_query($db, $sql);
            confirm_result_set($result);
            $_SESSION['auth'] = "True";
            redirect_to('https://evisit.azurewebsites.net/');

        } else {
            $_SESSION['blocked'] = 'True';
        }

    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../private/assets/css/style.css" />
    <link rel="stylesheet" href="../private/assets/css/questionnaire.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Survey</title>
</head>

<body style="background-color: antiquewhite">
<?php vmm_banner("You do not have access to this site yet:"); ?>
<section class=" mt-5 contact-clean" style="background-color: antiquewhite">

    <form class="border rounded border-secondary shadow-lg" action="auth.php" method="post">

        <h5 class="fs-5 mb-2 mt-2">Enter Your Full Name:</h5>
        <div class="input-group-md">
            <input class="form-control" type="text" name="name" id="name">
        </div>
        <h5 class="fs-5 mb-2 mt-2">Enter Security Session Code (Message #cs-team):</h5>
        <div class="input-group-md">
            <input class="form-control" type="text" name="auth" id="auth">
        </div>
        <div class="text-center">
            <input type="submit" class="btn mt-3 text-white" style="background-color: red" name="submit">
        </div>


    </form>

</section>


</body>


</html>
