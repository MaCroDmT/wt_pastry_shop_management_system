<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Registration</title>
  </head>
  <body>
    <main>
      <h1>Employee Registration</h1>
      <fieldset>
        <legend>Employee Registration</legend>
        <form action="../../controller/employee/employeeRegController.php" method="post">
          <table align="center">
            <tr>
              <td><label for="name">Name</label></td>
              <td>:</td>
              <td><input type="text" name="name" id="name" required /></td>
            </tr>
            <tr>
            <tr>
              <td><label for="phone">Phone</label></td>
              <td>:</td>
              <td><input type="text" name="phone" id="phone" required /></td>
            </tr>
            <td><label for="email">Email</label></td>
              <td>:</td>
              <td><input type="email" name="email" id="email" required /></td>
            </tr>
            <tr>
              <td><label for="address">Address</label></td>
              <td>:</td>
              <td><input type="text" name="address" id="address" required /></td>
            </tr>
            <tr>
              <td><label for="doj">Date of Join</label></td>
              <td>:</td>
              <td><input type="text" name="doj" id="doj" required /></td>
            </tr>
            <tr>
              <td><label for="password">Password</label></td>
              <td>:</td>
              <td><input type="password" name="password" id="password" required /></td>
            </tr>
            <tr>
              <td><label for="cpassword">Confirm Password</label></td>
              <td>:</td>
              <td><input type="password" name="cpassword" id="cpassword" required /></td>
            </tr>
            <tr>
              <td colspan="3" style="text-align: center;">
                <input type="submit" name="submit" value="submit">
                <input type="reset" value="Reset" />
              </td>
            </tr>
          </table>
        </form>
      </fieldset>
    </main>
  </body>
</html>
