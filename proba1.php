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
<style>
p {
  text-align:center;
  font-size: 30px;
  font-weight: bold;
}
th {
	padding: 20px;
	margin:20px;
}
</style>
<link rel="import" href="nav.php">

<style>
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
  background-color: #708090;
}
.button {
	float:left;
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

<meta http-equiv="Content-type" content="text/html' charset=utf8">
<title> data </title>
</head>
<body>
<div w3-include-html="nav.php"></div> 
</br>
<?php
session_start();
if(isset($_POST['candidatesBtn']))
	{
        $userche='location:proba1.php?user='.$_SESSION['username'].'&isCandidate=1';
        header($userche);
	}
	else
	if(isset($_POST['employeesBtn']))
	{
        $userche='location:proba1.php?user='.$_SESSION['username'].'&isCandidate=0';
        header($userche);
	}
?>
<?php
if (isset($_SESSION['username']) && isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true && $_SESSION['username']==$_REQUEST["user"])
{
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
        "PhoneNumber",
        "IsCandidate");
    
	
    $i=0;
    $arr=array();
    for($i=0;$i<5;$i++)
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
	 echo "<form action='proba1.php' method='post'  class='btn-group' enctype='multipart/form-data'>
	<button type='submit' name='candidatesBtn'  class='button' > See Candidates </button>
	<button type='submit' name='employeesBtn' class='button' > See Employees </button>
	</form>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
    echo "<table>
    <th>Име</th>
	<th>E-mail
	</th>
    <th>Телефонен Номер</th>";
    $isCand=$_REQUEST["isCandidate"];
    for($j=0;$j<$ind;$j++)
    {
    	if($arr[4][$j]==$isCand)
        {
        	echo "<tr>";
        	for($i=1;$i<4;$i++)
        	{   
                echo "<td>";
                echo "<center>";
                $temp=$arr[0][$j];
                $tempname=$arr[$i][$j];
                if($i==1)
                {
                	if($isCand==1)
                	{
                		$user=$_SESSION['username'];
                		echo "<a href='Candidate.php?user=$user&id=$temp' style='color: RGB(103,117,124)'> $tempname
                		</a>";
                		echo "</td>";
                	}
                	else
                	{
                		$user=$_SESSION['username'];
                		echo "<a href='Employee.php?user=$user&id=$temp' style='color: RGB(103,117,124)'> $tempname
                		</a>";
                		echo "</td>";
                	

                	}
                }
                else 
                {
                	printf("%s</br>",$arr[$i][$j]);
                	echo "</td>";
                }
            }
        	echo "</tr>";
    	}
    }
    echo "</table>";
    mysqli_close($conn);
}
else
{
	echo "<p>";
	$bam="За да видите тази страница, моля, влезте в профила си!";
	printf("%s",$bam);
	echo "<br>";
	echo "<a href='Home.php'>Вход</a>";
	echo "</p>";
}
?>
</body>
</html>