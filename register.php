<!DOCTYPE html 5.0>
<html>
<head>
<meta http-equiv="Content-type" content="text/html' charset=utf8">
<title> data </title>
</head>
<style>
body {
    background-color:white;
}
h1{
    padding: 60px;
  text-align: center;
  background: #a585d3;
  color: black;
  font-size: 50px;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #a585d3;
}
li{
    float:left;
}
li a {
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
li a:hover {
    background-color: #52377a;
}
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

</style>
<body>
<h1> Project for Dorothy </h1>
<ul>

    <li><a href="proba1.php">PersonList</a></li>
    <li><a href="proba2.php">EditPerson</a></li>
    <li><a href="about">About</a></li>
</ul>
<form action="action_page.php">
  <div class="container">
    <h2>Register</h2>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    <hr>

    <button type="submit" class="registerbtn">Register</button>
  </div>

</form>
</body>
</html>