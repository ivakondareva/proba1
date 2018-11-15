<!DOCTYPE html 5.0>
<head>
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
	"Name",
	"Email",
	"PhoneNumber",);

$i=0;
$arr=array();
for($i=0;$i<3;$i++)
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
	for($i=0;$i<3;$i++)
	{
		echo "<td>";
		echo "<center>";
		printf("%s</br>",$arr[$i][$j]);
		echo "</td>";
	}
	echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>
</body>
</html>
