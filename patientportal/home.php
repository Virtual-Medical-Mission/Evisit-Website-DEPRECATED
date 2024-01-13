<?php 
require_once '../private/init.php';

global $evisit_db;
if(!isset($_SESSION['loggedin'])) {
    redirect_to('../index.php');
}
if(is_post_request()){
    if($_POST['action'] == "startappt"){
        start_appointment($_SESSION['uid'],$evisit_db);
        $_SESSION['hpi_ready'] = 'true';
        redirect_to('../vitalscollect.php');
    } else if($_POST['action'] == "viewprev"){
        redirect_to('appointments.php');
    } else if($_POST['action'] == "logout"){
        unset($_SESSION['loggedin']);
        patient_destroy();
        redirect_to('../index.php');
    }
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Home</title>
</head>
<body>
    <h1> Hello <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?>!</h1>
    <form action="home.php" method="post">
        <button type="submit" name="action" value="startappt" >Click to Start New Appoitment</button>
        <br>
        <button type="submit" name="action" value="viewprev" >Click to View Previous Appointments</button>
        <br>
        <button type="submit" name="action" value="logout" >Click to Log Out</button>
    </form> 
</body>
</html>