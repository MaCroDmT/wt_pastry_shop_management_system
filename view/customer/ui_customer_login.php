<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LogIn</title>
    <link rel="stylesheet" href="mystyle.css">
  </head>
  <body>
    <form action="../control/log_control.php" method="POST" > <!--onsubmit="return validateForm()"--><!-- when js on then cut-paste this inside the line at last-->
     
      <fieldset>
<legend><h2>LOG-IN</h2></legend>
        <table>
          <tr>
            <td class="text">Enter your name</td>
            <td class="text">:</td>
            <td>
              <input type="text" name="name" />
            </td>
          </tr>

          <tr>
            <td class="text">Enter your password</td>

            <td class="text">:</td>

            <td>
              <input type="password" name="pass" />
            </td>
          </tr>

          <tr>
            <td  align="center">
              <input type="submit" name="submit" value="Log In" />
            </td>
            <td></td>
            <td  align="center"><input type="reset" name="reset" /></td>
          </tr>
        </table>
      </fieldset>
      <tr>
        <td><h3>Don't have any account?</h3></td>
        <td> <a href="ui_customer_registration.php" target="_self"> Wanna Go to Registration!</a></td>
    </tr>
    </form>
   <!--<script src="../view/control/log_control.js"></script>-->
  </body>
</html>

