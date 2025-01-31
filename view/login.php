<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="../assets/login.css">
  </head>
  <body>
    <header></header>

    <main>
      <div class="login-container">
        <form action="../control/loginController.php" method="post">
          <h2>Login</h2>
          <label for="role">Role :</label>
          <select name="role" id="role">
            <option value="customer" selected>Customer</option>
            <option value="employee">Employee</option>
            <option value="admin">Admin</option>
          </select>
          <hr>
          <br><br>
          <label for="email">Email :</label>
          <input type="email" name="email" id="eamil" required>
          <label for="password">Password :</label>
          <input type="password" name="password" id="password" required>
          <input type="submit" value="Login">
          <p>Don't have an account? <a href="registration.php">Register here</a></p>
        </form>
      </div>
    </main>
  </body>
</html>
