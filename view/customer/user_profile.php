<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile</title>
    <link rel="stylesheet" href="mystyle.css">
  </head>
  <body>
<fieldset>
<legend> <h1>Profile!</h1></legend>

    <table>

    <tr>
      <td> 
        <h1>
        <p>Name: <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Not Set'; ?></p> 
        </h1>
      </td>
    </tr>
    <tr>
      <td> 
        <h1>
          <p>Email: <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'Not Set'; ?></p>
        </h1>
      </td>
    </tr>
    <tr>
      <td> 
        <h1>
          <p>Phone: <?php echo isset($_SESSION['phone_number']) ? $_SESSION['phone_number'] : 'Not Set'; ?></p>
        </h1>
      </td>
    </tr>
    <tr>
      <td> 
        <h1>
          <p>Contect method: <?php echo isset($_SESSION['contact_method']) ? $_SESSION['contact_method'] : 'Not Set'; ?></p>
        </h1>
      </td>
    </tr>
    <tr>
      <td> 
        <h1>
          <p>Gender: <?php echo isset($_SESSION['gender']) ? $_SESSION['gender'] : 'Not Set'; ?></p>
        </h1>
      </td>
    </tr>
    <tr>
      <td> 
        <h1>
          <p>Date of Birth: <?php echo isset($_SESSION['dob']) ? $_SESSION['dob'] : 'Not Set'; ?></p>
        </h1>
      </td>
    </tr>
    <tr>
      <td> 
        <h1>
          <p>Delivery Address: <?php echo isset($_SESSION['delivery_address']) ? $_SESSION['delivery_address'] : 'Not Set'; ?></p>
        </h1>
      </td>
    </tr>
    <tr>
      <td> 
        <h1>
          <p>Permanent Address: <?php echo isset($_SESSION['permanent_address']) ? $_SESSION['permanent_address'] : 'Not Set'; ?></p>
        </h1>
      </td>
    </tr>

    <tr>
      <td> 
        <h1>
          <a id="pr" href="../view/edit_profile.php"><button class="returnlog">Edit Profile</button></a>
        </h1>
      </td>
    </tr>
    <tr>
      <td> 
        <h1>
          <a id="pr" href="../view/user_panel.php"><button class="returnlog">Go to User Panel</button></a>
        </h1>
      </td>
    </tr>

    </table>

</fieldset>
    

  </body>
</html>
