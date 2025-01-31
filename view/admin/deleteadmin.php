<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: ../login.php");
    exit();
}
?>
<?php
require_once('../../control/admin/viewadminsController.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Admin</title>
    <link rel="stylesheet" href="../../assets/admin/deleteadmin.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="http://localhost/pastryshop/view/admin/home.php">Home</a></li>
                <li><a href="http://localhost/pastryshop/view/admin/viewadmin.php">View Admins</a></li>
                <li><a href="http://localhost/pastryshop/view/admin/addadmin.php">Add Admin</a></li>
                <li><a href="http://localhost/pastryshop/view/admin/updateadmin.php">Update Admin</a></li>

                <li><a href="http://localhost/pastryshop/view/admin/adminprofile.php">Admin Profile</a></li>
                <li><a href="http://localhost/pastryshop/control/logoutController.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <table border="1">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Bio</th>
                <th>Reference</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($admins)) {
                foreach ($admins as $admin) {
                    echo "<tr>";
                    // echo "<td>" . $admin['id'] . "</td>";
                    echo "<td>" . $admin['name'] . "</td>";
                    echo "<td>" . $admin['phone'] . "</td>";
                    echo "<td>" . $admin['email'] . "</td>";
                    echo "<td>" . $admin['bio'] . "</td>";
                    echo "<td>" . $admin['ref'] . "</td>";
                    echo "<td><a href='../../control/admin/deleteadminController.php?id=" . $admin['id'] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No admin data found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
