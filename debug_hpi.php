<?php

    require_once 'private/init.php';
    require_login('login.php');

    $hpi_data = $_SESSION['hpi'];
    $hpi_page = $hpi_data['page'];
    $end_page = $hpi_data['end_page'];

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
            <h2 class="text-center">Page <?=$hpi_page?></h2>
            <form class="bg-light border rounded border-secondary shadow-lg" action="debug_hpi.php" method="post">

            </form>
        </section>

    </body>



</html>

