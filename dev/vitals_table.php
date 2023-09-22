<?php
require_once '../private/init.php';
global $evisit_db;

$sql = "SELECT * FROM vitals";
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

            <div class="h1 mt-5 mb-5 text-center text-light">Vitals Table</div>
            <div class="table-responsive">

                <table class="table bg-light mb-5" style="margin: auto;">

                    <thead>

                        <tr>

                            <th scope="col">id</th>
                            <th scope="col">oxsat</th>
                            <th scope="col">heartrate</th>
                            <th scope="col">BP</th>
                            <th scope="col">temp</th>
                            <th scope="col">EKG</th>
                            <th scope="col">ip</th>
                            <th scope="col">time</th>

                        </tr>


                    </thead>

                    <tbody>

                        <?php while($row = mysqli_fetch_assoc($result)) : ?>

                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['oxsat']; ?></td>
                                <td><?php echo $row['heartrate']; ?></td>
                                <td><?php echo $row['BP']; ?></td>
                                <td><?php echo $row['temp']; ?></td>
                                <td><?php echo $row['EKG']; ?></td>
                                <td><?php echo $row['ip']; ?></td>
                                <td><?php echo $row['time']; ?></td>
                            </tr>

                        <?php endwhile; ?>


                    </tbody>

                </table>

            </div>



        </div>



    </body>

</html>

