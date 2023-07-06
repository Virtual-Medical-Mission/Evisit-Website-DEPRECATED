<?php

require_once 'private/init.php';
$error = false;
if(is_post_request()) {

    $login_result = login_user($_POST);
    if($login_result) {
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
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Login</title>
</head>

<body>



</body>

</html>




<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/private/assets/css/style.css" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Register</title>
</head>
<body>
<div class="container-fluid" style="background-color: #05445e">
    <div class="row">
        <div class="col-md-6 text-center">
            <img src="/private/assets/img/logo.png" width="300px" height="170px" alt="logo" />
        </div>
        <div class="col-md-6">
            <div class="text-white align-text-bottom fs-1" style="padding-top: 50px">VMM Healthcare</div>
        </div>
    </div>

</div>
<div class="container-fluid mt-5">
    <form action="login.php" method="POST" class="w-75 ps-5 pe-5 mt-3" style="margin: auto; background-color: #05445e; border-radius: 20px;">
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
        <button type="submit" class="btn btn-lg mt-3 mb-3" style="background-color: antiquewhite">Login</button>

        <div class="text-center fs-4 pb-3">
            <a href="index.php" class="text-light">Don't have an account? Register</a>
        </div>

    </form>
</div>

<?php require_once 'private/temps/footer.temp.php'?>


</body>
</html>

