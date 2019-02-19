<!DOCTYPE html 5.0>
<html>
<head>
    <style>
body {
    background-color:white;
    font-family: Georgia, serif;
}
h1 { font-family: Segoe; font-size: 34px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 26.4px; }
h3 { font-family: Segoe; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px; }
 p { font-family: Segoe; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 20px; }
blockquote { font-family: Segoe; font-size: 21px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 30px; }
 pre { font-family: Segoe; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 18.5714px; }


#logo {
  text-align: center;
  background-image: url("https://cloud.addictivetips.com/wp-content/uploads/2017/10/The-Night-Sky-Above-Bassano-del-Grappa-Italy.jpg");
  background-size:100%;
  color: white;
  font-style: italic;
  height: 32%;
}
#logo a{
    float:right;
    display:block;
    text-align:right;
    color: white;
    text-decoration: none;
    display:none;
}
#logo a:link{
    color: #FFF;
}
.input-type{
    display:none;
}
ul {
    border: 1px solid black;
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-size:100%;
}
li{
    float:left;
}
li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size:18px;
}
li a:hover {
    background-color: #9999FF;
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
<input type="image" src="https://softuni.bg/companies/profile/logo/244"> 
<h1> Project for Dorothy </h1>
<ul>
    
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{$user=$_SESSION['username'];
echo
"
    <li><a href='Home.php?user=$user'> Home </a></li>
    <li><a href='proba1.php?user=$user&isCandidate=NULL'>PersonList</a></li>
    <li><a href='proba2.php?user=$user'>EditPerson</a></li>
    <li><a href='Search.php?user=$user'>Search</a></li>
";
?>
<style type="text/css">#logo a{
display:block;
}
.input-group{
    display:none;
}
</style>
<?php
}
else
{
    echo
    "
        <li><a href='Home.php'> Home </a></li>
        <li><a href='proba1.php'>PersonList</a></li>
        <li><a href='proba2.php'>EditPerson</a></li>
        <li><a href='Search.php'>Search</a></li>
    ";
}
?>
</ul>
 </div>


<script>
        includeHTML();
    </script>

</body>
</html>
