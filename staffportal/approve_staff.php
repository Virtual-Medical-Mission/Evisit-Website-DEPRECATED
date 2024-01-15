<?php
require_once "../private/init.php";

global $evisit_db;

require_staffrole('create_account.php');

$sql = "SELECT * FROM users WHERE role='pending_doctor' ORDER BY id DESC";
$result = mysqli_query($evisit_db, $sql);
confirm_result_set($result);


if(isset($_POST['accept'])) {
    $sql = "UPDATE users SET role='staff' WHERE id='" . $_POST['id'] . "'";
    $result = mysqli_query($evisit_db, $sql);
    confirm_result_set($result);
    redirect_to('approve_staff.php');
}
elseif(isset($_POST['deny'])) {
    $sql = "DELETE FROM users WHERE id='" . $_POST['id'] . "'";
    $result = mysqli_query($evisit_db, $sql);
    confirm_result_set($result);
    redirect_to('approve_staff.php');
}

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
        <div class="col-md-12">
            <h1 class="text-center">Approve Staff</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Staff Account Requests</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Request Date</th>
                    <th>Accept</th>
                    <th>Deny</th>
                </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>



                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["first_name"]; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row["username"]; ?></td>
                        <td><?php echo $row["created"]; ?></td>
                        <td>
                            <form action="approve_staff.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="submit" name="accept" value="Accept">
                            </form>
                        </td>
                        <td>
                            <form action="approve_staff.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="submit" name="deny" value="Deny">
                            </form>
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
