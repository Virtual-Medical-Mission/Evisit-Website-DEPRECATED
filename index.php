<?php

require_once 'private/init.php';

if(is_post_request()) {
    reg
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
    <title>VMM Healthcare</title>
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
    <form action="index.php" method="POST" class="w-75 ps-5 pe-5 mt-3" style="margin: auto; background-color: #05445e; border-radius: 20px;">
        <div class="fs-2 mt-5 text-light text-center">Register</div>

        <div>
            <label class="form-label mt-2 text-light" for="first_name">First Name</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-person-circle"></i></span>
                <input type="text" class="form-control form-control-lg" id="first_name" name="first_name" placeholder="Enter first name">
            </div>

        </div>

        <div>
            <label class="form-label mt-2 text-light" for="last_name">Last Name</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-person-circle"></i></span>
                <input type="text" class="form-control form-control-lg" id="last_name" name="last_name" placeholder="Enter last name">
            </div>

        </div>

        <div>
            <label class="form-label mt-2 text-light" for="gender">Gender</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-gender-ambiguous"></i></span>
                <select class="form-select" id="gender" name="gender">
                    <option value="gender" selected>Choose your gender:</option>
                    <option value="male">♂️Male</option>
                    <option value="female">♀️Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

        </div>

        <div>
            <label class="form-label mt-2 text-light" for="DOB">Date of Birth</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-calendar3"></i></span>
                <select  class="form-select" id="month" name="month">
                    <option value="month" selected>Month</option>
                </select>
                <select  class="form-select" id="day" name="day">
                    <option value="day" selected>Day</option>
                </select>
                <select  class="form-select" id="year" name="year">
                    <option value="year" selected>Year</option>
                </select>
            </div>

        </div>

        <div>
            <label class="form-label mt-2 text-light" for="password">Create Password</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-asterisk"></i></span>
                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Create a password">
            </div>

        </div>

        <div>
            <label class="form-label mt-2 text-light" for="confirm_password">Confirm Password</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-asterisk"></i></span>
                <input type="password" class="form-control form-control-lg" id="confirm_password" name="confirm_password" placeholder="Confirm password">
            </div>

        </div>

        <button type="submit" class="btn btn-lg mt-3 mb-3" style="background-color: antiquewhite">Register</button>

        <div class="text-center fs-4 pb-3">
            <a href="login.php" class="text-light">Already have an account? Login</a>
        </div>

    </form>
</div>
</body>
</html>