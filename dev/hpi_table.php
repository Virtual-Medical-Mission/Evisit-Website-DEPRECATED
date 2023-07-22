<?php
require_once '../private/init.php';
global $evisit_db;

$sql = "SELECT * FROM hpi";
$result = mysqli_query($evisit_db, $sql);

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="/private/assets/css/style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <title>HPI Table</title>
    </head>

    <body class="bg-dark">

        <div class="container-fluid">
            <div class="h1 mt-5 mb-5 text-center text-light">HPI Table</div>

            <div class="table-responsive">

                <table class="table bg-light mb-5" style="margin: auto;">

                    <thead>

                        <tr>

                            <th scope="col">id</th>
                            <th scope="col">username</th>
                            <th scope="col">language</th>
                            <th scope="col">tribe</th>
                            <th scope="col">location</th>
                            <th scope="col">start_date</th>
                            <th scope="col">medical_conditions</th>
                            <th scope="col">medications</th>
                            <th scope="col">surgeries</th>
                            <th scope="col">allergies</th>
                            <th scope="col">hospitalized</th>
                            <th scope="col">clean_water</th>
                            <th scope="col">transportation</th>
                            <th scope="col">immunizations</th>
                            <th scope="col">dietary_restrictions</th>
                            <th scope="col">smoke_rate</th>
                            <th scope="col">alcohol_rate</th>
                            <th scope="col">drug_rate</th>
                            <th scope="col">physical_activities</th>
                            <th scope="col">family_history</th>
                            <th scope="col">date</th>



                        </tr>


                    </thead>

                    <tbody>

                        <?php while($row = mysqli_fetch_assoc($result)) : ?>

                            <tr>

                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['language']; ?></td>
                                <td><?php echo $row['tribe']; ?></td>
                                <td><?php echo $row['location']; ?></td>
                                <td><?php echo $row['start_date']; ?></td>
                                <td><?php echo $row['medical_conditions']; ?></td>
                                <td><?php echo $row['medications']; ?></td>
                                <td><?php echo $row['surgeries']; ?></td>
                                <td><?php echo $row['allergies']; ?></td>
                                <td><?php echo $row['hospitalized']; ?></td>
                                <td><?php echo $row['clean_water']; ?></td>
                                <td><?php echo $row['transportation']; ?></td>
                                <td><?php echo $row['immunizations']; ?></td>
                                <td><?php echo $row['dietary_restrictions']; ?></td>
                                <td><?php echo $row['smoke_rate']; ?></td>
                                <td><?php echo $row['alcohol_rate']; ?></td>
                                <td><?php echo $row['drug_rate']; ?></td>
                                <td><?php echo $row['physical_activities']; ?></td>
                                <td><?php echo $row['family_history']; ?></td>
                                <td><?php echo $row['date']; ?></td>


                            </tr>



                        <?php endwhile; ?>




                    </tbody>


                </table>

            </div>

        </div>

    </body>


</html>
