<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Registration</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<form action="reg_php.php" method="post" >
<fieldset>
<legend><h1>Employee Registration</h1></legend>
<table>
<tr>
<td>User Name</td>
<td><input type="text" name="u_name"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="pass"></td>
</tr>
<tr>
<td>Confirm Password</td>
<td><input type="password" name="confirm_pass"></td>
</tr>
<tr>
<td>Email</td>
<td><input type="email" name="mail"></td>
</tr>
<tr>
<td>Phone Number</td>
<td><input type="text" name="pho_num"></td>
</tr>
<tr>
<td>Employee ID</td>
<td><input type="text" name="emp_id" placeholder="Enter Employee ID"></td>
</tr>
<tr>
<td>Employee Address</td>
<td><input type="text" name="emp_address" placeholder="Address"></td>
</tr>
<tr>
<td>Permanent Address</td>
<td><input type="text" name="permanent_address" placeholder="Permanent Address"></td>
</tr>
<tr>
<td>Department</td>
<td><input type="text" name="department" placeholder="Enter Department"></td>
</tr>
 <tr>
 <td>Date of Birth</td>
    <td><input type="date" name="dob"></td>
 </tr>
<tr>           
<td>Position</td>
<td><input type="text" name="pos" placeholder="Enter position"></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Register"></td>
                <td><input type="reset" name="reset" value="Reset"></td>
            </tr>
        </table>
    </fieldset>
    <tr>
        <td><h3>Are you done with registration?</h3></td>
        <td><a href="LOGIN.html">Wanna go to Login!</a></td>
    </tr>
 </form>
</body>
</html>
