<?php 
require_once 'private/init.php';

if(is_post_request()){
if($_POST['action'] == "logout"){
	unset($_SESSION['loggedin']);
	patient_destroy();
	redirect_to('index.php');
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>thank you</title>
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
	<style>
		@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
		@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
	</style>
	<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>
<body>
	<header class="site-header" id="header">
		<h1 class="site-header__title" data-lead-id="site-header-title">Thank You</h1>
	</header>

	<div class="main-content">
		<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
        <?php
        if(is_get_request()){
            if(isset($_GET['Dx'])){
                $tx = '';
                if(isset($_GET['Tx'])){
                    $tx = $_GET['Tx'];
                } else {
                    $tx = "Unknown";
                }
                echo '<p class="main-content__body" data-lead-id="main-content-body">' . 'You have ' .$_GET['Dx'] . ' </p>';
                echo '<p class="main-content__body" data-lead-id="main-content-body">' . 'The Treatment is ' . $tx . ' </p>';
                echo '<p class="main-content__body" data-lead-id="main-content-body"> </p>';
            } else {
                echo '<p class="main-content__body" data-lead-id="main-content-body"> You should have the results of your appointment in a few days please feel better.</p>';
            }
        } else {
            echo '<p class="main-content__body" data-lead-id="main-content-body"> You should have the results of your appointment in a few days please feel better.</p>';
        }
        ?>

        <!-- <p class="main-content__body" data-lead-id="main-content-body"> You should have the results of your appointment in a few days please feel better.</p> -->
	</div>
	<form action="thankyou.php" method="post">
        <button type="submit" name="action" value="logout" >Click to Log Out</button>
    </form> 
</body>
</html>
