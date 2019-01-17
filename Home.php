<?php include('register/server.php') ?>
<!DOCTYPE html 5.0>
<html>
<head>
<meta http-equiv="Content-type" content="text/html' charset=utf8">
<title> data </title>
</head>
<!-- 
<link rel="stylesheet" type="text/css" href="Styling/main/css/style.css">
<link rel="stylesheet" type="text/css" href="Styling/main/css/spinners.css">
<link rel="stylesheet" type="text/css" href="Styling/main/css/animate.css">
<link rel="stylesheet" type="text/css" href="Styling/main/css/colors/default-dark.css">
<link rel="stylesheet" type="text/css" href="Styling/main/css/icons/flag-icon-css/flag-icon.min.css">
<link rel="stylesheet" type="text/css" href="Styling/main/css/icons/font-awesome/css/fontawesome-all.css">
<link rel="stylesheet" type="text/css" href="Styling/main/css/icons/linea-icons/linea.css">
<link rel="stylesheet" type="text/css" href="Styling/main/css/icons/material-design-iconic-font/css/materialdesignicons.min.css">
<link rel="stylesheet" type="text/css" href="Styling/main/css/icons/simple-line-icons/css/simple-line-icons.css">
<link rel="stylesheet" type="text/css" href="Styling/main/css/icons/themify-icons/themify-icons.css">
<link rel="stylesheet" type="text/css" href="Styling/main/css/icons/weather-icons/css/weather-icons.min.css">
<link rel="stylesheet" type="text/css" href="Styling/main/css/pages/bootstrap-switch.css">
<link rel="stylesheet" type="text/css" href="Styling/main/css/pages/breadcrumb-page.css">
<link rel="stylesheet" type="text/css" href="Styling/main/css/pages/card-page.css">
<link rel="stylesheet" type="text/css" href="Styling/main/css/pages/chat-app-page.css">
<link rel="stylesheet" type="text/css" href="Styling/main/css/pages/contact-app-page.css">
<link rel="stylesheet" type="text/css" href="Styling/main/css/pages/dashboard1.css">
<link rel="stylesheet" type="text/css" href="Styling/main/css/pages/dashboard2.css">
-->
<link rel="import" href="nav.php">
<link rel="import" href="http://localhost/ORAK/register/login.php">
<style>
* {box-sizing: border-box}
/* Add padding to containers */
.container {
  padding: 16px;
}
/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
/* Set a style for the submit/register button */
.registerbtn {
  background-color: #a585d3;
  color: black;
  padding: 16px 20px;
  margin: 0 auto;
  border: none;
  cursor: pointer;
  width: 10%;
  
}
.registerbtn:hover {
  opacity:1;
}
/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
.btn-group .button {
  background-color: black; /* Green */
  border: 1px solid white;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  width: 200px;
  display: block;
}

.btn-group .button:not(:last-child) {
  border-bottom: none; /* Prevent double borders */
}

.btn-group .button:hover {
  background-color:	#708090;
}
.button {
  display: inline-block;
  padding: 15px 25px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: black;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:active {
  background-color: black;
  box-shadow: 0 5px white;
  transform: translateY(4px);
}
</style>
<?php
if(isset($_POST['toCandidates']))
{
        $userche='location:proba1.php?user='.$_SESSION['username'];
        header($userche);
}
else
if(isset($_POST['toEmployees']))
{
        $userche='location:Home.php?user='.$_SESSION['username'];
        header($userche);
}
?>
<body>

<div w3-include-html="nav.php"></div> 
</br>
<div w3-include-html="http://localhost/ORAK/register/login.php"> </div>

<form action='Home.php' method='post'  class="btn-group" enctype='multipart/form-data'>
<button type="submit" name="toCandidates"  class="button" > Go to Candidates </button>
<button type="submit" name="toEmployees" class="button" > Go to Employees </button>
</form>
<!--
<form action="action_page.php">
  <div class="container">
    <h2>Log In</h2>
    <hr>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <button type="submit" class="registerbtn">Log in</button>
  </div>
  <div class="container signin">
    <p>If you don't have an account <a href="register.php">Sign up</a>.</p>
  </div>

</form>
-->
</body>
</html>
