<?php
require_once '../private/init.php';
global $evisit_db;
$appviewing = $_GET['apid'];
//debug_to_console($appviewing);
$sql = "SELECT * FROM appointments WHERE id = ' " . $appviewing . " ' ";
$result = mysqli_query($evisit_db, $sql);
$appointmentRow = mysqli_fetch_assoc($result);
//debug_to_console($appointmentRow['uid']);
$sql2 = "SELECT * FROM users WHERE id = ' " . $appointmentRow['uid'] . " ' ";
$result2 = mysqli_query($evisit_db, $sql2);
$userRow = mysqli_fetch_assoc($result2);
//debug_to_console($userRow['first_name']);
$sql3 = "SELECT * FROM embedded_responses WHERE apid = ' " . $appviewing . " ' ";
$result3 = mysqli_query($evisit_db, $sql3);
//debug_to_console($appointmentRow['vid']);
if (($appointmentRow['vid'] !== '-1') && ($appointmentRow['vid'] !== null ) ) {
    //debug_to_console("seraching for vitals");
    $sql4 = "SELECT * FROM vitals WHERE id = ' " . $appointmentRow['vid'] . " ' ";
    $result4 = mysqli_query($evisit_db, $sql4);
    $vitalsRow = mysqli_fetch_assoc($result4);
    $oxsat = $vitalsRow['oxsat'];
    $heartrate = $vitalsRow['heartrate'];
    $BP = $vitalsRow['BP'];
    $temp = $vitalsRow['temp'];
    $EKG = $vitalsRow['EKG'];
} else {
    $oxsat = "not found";
    $heartrate = "not found";
    $BP = "not found";
    $temp = "not found";
    $EKG = "";
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
                <?php if($EKG !=  "") {
                    echo ' </table> ';
                    echo '<canvas id="ekgGraph" width="300" height="100" style="border:1px solid #000000;"></canvas>' ;
                    echo '<script>' ;
                    echo 'var yValues = [' . $EKG . '];' ;
                    echo <<< EOD
                    yValues.pop();
                    const max = Math.max(...yValues);
                    const min = Math.min(...yValues);
                    var xValues = [];
                    xValues.push(0);
                    for(let i = 1; i < (yValues.length); i += 1){
                        xValues.push(parseFloat(parseFloat(xValues[i-1])+parseFloat(0.012)));
                    }
                    for(let i = 1; i < (yValues.length); i += 1){
                        xValues[i] =parseFloat(xValues[i]).toPrecision(2);
                    }
                    new Chart(document.getElementById("ekgGraph"), {
                        type: "line",
                        data: {
                            labels: xValues,
                            datasets: [{
                                fill: false,
                                lineTension: 0,
                                backgroundColor: "rgba(63,237,5,1.0)",
                                borderColor: "rgba(63,237,5,1.0)",
                                data: yValues
                            }]
                        },
                        options: {
                            legend: {display: false},
                            scales: {
                                yAxes: [{ 
                                    ticks: {
                                        display: false,
                                        max: max,
                                        min: min
                                    }
                                }],
                                //xAxes: [{ ticks: {display: false}}]
                            }
                        }
                    });
                </script> 
                <table class="table table-bordered">  
                EOD;} ?>
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
