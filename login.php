<?php
include("config.php");
  if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $admin = mysqli_real_escape_string($db,$_POST['user']);
      $pass = mysqli_real_escape_string($db,$_POST['passcode']);

      $sql = "SELECT id FROM admin WHERE name = '{$admin}' and password = '{$pass}'";
      $result = mysqli_query($db, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $active = $row["active"];

      $count = mysqli_num_rows($result);
     // $count = ($result);
    // $count = mysqli_result($result);

		 if($count == 1) {
         session_register("userlog");
         $_SESSION['login_user'] = $admin;

         header("location: modify.php");
      }
      else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Log-In</title>
</head>

<body>
<form action = "" method = "post">
                  <label><br>Login to modify records<br><br>User :</label><input type = "text" name = "userlog" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "passcode" class = "box" /><br/><br />
                  <input onclick = "location.href='modify.php';" value = " Submit "/><br />
               </form>
</body>

</html>
