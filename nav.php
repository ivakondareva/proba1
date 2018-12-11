<!DOCTYPE html 5.0>
<html>
<head>
    <style>
body {
    background-color:white;
}
#logo {
    padding: 10px;
  text-align: center;
  background: #DD74F2;
  color: black;
  font-size: 30px;
}
#logo a{
    float:right;
    display:block;
    text-align:right;
    font-size:20px;
    color: black;
    text-decoration: none;
    display:none;


}
#logo a:link{
    color: #FFF;
}

ul {
    border: 1px solid black;
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #D374F2;
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
    background-color: #E88AFA;
}
</style>
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
<div id="logo">
<a href="http://localhost/ORAK/Home.php?logout='1'" >logout</a> 
<h1> Project for Dorothy </h1>
 </div>
<ul>
    
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{$user=$_SESSION['username'];
echo
"
    <li><a href='Home.php?user=$user'> Home </a></li>
    <li><a href='proba1.php?user=$user'>PersonList</a></li>
    <li><a href='proba2.php?user=$user'>EditPerson</a></li>
    <li><a href='about'?user=$user'>About</a></li>
";
?>
<style type="text/css">#logo a{
display:block;
}</style>
<?php
}
else
{
    echo
    "
        <li><a href='Home.php'> Home </a></li>
        <li><a href='proba1.php'>PersonList</a></li>
        <li><a href='proba2.php'>EditPerson</a></li>
        <li><a href='about'>About</a></li>
    ";
}
?>
</ul>
<script>
        includeHTML();
    </script>
</body>
</html>
