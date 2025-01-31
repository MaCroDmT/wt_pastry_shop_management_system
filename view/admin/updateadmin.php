<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: ../login.php");
    exit();
}
require_once('../../control/admin/viewadminsController.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin</title>
    <link rel="stylesheet" href="../../assets/admin/updateadmin.css">
    <script src="../../js/admin/updateadmin.js" defer></script>
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
        <div class="table-container">
            <h1>Update Admin</h1>
            <?php if (!empty($admins)): ?>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Bio</th>
                            <th>Reference</th>
                            <th>Select</th>
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
                                <td>
                                    <a class="button" href="updateadmin.php?id=<?php echo $admin['id']; ?>&name=<?php echo $admin['name']; ?>&phone=<?php echo $admin['phone']; ?>&email=<?php echo $admin['email']; ?>&bio=<?php echo $admin['bio']; ?>&ref=<?php echo $admin['ref']; ?>&password=<?php echo $admin['pass']; ?>">
                                        Select
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No admins found.</p>
            <?php endif; ?>
        </div>

        <?php
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $phone = isset($_GET['phone']) ? $_GET['phone'] : '';
        $email = isset($_GET['email']) ? $_GET['email'] : '';
        $bio = isset($_GET['bio']) ? $_GET['bio'] : '';
        $ref = isset($_GET['ref']) ? $_GET['ref'] : '';
        $password = isset($_GET['pass']) ? $_GET['pass'] : '';
        ?>

        <div class="form-container">
            <h2>Edit Admin</h2>
            <fieldset>
                <form id="updateAdminForm" action="../../control/admin/updateadminController.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                    <p>
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>" onfocus="clearError('nameError')" onblur="validateName()">
                    </p>
                    <p><span id="nameError" class="error"></span></p>
                    <p>
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($phone); ?>" onfocus="clearError('phoneError')" onblur="validatePhone()">
                    </p>
                    <p><span id="phoneError" class="error"></span></p>
                    <p>
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" onfocus="clearError('emailError')" onblur="validateEmail()">
                    </p>
                    <p><span id="emailError" class="error"></span></p>
                    <p>
                        <label for="bio">Bio:</label>
                        <textarea name="bio" id="bio" onfocus="clearError('bioError')" onblur="validateBio()"><?php echo htmlspecialchars($bio); ?></textarea>
                    </p>
                    <p><span id="bioError" class="error"></span></p>
                    <p>
                        <label for="ref">Reference:</label>
                        <input type="text" name="ref" id="ref" value="<?php echo htmlspecialchars($ref); ?>" onfocus="clearError('refError')" onblur="validateReference()">
                    </p>
                    <p><span id="refError" class="error"></span></p>
                    <p>
                        
                        <input type="hidden" name="pass" id="password" value="<?php echo htmlspecialchars($password); ?>" onfocus="clearError('passwordError')" onblur="validatePassword()">

                        <input type="submit" name="submit" value="Update Admin">
                    </p>
                </form>
            </fieldset>
        </div>
    </main>
</body>
</html>