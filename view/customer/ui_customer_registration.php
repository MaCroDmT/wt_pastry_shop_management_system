<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regestration</title>
    <link rel="stylesheet" href="mystyle.css">
</head>

<body>
    <form action= "../control/reg_control.php"method="post" ><!--onsubmit="return validateForm()"--><!-- when js on then cut-paste this inside the line at last-->
    <fieldset  >
            <legend>
                <h2> Customer Registration</h2>
            </legend>
        <table>


            <tr>
                <td class="text">Name</td>
                <td class="text">:</td>
                <td><input type="text" name="c_name"></td>
            </tr>
    
            <tr>
                <td class="text">Password</td>
                <td class="text">:</td>
                <td><input type="password" name="c_pass"></td>
            </tr>

            <tr>
                <td class="text">Confirm Password</td>
                <td class="text">:</td>
                <td><input type="password" name="c_c_pass"></td>
            </tr>
    
            <tr>
                <td class="text">E-mail</td>
                <td class="text">:</td>
                <td><input type="text" class="mail" name="c_mail"></td>
            </tr>

            <tr>
                <td class="text">Phone Number</td>
                <td class="text">:</td>
                <td><input type="text" name="c_ph_num"></td>
            </tr>

            <tr>
                <td class="text">Preferred Contact Method</td>
                <td class="text">:</td>
                <td>
                    <select name="c_contact_method">
                        <option value="none" selected>Select Method</option>
                        <option value="SMS">SMS</option>
                        <option value="Call">Phone Call</option>
                        <option value="E-mail">E-mail</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td class="text">Gender</td>
                <td class="text">:</td>
                <td>
                    <select name="c_gender">
                        <option value="none" selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </td>
            </tr>
    
            <tr>
                <td class="text">Date of Birth</td>
                <td class="text">:</td>
                <td><input type="date" name="c_date"></td>
            </tr>

            <tr>
                <td class="text">Delivery Address</td>
                <td class="text">:</td>
                <td><textarea name="c_Delivery_address" id="Delivery_address"></textarea></td>
            </tr>

            <tr>
                <td class="text">Permanent Address</td>
                <td class="text">:</td>
                <td><textarea name="c_Parmanent_address" id="Parmanent_address"></textarea></td>
            </tr>

            <tr>
                <td  align="center"><input type="submit" name="submit" value="Submit"></td>
                <td></td>
                <td  align="center"><input type="reset" name="reset"></td>
            </tr>

        </table>
    </fieldset>
        <div>
        <h3>Are you done with Regisrtraion?</h3>
        <a href="ui_customer_login.php" target="_self"> Wanna Go to Login!</a>
        </div>
               
    </form>
    <!--<script src="../view/control/reg_control.js"></script>-->

</body>
</html>
</body>
</html>
