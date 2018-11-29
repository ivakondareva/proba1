<!DOCTYPE html 5.0>
<head>
<!--
<style>
table {
    width:70%; 
    margin-left:20%; 
    margin-right:20%;
  }
table, th, td {
    border-bottom: 1px solid black;
	width: 60%;
}

</style>
-->
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

<meta http-equiv="Content-type" content="text/html' charset=utf8">
<title> data </title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
$database= mysqli_select_db($conn, 'dorothy');

$word=array(
	"Id",
	"Name",
	"Email",
	"PhoneNumber",);

$i=0;
$arr=array();
for($i=0;$i<4;$i++)
{
	$sql = "SELECT $word[$i] FROM candidates ORDER BY Name";
	//$sqlphone .= "SELECT id FROM candidates";
	
	$ind=0;
	// Execute multi query
	if (mysqli_multi_query($conn,$sql))
	{
  		do
    	{
    		// Store first result set
    		if ($sql=mysqli_store_result($conn))
      		{
      			while ($row=mysqli_fetch_row($sql))
        		{
   	        		$arr[$i][$ind]=$row[0];
   	        		$ind++;
	        		//printf("%s</br>",$row[0]);
        		}
      			mysqli_free_result($sql);
      		}
    	}
  		while (mysqli_more_results($conn) && mysqli_next_result($conn));
	}
}
$j=0;
"</br>";
echo "<table>
<th>Name</th>
<th>Email</th>
<th>Phone Number</th>";
for($j=0;$j<$ind;$j++)
{
	echo "<tr>";
	for($i=1;$i<4;$i++)
	{
		echo "<td>";
		echo "<center>";
		$temp=$arr[0][$j];
		$tempname=$arr[$i][$j];
		if($i==1)
		{echo "<a href='Candidate.php?id=$temp' style='color: RGB(103,117,124)'> $tempname
		</a>";}
		else printf("%s</br>",$arr[$i][$j]);
		echo "</td>";
	}
	echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>
</body>
</html>