<?php
require_once "../private/init.php";

global $evisit_db;

if(!($_SESSION['role'] == 'staff' && $_SESSION['loggedin'] == 'true')){
    redirect_to('index.php');
}

if(is_post_request()){
    if($_POST['action'] == "logout"){
        unset($_SESSION['loggedin']);
        unset($_SESSION['role']);
        redirect_to('index.php');
    } else if($_POST['action'] == "appnew"){
        redirect_to('approve_staff.php');
    }
}

$sql = "SELECT * FROM appointments ORDER BY id DESC LIMIT 20";
$result = mysqli_query($evisit_db, $sql);
confirm_result_set($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Doctor's View</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <form action="appointments.php" method="post">
                <button type="submit" name="action" value="logout" >Click to Log Out</button> <span></span> <button type="submit" name="action" value="appnew" >Click to Approve Other Dcotors</button>
            </form>
            <div class="col-md-12">
                <h1 class="text-center">Hello Dr. <?php  echo  $_SESSION['first_name'] . ' ' .$_SESSION['last_name']?> </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Appointments</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Appointment ID</th>
                            <th>Patient Name</th>
                            <th>Appointment Start Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>

                            <?php
                                //Gets the username of the patient for the appointment
                                $sql2 = "SELECT * FROM users WHERE id = " . $row['uid'];
                                $result2 = mysqli_query($evisit_db, $sql2);
                                confirm_result_set($result2);
                                $urow = mysqli_fetch_assoc($result2);
                                $name = $urow['first_name'] . " " .  $urow['last_name'];                                
                            ?>

                            <tr>
                                <td><a href= <?php echo ("AppointmentView.php?apid=" . $row['id']) ?>?><?php echo $row['id']; ?></a></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $row['checkedin']; ?></td>
                            </tr>

                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
