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
    <title>Update Admin</title>
    <link rel="stylesheet" href="../../assets/admin/updateadmin.css">
    <script src="../../js/ajax/viewadmins.js" defer></script> 
</head>
<body>
    <header>
    <nav>
            <ul>
                <li><a href="http://localhost/pastryshop/view/admin/home.php">Home</a></li>
                <li><a href="http://localhost/pastryshop/view/admin/viewadmin.php">View Admins</a></li>
                <li><a href="http://localhost/pastryshop/view/admin/addadmin.php">Add Admin</a></li>
                <li><a href="http://localhost/pastryshop/view/admin/deleteadmin.php">Delete Admin</a></li>
                <li><a href="http://localhost/pastryshop/view/admin/adminprofile.php">Admin Profile</a></li>
                <li><a href="http://localhost/pastryshop/controller/logoutController.php">Logout</a></li>
            </ul>
       
    </nav>
    </header>

    <main>
        <div class="table-container">
            <h1>Update Admin</h1>
            <div id="admins-table-container"></div> 
        </div>

        <div class="form-container">
            <h2>Edit Admin</h2>
            <fieldset>
                <form id="updateAdminForm">
                    <input type="hidden" name="id" id="admin_id">
                    <p>
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name">
                    </p>
                    <p><span id="nameError" class="error"></span></p>
                    <p>
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone" id="phone">
                    </p>
                    <p><span id="phoneError" class="error"></span></p>
                    <p>
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email">
                    </p>
                    <p><span id="emailError" class="error"></span></p>
                    <p>
                        <label for="bio">Bio:</label>
                        <textarea name="bio" id="bio"></textarea>
                    </p>
                    <p><span id="bioError" class="error"></span></p>
                    <p>
                        <label for="ref">Reference:</label>
                        <input type="text" name="ref" id="ref">
                    </p>
                    <p><span id="refError" class="error"></span></p>
                    <p>
                        <input type="hidden" name="pass" id="password">
                        <button type="button" id="submitUpdate">Update Admin</button>
                        <button type="reset" class="reset">Reset</button> 
                    </p>
                </form>
            </fieldset>
        </div>
    </main>
</body>
</html>
