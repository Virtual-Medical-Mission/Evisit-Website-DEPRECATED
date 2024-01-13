<?php

require_once 'private/init.php';



$year = date("Y");


$errors = [
    'first_name' => '',
    'last_name' => '',
    'username' => '',
    'gender' => '',
    'DOB' => '',
    'password' => '',
    'confirm_password' => '',
    'present' => false
];



if (is_post_request()) {
    $errors = register_user($_POST);
    if (!$errors['present']) {
        $_SESSION['loggedin'] = 'true';
        //$_SESSION['hpi_ready'] = 'true';
        redirect_to('patientportal/home.php');
    }
}



?>



<!DOCTYPE html lang="en">

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

<nav class="navbar navbar-dark navbar-expand-md" style="background: linear-gradient(#05445e, #05445e), #05445e">
    <div class="container-fluid">
        <div class="navbar-brand text-center mx-auto">
            <img src="private/assets/img/logo_tr.png" class="nav-logo" width="25%" height="25%" alt="Logo" />
        </div>
    </div>
</nav>

<div class="container mt-3" id="main-content">
    <form action="register.php" method="POST" class="ps-3 pe-3 mt-3" style="background-color: #05445e; border-radius: 20px;">
        <div class="fs-3 mt-3 text-light text-center">Register</div>
        <div class="d-flex flex-column align-items-center">
            <div class="mb-3">
                <label class="form-label mt-2 text-light" for="first_name">First Name</label>
                <input <?php error_style_input($errors, 'first_name'); ?> type="text" class="form-control smaller-input" id="first_name" name="first_name" placeholder="Enter first name">
                <?php if (isset($errors['first_name']) && $errors['present']) { ?>
                    <div class="text-danger fs-5">
                        <?php echo $errors['first_name'] ?>
                    </div>
                <?php } ?>
            </div>

            <div class="mb-3">
                <label class="form-label mt-2 text-light" for="last_name">Last Name</label>
                <input <?php error_style_input($errors, 'last_name'); ?> type="text" class="form-control smaller-input" id="last_name" name="last_name" placeholder="Enter last name">
                <?php if (isset($errors['last_name']) && $errors['present']) { ?>
                    <div class="text-danger fs-5">
                        <?php echo $errors['last_name'] ?>
                    </div>
                <?php } ?>
            </div>

            <div>
                <label class="form-label mt-2 text-light" for="username">Create Username</label>
                <div class="mb-3 input-group">
        <span <?php error_style_logo($errors, 'username'); ?> class="input-group-text"
                                                              id="inputGroup-sizing-lg"><i class="bi bi-person-badge"></i></span>
                    <input <?php error_style_input($errors, 'username'); ?> type="text"
                                                                            class="form-control smaller-input" id="username" name="username"
                                                                            placeholder="Create a username">
                </div>
                <?php if (isset($errors['username']) and $errors['present']) { ?>
                    <div class="p text-danger fs-5">
                        <?php echo $errors['username'] ?>
                    </div>
                <?php } ?>
            </div>

            <div>
                <label class="form-label mt-2 text-light" for="gender">Gender</label>
                <div class="mb-3 input-group">
        <span <?php error_style_logo($errors, 'gender'); ?> class="input-group-text"
                                                            id="inputGroup-sizing-lg"><i class="bi bi-gender-ambiguous"></i></span>
                    <select <?php error_style_input($errors, 'gender'); ?> class="form-select smaller-input" id="gender"
                                                                           name="gender">
                        <option value="gender" selected>Choose your gender:</option>
                        <option value="male">♂️Male</option>
                        <option value="female">♀️Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <?php if (isset($errors['gender']) and $errors['present']) { ?>
                    <div class="p text-danger fs-5">
                        <?php echo $errors['gender'] ?>
                    </div>
                <?php } ?>
            </div>


            <div>
                <label class="form-label mt-2 text-light" for="DOB">Date of Birth</label>
                <div class="mb-3 input-group">
                    <span <?php error_style_logo($errors, 'DOB'); ?> class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-calendar3"></i></span>
                    <select <?php error_style_input($errors, 'DOB'); ?> class="form-select smaller-input-select" id="month" name="month">
                        <option value="month" selected>Month</option>
                        <option value="january">January</option>
                        <option value="february">February</option>
                        <option value="march">March</option>
                        <option value="april">April</option>
                        <option value="may">May</option>
                        <option value="june">June</option>
                        <option value="july">July</option>
                        <option value="august">August</option>
                        <option value="september">September</option>
                        <option value="october">October</option>
                        <option value="november">November</option>
                        <option value="december">December</option>
                    </select>
                    <select <?php error_style_input($errors, 'DOB'); ?> class="form-select smaller-input-select" id="day" name="day">
                        <option value="day" selected>Day</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                    <select <?php error_style_input($errors, 'DOB'); ?> class="form-select smaller-input-select" id="year" name="year">
                        <option value="year" selected>Year</option>
                        <?php for ($i = $year; $i >= $year - 100; $i--) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php if (isset($errors['DOB']) and $errors['present']) { ?>
                    <div class="p text-danger fs-5">
                        <?php echo $errors['DOB'] ?>
                    </div>
                <?php } ?>
            </div>

            <div>
                <label class="form-label mt-2 text-light" for="password">Create Password</label>
                <div class="mb-3 input-group">
        <span <?php error_style_logo($errors, 'password'); ?> class="input-group-text"
                                                              id="inputGroup-sizing-lg"><i class="bi bi-asterisk"></i></span>
                    <input <?php error_style_input($errors, 'password'); ?> type="password"
                                                                            class="form-control smaller-input" id="password" name="password"
                                                                            placeholder="Create a password">
                </div>
                <?php if (isset($errors['password']) and $errors['present']) { ?>
                    <div class="p text-danger fs-5">
                        <?php echo $errors['password'] ?>
                    </div>
                <?php } ?>
            </div>

            <div>
                <label class="form-label mt-2 text-light" for="confirm_password">Confirm Password</label>
                <div class="mb-3 input-group">
        <span <?php error_style_logo($errors, 'confirm_password'); ?> class="input-group-text"
                                                                      id="inputGroup-sizing-lg"><i class="bi bi-asterisk"></i></span>
                    <input <?php error_style_input($errors, 'confirm_password'); ?> type="password"
                                                                                    class="form-control smaller-input" id="confirm_password" name="confirm_password"
                                                                                    placeholder="Confirm password">
                </div>
                <?php if (isset($errors['confirm_password']) and $errors['present']) { ?>
                    <div class="p text-danger fs-5">
                        <?php echo $errors['confirm_password'] ?>
                    </div>
                <?php } ?>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-lg mt-3" style="background-color: antiquewhite;">Register</button>
            </div>

            <div class="text-center fs-4 pb-3">
                <a href="login.php" class="text-light">Already have an account? Login</a>
            </div>
        </div>
        </form>
    </div>

    <?php include 'private/temps/footer.temp.php'?>

</body>

</html>