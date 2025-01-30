<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Customer Registration</title>
  </head>
  <body>
    <main>
      <h1>Customer Registration</h1>
      <fieldset>
        <legend>Customer Registration</legend>
        <form
          action="../../controller/customer/customerRegController.php"
          method="post"
        >
        <form>
            <table align="center">
              <tr>
                <td><label for="name">Name</label></td>
                <td>:</td>
                <td><input type="text" name="name" id="name" /></td>
              </tr>
              <tr>
                <td><label for="age">Age</label></td>
                <td>:</td>
                <td><input type="number" name="age" id="age" /></td>
              </tr>
              <tr>
                <td><label for="gender">Gender</label></td>
                <td>:</td>
                <td>
                  <input type="radio" name="gender" id="male" value="male" />
                  <label for="male">Male</label>
                  <input type="radio" name="gender" id="female" value="female" />
                  <label for="female">Female</label>
                </td>
              </tr>
              <tr>
                <td><label for="address">Permanent Address</label></td>
                <td>:</td>
                <td><input type="text" name="address" id="address" /></td>
              </tr>
              <tr>
                <td><label for="DAddress">Delivery Address</label></td>
                <td>:</td>
                <td><input type="text" name="DAddress" id="DAddress" /></td>
              </tr>
              <tr>
                <td><label for="phone">Phone Number</label></td>
                <td>:</td>
                <td><input type="text" name="phone" id="phone" /></td>
              </tr>
              <tr>
                <td><label for="email">Email</label></td>
                <td>:</td>
                <td><input type="email" name="email" id="email" /></td>
              </tr>
              <tr>
                <td><label for="password">Password</label></td>
                <td>:</td>
                <td><input type="password" name="password" id="password" /></td>
              </tr>
              <tr>
                <td><label for="cpassword">Confirm Password</label></td>
                <td>:</td>
                <td><input type="password" name="cpassword" id="cpassword" /></td>
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
