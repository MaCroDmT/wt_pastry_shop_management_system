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
    <title>Add Admin</title>
    <link rel="stylesheet" href="../../assets/admin/addadmin.css">
    <script src="../../js/admin/addadmin.js" defer></script>
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
                <li><a href="http://localhost/pastryshop/view/admin/adminprofile.php">Admin Profile</a></li>
                <li><a href="http://localhost/pastryshop/control/logoutController.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="form-container">
            <?php if (isset($_SESSION['error'])): ?>
                <p class="error"><?php echo $_SESSION['error']; 
                unset($_SESSION['error']); ?></p>
            <?php endif; ?>
            <form id="addAdminForm" action="../../control/admin/addadminController.php" method="post">
                <fieldset>
                    <legend>New Admin Registration</legend>
                    <table>
                        <tr>
                            <td>Admin Name</td>
                            <td>:</td>
                            <td><input type="text" name="a_name" id="a_name" onfocus="clearError('nameError')" onblur="validateName()" /></td>
                        </tr>
                        <tr>
                            <td colspan="3"><span id="nameError" class="error"></span></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><input type="email" name="a_mail" id="a_mail" onfocus="clearError('emailError')" onblur="validateEmail()" /></td>
                        </tr>
                        <tr>
                            <td colspan="3"><span id="emailError" class="error"></span></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input type="password" name="a_pass" id="a_pass" onfocus="clearError('passwordError')" onblur="validatePassword()" /></td>
                        </tr>
                        <tr>
                            <td colspan="3"><span id="passwordError" class="error"></span></td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>:</td>
                            <td><input type="text" name="a_ph_num" id="a_ph_num" onfocus="clearError('phoneError')" onblur="validatePhone()" /></td>
                        </tr>
                        <tr>
                            <td colspan="3"><span id="phoneError" class="error"></span></td>
                        </tr>
                        <tr>
                            <td>Reference</td>
                            <td>:</td>
                            <td><input type="text" name="a_reference" id="a_reference" onfocus="clearError('referenceError')" onblur="validateReference()" /></td>
                        </tr>
                        <tr>
                            <td colspan="3"><span id="referenceError" class="error"></span></td>
                        </tr>
                        <tr>
                            <td>Bio</td>
                            <td>:</td>
                            <td><textarea name="a_bio" id="a_bio" onfocus="clearError('bioError')" onblur="validateBio()"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3"><span id="bioError" class="error"></span></td>
                        </tr>
                        <tr>
                            <td colspan="3"><input type="submit" name="submit" value="Add Admin" /></td>
                        </tr>
                    </table>
                </fieldset>
            </form>
        </div>
    </main>
</body>
</html>
