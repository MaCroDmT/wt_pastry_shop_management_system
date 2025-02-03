<?php

require("../model/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $username = $_POST['c_name'] ?? $_SESSION['username'];
    $email = $_POST['c_mail'] ?? $_SESSION['email'];
    $phone_number = $_POST['c_ph_num'] ?? $_SESSION['phone_number'];
    $contact_method = $_POST['c_contact_method'] ?? $_SESSION['contact_method'];
    $gender = $_POST['c_gender'] ?? $_SESSION['gender'];
    $dob = $_POST['c_date'] ?? $_SESSION['dob'];
    $delivery_address = $_POST['c_Delivery_address'] ?? $_SESSION['delivery_address'];
    $permanent_address = $_POST['c_Parmanent_address'] ?? $_SESSION['permanent_address'];
    

    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['phone_number'] = $phone_number;
    $_SESSION['contact_method'] = $contact_method;
    $_SESSION['gender'] = $gender;
    $_SESSION['dob'] = $dob;
    $_SESSION['delivery_address'] = $delivery_address;
    $_SESSION['permanent_address'] = $permanent_address;

    $user_id = $_SESSION['user_id'];

    $customer = new customer();
    $customer->updateProfile($user_id, $username,  $email, $phone_number, $contact_method, $gender, $dob, $delivery_address, $permanent_address);

    $success_message = "Profile updated successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>
    <fieldset>
        <legend>
        <h1>Edit Profile</h1>
        </legend>
   
<?php 
    if (isset($success_message)) { 
        echo "<p class='p'> $success_message</p>";
    }
    if (isset($password_message)) {
        echo "<p class='p'> $password_message</p>";
    }
?>

<form method="POST" action="edit_profile.php">
   <table>
        <tr>
            <td class="text">Name</td>
            <td class="text">:</td>
            <td><input type="text" name="c_name" value="<?php echo $_SESSION['username']; ?>"></td>
        </tr>
        <tr>
            <td class="text">Email</td>
            <td class="text">:</td>
            <td><input type="email" name="c_mail" value="<?php echo $_SESSION['email']; ?>"></td>
        </tr>
        <tr>
            <td class="text">Phone Number</td>
            <td class="text">:</td>
            <td><input type="text" name="c_ph_num" value="<?php echo $_SESSION['phone_number']; ?>"></td>
        </tr>
        <tr>
    <td class="text">Preferred Contact Method</td>
    <td class="text">:</td>
    <td>
        <select name="c_contact_method">
            <option value="Email" <?php echo ($_SESSION['contact_method'] == 'E-mail') ? 'selected' : ''; ?>>E-mail</option>
            <option value="Call" <?php echo ($_SESSION['contact_method'] == 'Call') ? 'selected' : ''; ?>>Call</option>
            <option value="SMS" <?php echo ($_SESSION['contact_method'] == 'SMS') ? 'selected' : ''; ?>>SMS</option>
        </select>
    </td>
</tr>

    <td class="text">Gender</td>
    <td class="text">:</td>
    <td>
        <select name="c_gender">
            <option value="Male" <?php echo ($_SESSION['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo ($_SESSION['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
        </select>
    </td>
</tr>

        <tr>
            <td class="text">Date of Birth</td>
            <td class="text">:</td>
            <td><input type="date" name="c_date" value="<?php echo $_SESSION['dob']; ?>"></td>
        </tr>
        <tr>
    <td class="text">Delivery Address:</td>
    <td class="text">:</td>
    <td>
        <textarea name="c_Delivery_address" rows="3" cols="30"><?php echo $_SESSION['delivery_address']; ?></textarea>
    </td>
</tr>
<tr>
    <td class="text">Permanent Address:</td>
    <td class="text">:</td>
    <td>
        <textarea name="c_Parmanent_address" rows="3" cols="30"><?php echo $_SESSION['permanent_address']; ?></textarea>
    </td>
</tr>

    </table>
    <table>        
    <tr>  
            <td class="text">  
                <button align="center" class="returnlog" type="submit" name="submit">Update Profile</button>
            </td>
    </tr>
    </table>
    <a id="pr" href="user_panel.php">Go to User Panel</a>
    </fieldset>
    
    </form>
</body>
</html>
