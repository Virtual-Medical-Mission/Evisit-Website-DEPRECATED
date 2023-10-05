<?php

require_once 'private/init.php';
$error = false;
if(is_post_request()) {

    $login_result = login_user($_POST);
    if($login_result) {
        $_SESSION['hpi_ready'] = 'true';
        header("Location:alert:hello");
        redirect_to('hpi.php');
    } else {
        $error = true;
    }

}
?>




<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/private/assets/css/style.css" />
    <link rel="stylesheet" href="/private/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/private/assets/css/bs-theme-overrides.css" />
    <link rel="stylesheet" href="/private/assets/fonts/font-awesome.min.css" />
    <link rel="stylesheet" href="/private/assets/css/Footer-with-social-media-icons.css" />
    <title>Register</title>
</head>
    <body>

    <nav class="navbar navbar-dark navbar-expand-md sticky-top" style="background: linear-gradient(#05445e, #05445e), #05445e">
        <div class="container-fluid">
            <div class="navbar-brand text-center mx-auto">
                <img src="private/assets/img/logo_tr.png" class="nav-logo" width="25%" height="25%" alt="Logo" />
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-5">
            <form action="login.php" method="POST" class="ps-5 pe-5 mt-3" style="margin: auto; background-color: #05445e; border-radius: 20px;">
                <div class="fs-2 mt-5 text-light text-center">Login</div>

                <div>
                    <label class="form-label mt-2 text-light" for="username">Username</label>
                    <div class="input-group input-group-lg">
                        <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-person-badge"></i></span>
                        <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Enter username">
                    </div>

                </div>

                <div>
                    <label class="form-label mt-2 text-light" for="password">Password</label>
                    <div class="input-group input-group-lg">
                        <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-asterisk"></i></span>
                        <input  type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter password">
                    </div>


                </div>

                <?php if($error) { ?>
                    <div class="p fs-5 text-danger">Invalid Login</div>
                <?php } ?>

                <div class="text-center">
                    <button type="submit" class="btn btn-lg mt-3 mb-3" style="background-color: antiquewhite">Login</button>
                </div>

                <div class="text-center fs-4 pb-3">
                    <a href="index.php" class="text-light">Don't have an account? Register</a>
                </div>

            </form>
        </div>

    <?php include 'private/temps/footer.temp.php'?>


    </body>
</html>

