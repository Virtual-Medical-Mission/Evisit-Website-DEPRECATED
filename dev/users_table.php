<?php
require_once '../private/init.php';
global $evisit_db;

$sql = "SELECT * FROM users";
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

    <div class="h1 mt-5 mb-5 text-center text-light">Users Table</div>
    <div class="table-responsive">

        <table class="table bg-light mb-5" style="margin: auto;">

            <thead>

            <tr>

                <th scope="col">id</th>
                <th scope="col">first_name</th>
                <th scope="col">last_name</th>
                <th scope="col">role</th>
                <th scope="col">username</th>
                <th scope="col">gender</th>
                <th scope="col">DOB</th>
                <th scope="col">password</th>
                <th scope="col">vid</th>

            </tr>


            </thead>

            <tbody>

            <?php while($row = mysqli_fetch_assoc($result)) : ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['DOB']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['vid']; ?></td>
                </tr>

            <?php endwhile; ?>


            </tbody>

        </table>

    </div>



</div>



</body>

</html>
