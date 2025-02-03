<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Employee Login</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <form action="login_php.php" method="post">
    <fieldset>
      <legend><h1>Employee Login</h1></legend>
      <table>
        <tr>
          <td>User Name</td>
          <td><input type="text" name="u_name" placeholder="Enter your username"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="pass" placeholder="Enter your password"></td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Login">
            <input type="reset" name="reset" value="Reset">
          </td>
        </tr>
      </table>
    </fieldset>
    <p style="text-align: center;">Don't have an account? <a href="registration.php">Register Here</a></p>
  </form>
</body>
</html>
