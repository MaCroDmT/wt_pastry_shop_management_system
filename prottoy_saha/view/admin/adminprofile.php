<?php
session_start();
if (!isset($_SESSION['name'])) {  
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="../../assets/admin/adminprofile.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="http://localhost/pastryshop/view/admin/home.php">Home</a></li>
                <li><a href="http://localhost/pastryshop/view/admin/viewadmin.php">View Admins</a></li>
                <li><a href="http://localhost/pastryshop/view/admin/addadmin.php">Add Admin</a></li>
                <li><a href="http://localhost/pastryshop/view/admin/updateadmin.php">Update Admin</a></li>
                <li><a href="http://localhost/pastryshop/view/admin/deleteadmin.php">Delete Admin</a></li>
        
                <li><a href="http://localhost/pastryshop/controller/logoutController.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="profile-container">
            <h1>Admin Profile</h1>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($_SESSION['name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($_SESSION['phone']); ?></p>
            <p><strong>Bio:</strong> <?php echo htmlspecialchars($_SESSION['bio']); ?></p>
            <p><strong>Reference:</strong> <?php echo htmlspecialchars($_SESSION['ref']); ?></p>
        </div>
    </main>
</body>
</html>
