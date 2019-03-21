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
<link rel="import" href="nav.php">

<meta http-equiv="Content-type" content="text/html' charset=utf8">
<title> data </title>
</head>
<body>
<div w3-include-html="nav.php"></div> 
</br>
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true && $_SESSION['username']==$_REQUEST["user"])
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    $conn = mysqli_connect($servername, $username, $password);
    $database= mysqli_select_db($conn, 'dorothy');
    $word=array(
        "Id",
        "Name",
        "Email",
        "PhoneNumber",
        "IsCandidate");
    $i=0;
    $arr=array();
    for($i=0;$i<5;$i++)
    {
        $sql = "SELECT $word[$i] FROM candidates ORDER BY Name";    
        $ind=0;
        if (mysqli_multi_query($conn,$sql))
        {
            do
            {
                if ($sql=mysqli_store_result($conn))
                {
                    while ($row=mysqli_fetch_row($sql))
                    {
                        $arr[$i][$ind]=$row[0];
                        $ind++;
                    }
                    mysqli_free_result($sql);
                }
            }while (mysqli_more_results($conn) && mysqli_next_result($conn));
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
        {   if($arr[4][$j]==1)
            {
                echo "<td>";
                echo "<center>";
                $temp=$arr[0][$j];
                $tempname=$arr[$i][$j];
                if($i==1)
                {$user=$_SESSION['username'];
                echo "<a href='Candidate.php?user=$user&id=$temp' style='color: RGB(103,117,124)'> $tempname
                </a>";}
                else printf("%s</br>",$arr[$i][$j]);
                echo "</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($conn);
}
else
    {
      $bam="not logged in";
      printf("%s",$bam);
      echo "<a href='Home.php'>Login</a>";
}
?>
</body>
</html>
