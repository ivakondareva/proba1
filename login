<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script>
        function includeHTML() {
          var z, i, elmnt, file, xhttp;
          /*loop through a collection of all HTML elements:*/
          z = document.getElementsByTagName("*");
          for (i = 0; i < z.length; i++) {
            elmnt = z[i];
            /*search for elements with a certain atrribute:*/
            file = elmnt.getAttribute("w3-include-html");
            if (file) {
              /*make an HTTP request using the attribute value as the file name:*/
              xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                  if (this.status == 200) {elmnt.innerHTML = this.responseText;}
                  if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
                  /*remove the attribute, and call this function once more:*/
                  elmnt.removeAttribute("w3-include-html");
                  includeHTML();
                }
              } 
              xhttp.open("GET", file, true);
              xhttp.send();
              /*exit the function:*/
              return;
            }
          }
        }
        </script>
</head>
<body>
  <div class="header">
    <h2 class="input-group">Login</h2>
  </div>
   
  <form method="post" action="http://localhost/ORAK/register/login.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p class="input-group">
      Not yet a member? <a href="http://localhost/ORAK/register/register.php">Sign up</a>
    </p>
  </form>
  <script>
        includeHTML();
    </script>
</body>
</html>
