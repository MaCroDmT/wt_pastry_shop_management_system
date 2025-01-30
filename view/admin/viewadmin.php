<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: ../login.php");
    exit();
}
?>

<?php
require_once('../../controller/admin/viewadminsController.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Admins</title>
    <link rel="stylesheet" href="../../assets/admin/viewadmin.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="http://localhost/pastryshop/view/admin/home.php">Home</a></li>
                <li><a href="http://localhost/pastryshop/view/admin/addadmin.php">Add Admin</a></li>
                <li><a href="http://localhost/pastryshop/view/admin/updateadmin.php">Update Admin</a></li>
                <li><a href="http://localhost/pastryshop/view/admin/deleteadmin.php">Delete Admin</a></li>
                <li><a href="http://localhost/pastryshop/view/admin/adminprofile.php">Admin Profile</a></li>
                <li><a href="http://localhost/pastryshop/controller/logoutController.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>View Admins</h1>
        <div class="table-container">
            <?php if (!empty($admins)): ?>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Bio</th>
                            <th>Reference</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($admins as $admin): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($admin['name']); ?></td>
                                <td><?php echo htmlspecialchars($admin['phone']); ?></td>
                                <td><?php echo htmlspecialchars($admin['email']); ?></td>
                                <td><?php echo htmlspecialchars($admin['bio']); ?></td>
                                <td><?php echo htmlspecialchars($admin['ref']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No admins found.</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
