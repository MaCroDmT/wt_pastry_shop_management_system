<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regestration</title>
    <link rel="stylesheet" href="mystyle.css">
    <script src="../control/reg_validation.js"></script>

</head>

<body>
<form action="../control/reg_control.php" method="post" onsubmit="return validateForm()">

    <fieldset  >
            <legend>
                <h2> Customer Registration</h2>
            </legend>
        <table>


            <tr>
                <td class="text">Name</td>
                <td class="text">:</td>
                <td><input type="text" name="c_name"></td>
                <td><span id="usernameError" class="error"></span></td>
            </tr>
    
            <tr>
                <td class="text">Password</td>
                <td class="text">:</td>
                <td><input type="password" name="c_pass"></td>
                <td><span id="passwordError" class="error"></span></td> 
            </tr>

            <tr>
                <td class="text">Confirm Password</td>
                <td class="text">:</td>
                <td><input type="password" name="c_c_pass"></td>
                <td><span id="confirmPasswordError" class="error"></span></td>
            </tr>
    
            <tr>
                <td class="text">E-mail</td>
                <td class="text">:</td>
                <td><input type="text" class="mail" name="c_mail"></td>
                <td><span id="emailError" class="error"></span></td> 
            </tr>

            <tr>
                <td class="text">Phone Number</td>
                <td class="text">:</td>
                <td><input type="text" name="c_ph_num"></td>
                <td><span id="phoneError" class="error"></span></td>
                <td><span id="phoneError" class="error"></span></td> 
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
                <td><span id="contactMethodError" class="error"></span></td>
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
                <td><span id="genderError" class="error"></span></td> 
            </tr>
    
            <tr>
                <td class="text">Date of Birth</td>
                <td class="text">:</td>
                <td><input type="date" name="c_date"></td>
                <td><span id="dobError" class="error"></span></td> 
            </tr>

            <tr>
                <td class="text">Delivery Address</td>
                <td class="text">:</td>
                <td><textarea name="c_Delivery_address" id="Delivery_address"></textarea></td>
                <td><span id="deliveryAddressError" class="error"></span></td>
            </tr>

            <tr>
                <td class="text">Permanent Address</td>
                <td class="text">:</td>
                <td><textarea name="c_Parmanent_address" id="Parmanent_address"></textarea></td>
                <td><span id="permanentAddressError" class="error"></span></td>
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
   

</body>
</html>
</body>
</html>
