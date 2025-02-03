<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login</title>
  <link rel="stylesheet" href="../assets/login.css">
</head>
<body>
  <header></header>

  <main>
    <div class="login-container">
      <form action="../controller/loginController.php" method="post">
        <h2>Admin Login</h2>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        
        <input type="hidden" name="role" value="admin">
        
        <input type="submit" value="Login">
        
        <p>Don't have an account? <a href="registration.php">Register here</a></p>
      </form>
    </div>
  </main>
</body>
</html>
