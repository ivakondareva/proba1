<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="import" href="nav.php">
	<style>
	input[type=text], input[type=password], input[type=email] {
  width: 20%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: 1px solid black;
  background: #f1f1f1;
}
input[type=text]:focus, input[type=password]:focus, input[type=email]:focus {
  background-color: #ddd;
  outline: none;
}
/* Overwrite default styles of hr */

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
.btn {
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
.btn:active {
  background-color: black;
  box-shadow: 0 5px white;
  transform: translateY(4px);
}
</style>
</head>
<body>
<div w3-include-html="nav.php"></div> 
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="http://localhost/ORAK/register/register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="http://localhost/ORAK/Home.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
