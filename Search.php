<!DOCTYPE html 5.0>
<html>
<head>
<style>
p {
  text-align:center;
  font-size: 30px;
  font-weight: bold;
}
</style>
<link rel="import" href="nav.php">
<meta http-equiv="Content-type" content="text/html' charset=utf8">

<title> data </title>
</head>
<body>
<div w3-include-html="nav.php"></div> 
</br>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password);
$database= mysqli_select_db($conn, 'dorothy');
if (isset($_SESSION['username']) && isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
	$idFound=-1;
	$user=$_SESSION['username'];
	echo "<form action='Search.php' method='post' enctype='multipart/form-data'>
  		<select name='Type'>
        	<optgroup label='Изберете филтър на търсене'>
      		<option value='01'>Имена</option>
      		<option value='02'>Рождена дата</option>
  		</select> 
  		<input type='text' name='InputSearchInfo' placeholder='Въведете името или рождената дата на търсения'/>
  		<input type='submit' name='LetsSearch' value='Търсене' />
  		</form>";
	function SaveFunction()
	{
  		$searchedType=$_POST['Type'];
  		$searchedInfo=$_POST['InputSearchInfo'];
	 	$word=array(
	 		"Id",
		    "Name",
		    "Email",
		    "PhoneNumber",
		    "Sex",
		    "DateOfBirth");
	        $i=0;
	        $arr=array();
	        for($i=0;$i<6;$i++)
	        {
	            $sql = "SELECT $word[$i] FROM candidates ORDER BY Id";
	            $ind=0;
	            if (mysqli_multi_query($GLOBALS['conn'],$sql))
	            {
	                do
	                {
	                    if ($sql=mysqli_store_result($GLOBALS['conn']))
	                    {
	                        while ($row=mysqli_fetch_row($sql))
	                        {
	                        	$arr[$ind][$i]=$row[0];
	                            $ind++;
	                        }
                          	mysqli_free_result($sql);
	                    }
	              	}while (mysqli_more_results($GLOBALS['conn']) && mysqli_next_result($GLOBALS['conn']));
	            }
	        }
	        $flag=0;
	        for($j=0;$j<$ind;$j++)
	        {
	        	if($searchedType=='01')
	          	{
	          		if($arr[$j][1]==$searchedInfo)
		            {
		            	$tempId=$arr[$j][0];
		              	$tempFeat=$arr[$j][1];
		              	$userr=$GLOBALS['user'];
		              	echo "<a href='Candidate.php?user=$userr&id=$tempId' style='color: RGB(103,117,124)'> $tempFeat</a>";
		              	echo "</br>";		              
		              	$flag=1;
		            }
		        }
		        else
	          	if($searchedType=='02')
	          	{
	            	if($arr[$j][5]==$searchedInfo)
	            	{
	            		$tempId=$arr[$j][0];
	              		$tempFeat=$arr[$j][1];
	              		$userr=$GLOBALS['user'];
	              		echo "<a href='Candidate.php?user=$userr&id=$tempId' style='color: RGB(103,117,124)'> $tempFeat</a>";
	            		echo "</br>";
	              		$flag=1;
	            	}
	          	}
	          	else
	          	{
	            	$int='No matching';
	            	printf("%s",$int);
	            	echo "</br>";
	          	}
	        }
	        if($flag==0)
	        {
	            $int='No matching';
	            printf("%s",$int);
	            echo "</br>";
	        }
	}
	if(isset($_POST['LetsSearch']))
	{
  		SaveFunction();
	}
	mysqli_close($conn);
}
else
{
	echo "<p>";
  	$bam="За да видите тази страница, моля, влезте в профила си!";
  	printf("%s",$bam);
  	echo "<br>";
  	echo "<a href='Home.php'>Вход</a>";
  	secho "</p>";
}
?>
</body>
</html>