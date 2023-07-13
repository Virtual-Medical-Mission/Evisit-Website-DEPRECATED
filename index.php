<?php

require_once 'private/init.php';
require __DIR__ . '/vendor/autoload.php';
use Orhanerday\OpenAi\OpenAi;

if (AI_ENABLED) {
    $open_ai_key = OPENAI_API_KEY;
    $REGISTER_AI = new OpenAi($open_ai_key);
}


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
    $errors = register_user($_POST, $REGISTER_AI);
    if (!$errors['present']) {
        hpi_init();
        redirect_to('hpi.php');
    }
}


?>



<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/private/assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Register</title>
</head>

<body>

    <?php vmm_banner('VMM Healthcare'); ?>

    <div class="container-fluid mt-5">
        <form action="index.php" method="POST" class="ps-5 pe-5 mt-3"
            style="margin: auto; background-color: #05445e; border-radius: 20px;">
            <div class="fs-2 mt-5 text-light text-center">Register</div>
            <div>
                <label class="form-label mt-2 text-light" for="first_name">First Name</label>
                <div class="input-group input-group-lg">
                    <span <?php error_style_logo($errors, 'first_name'); ?> class="input-group-text"
                        id="inputGroup-sizing-lg"><i class="bi bi-person-circle"></i></span>
                    <input <?php error_style_input($errors, 'first_name'); ?> type="text"
                        class="form-control form-control-lg" id="first_name" name="first_name"
                        placeholder="Enter first name">
                </div>
                <?php if (isset($errors['first_name']) and $errors['present']) { ?>
                    <div class="p text-danger fs-5">
                        <?php echo $errors['first_name'] ?>
                    </div>
                <?php } ?>

            </div>

            <div>
                <label class="form-label mt-2 text-light" for="last_name">Last Name</label>
                <div class="input-group input-group-lg">
                    <span <?php error_style_logo($errors, 'last_name'); ?> class="input-group-text"
                        id="inputGroup-sizing-lg"><i class="bi bi-person-circle"></i></span>
                    <input <?php error_style_input($errors, 'last_name'); ?> type="text"
                        class="form-control form-control-lg" id="last_name" name="last_name"
                        placeholder="Enter last name">
                </div>
                <?php if (isset($errors['last_name']) and $errors['present']) { ?>
                    <div class="p text-danger fs-5">
                        <?php echo $errors['last_name'] ?>
                    </div>
                <?php } ?>

            </div>

            <div>
                <label class="form-label mt-2 text-light" for="username">Create Username</label>
                <div class="input-group input-group-lg">
                    <span <?php error_style_logo($errors, 'username'); ?> class="input-group-text"
                        id="inputGroup-sizing-lg"><i class="bi bi-person-badge"></i></span>
                    <input <?php error_style_input($errors, 'username'); ?> type="text"
                        class="form-control form-control-lg" id="username" name="username"
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
                <div class="input-group input-group-lg">
                    <span <?php error_style_logo($errors, 'gender'); ?> class="input-group-text"
                        id="inputGroup-sizing-lg"><i class="bi bi-gender-ambiguous"></i></span>
                    <select <?php error_style_input($errors, 'gender'); ?> class="form-select" id="gender"
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
                <div class="input-group input-group-lg">
                    <span <?php error_style_logo($errors, 'DOB'); ?> class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-calendar3"></i></span>
                    <select <?php error_style_input($errors, 'DOB'); ?> class="form-select" id="month" name="month">
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
                    <select <?php error_style_input($errors, 'DOB'); ?> class="form-select" id="day" name="day">
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
                    <select <?php error_style_input($errors, 'DOB'); ?> class="form-select" id="year" name="year">
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
                <div class="input-group input-group-lg">
                    <span <?php error_style_logo($errors, 'password'); ?> class="input-group-text"
                        id="inputGroup-sizing-lg"><i class="bi bi-asterisk"></i></span>
                    <input <?php error_style_input($errors, 'password'); ?> type="password"
                        class="form-control form-control-lg" id="password" name="password"
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
                <div class="input-group input-group-lg">
                    <span <?php error_style_logo($errors, 'confirm_password'); ?> class="input-group-text"
                        id="inputGroup-sizing-lg"><i class="bi bi-asterisk"></i></span>
                    <input <?php error_style_input($errors, 'confirm_password'); ?> type="password"
                        class="form-control form-control-lg" id="confirm_password" name="confirm_password"
                        placeholder="Confirm password">
                </div>
                <?php if (isset($errors['confirm_password']) and $errors['present']) { ?>
                    <div class="p text-danger fs-5">
                        <?php echo $errors['confirm_password'] ?>
                    </div>
                <?php } ?>

            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-lg mt-3 mb-3" style="background-color: antiquewhite;">Register</button>
            </div>

            <div class="text-center fs-4 pb-3">
                <a href="login.php" class="text-light">Already have an account? Login</a>
            </div>

        </form>
    </div>

    <?php require_once 'private/temps/footer.temp.php' ?>


</body>

</html>