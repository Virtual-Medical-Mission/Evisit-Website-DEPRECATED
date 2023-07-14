<?php

require_once 'private/init.php';


require_login('login.php');


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

                <div class="fs-5 text-center mb-3">What symptoms are you experiencing today?</div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="SOB" id="SOB">
                    <label class="form-check-label" for="SOB">
                        Shortness of Breath
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="cough" id="cough">
                    <label class="form-check-label" for="cough">
                        Cough
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="fever" id="fever">
                    <label class="form-check-label" for="fever">
                        Fever
                    </label>
                </div>
            </form>

        </section>

        <?php include 'private/temps/footer.temp.php'?>

    </body>


</html>
