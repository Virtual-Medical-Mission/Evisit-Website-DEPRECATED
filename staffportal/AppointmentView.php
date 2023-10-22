<?php
require_once '../private/init.php';
global $evisit_db;

$appviewing = $_GET['apid'];
debug_to_console($appviewing);
$sql = "SELECT * FROM appointments WHERE id = ' " . $appviewing . " ' ";
$result = mysqli_query($evisit_db, $sql);
$appointmentRow = mysqli_fetch_assoc($result);
debug_to_console($appointmentRow['uid']);
$sql2 = "SELECT * FROM users WHERE id = ' " . $appointmentRow['uid'] . " ' ";
$result2 = mysqli_query($evisit_db, $sql2);
$userRow = mysqli_fetch_assoc($result2);
debug_to_console($userRow['first_name']);
$sql3 = "SELECT * FROM embedded_responses WHERE apid = ' " . $appviewing . " ' ";
$result3 = mysqli_query($evisit_db, $sql3);
debug_to_console($appointmentRow['vid']);
if (($appointmentRow['vid'] !== '-1') && ($appointmentRow['vid'] !== null ) ) {
    debug_to_console("seraching for vitals");
    $sql4 = "SELECT * FROM vitals WHERE id = ' " . $appointmentRow['vid'] . " ' ";
    $result4 = mysqli_query($evisit_db, $sql4);
    $vitalsRow = mysqli_fetch_assoc($result4);
    $oxsat = $vitalsRow['oxsat'];
    $heartrate = $vitalsRow['heartrate'];
    $BP = $vitalsRow['BP'];
    $temp = $vitalsRow['temp'];
} else {
    $oxsat = "not found";
    $heartrate = "not found";
    $BP = "not found";
    $temp = "not found";
}
//while($reponsesRow = mysqli_fetch_assoc($result3)) :
  //  debug_to_console($reponsesRow['question']);
  //  debug_to_console($reponsesRow['response']);
//endwhile;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title><?php echo $userRow['first_name']. "'s Appointment "  ?></title>
</head>
<body>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Hello Dr.</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <img src="" class="img-fluid rounded" alt="Patient Image">
        </div>
        <div class="col-md-9">
            <h2 class="text-center">Patient Information</h2>
            <table class="table table-bordered">
                <tr>
                    <th> <FONT COLOR="RED">Demographic Information</FONT> </th>
                    <td> </td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?php echo $userRow['first_name'] . ' ' . $userRow['last_name'] ?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><?php echo $userRow['gender'] ?></td>
                </tr
                <tr>
                    <th>DoB</th>
                    <td><?php echo $userRow['DOB'] ?></td>
                </tr
                <tr>
                    <th> <FONT COLOR="RED">Vitals</FONT> </th>
                    <td> </td>
                </tr>
                <tr>
                    <th> SpO2 </th>
                    <td> <?php echo $oxsat ?> </td>
                </tr>
                <tr>
                    <th> HR </th>
                    <td> <?php echo $heartrate ?> </td>
                </tr>
                <tr>
                    <th> BP SYS</th>
                    <td> <?php echo $BP ?> </td>
                </tr>
                <tr>
                    <th> Temp </th>
                    <td> <?php echo $temp ?> </td>
                </tr>
                <tr>
                    <th> <FONT COLOR="RED">Responses</FONT> </th>
                    <td> </td>
                </tr>
                <?php while($reponsesRow = mysqli_fetch_assoc($result3)) : ?>
                    <tr>
                        <th><?php echo $reponsesRow['question'] ?></th>
                        <td><?php echo $reponsesRow['response'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
