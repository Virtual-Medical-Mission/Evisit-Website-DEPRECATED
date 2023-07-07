
<?php
    require_once 'private/init.php';
    require_once 'private/hpi_questions.php';
    require_once 'private/hpi_validate.php';

    require_login('login.php');

    $hpi_data = $_SESSION['hpi'];
    $hpi_page = $hpi_data['page'];
    $end_page = 3;

    if(is_post_request()) {
        var_dump($_POST);
        if(!isset($_POST['back'])) {
            $errors = loadValidation($hpi_page, $_POST);
            if(!$errors['present']) {
                $_SESSION['hpi']['page']++;
                $hpi_data = $_SESSION['hpi'];
                $hpi_page = $hpi_data['page'];

                if(isset($_POST['submit'])) {
                    //code for uploading HPI data to the database
                }

            }
        } elseif(isset($_POST['back'])) {
            $_SESSION['hpi']['page']--;
            $hpi_data = $_SESSION['hpi'];
            $hpi_page = $hpi_data['page'];
        }

    }

    var_dump($hpi_data);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="/private/assets/css/style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <title>HPI</title>
        <link rel="stylesheet" href="private/assets/css/hpi.css" />

    </head>
    <body>
        <?php vmm_banner('HPI Form'); ?>
        <section class="shadow contact-clean" style="background: antiquewhite">
            <h2 class="text-center">Page <?=$hpi_page?></h2>
            <form class="bg-light border rounded border-secondary shadow-lg" action="hpi.php" method="post" style="background: rgb(248,248,249);">
                <?php loadPage($hpi_page, $hpi_data); ?>
                <?php if($hpi_page == 1){ ?>
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
                        <input class="btn" style="background-color: mediumseagreen" type="submit" name="submit" value="submit">
                    </div>
                <?php } ?>
            </form>
        </section>

        <?php include 'private/temps/footer.temp.php'; ?>

    </body>
</html>