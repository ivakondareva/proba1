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

echo "<form action='Search.php' method='post' enctype='multipart/form-data'>
  <select name='Type'>
      <option value='01'>Imena</option>
      <option value='02'>Rojdena data</option>
  </select> 
  <input type='text' name='InputSearchInfo' placeholder='Vuvedi kogo tursish'/>
  <input type='submit' name='LetsSearch' value='SearchCandidate' />
  </form>
  ";
	
function func()
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
            //$sqlphone .= "SELECT id FROM candidates";
            
            $ind=0;
            // Execute multi query
            if (mysqli_multi_query($GLOBALS['conn'],$sql))
            {
                  do
                {
                    // Store first result set
                    if ($sql=mysqli_store_result($GLOBALS['conn']))
                      {
                          while ($row=mysqli_fetch_row($sql))
                        {
                            
                               $arr[$ind][$i]=$row[0];
                               //if($row[0]==$Id){$idFound=$ind;break;}
                               $ind++;
                            //printf("%s</br>",$row[0]);
                        }
                       
                          mysqli_free_result($sql);
                      }
                }
                  while (mysqli_more_results($GLOBALS['conn']) && mysqli_next_result($GLOBALS['conn']));
            }
        }
        $flag=0;
        for($j=0;$j<$ind;$j++)
        {
        	if($searchedType=='01')
        	{
        		//imena
        		if($arr[$j][1]==$searchedInfo)
        		{
        			$tempId=$j+1;
        			$tempFeat=$arr[$j][1];
        			echo "<a href='Candidate.php?id=$tempId' style='color: RGB(103,117,124)'> $tempFeat</a>";
        			echo "</br>";
        			$flag=1;
        		}
        	}
        	else
        	if($searchedType=='02')
        	{

        		if($arr[$j][5]==$searchedInfo)
        		{
        			$tempId=$j+1;
        			$tempFeat=$arr[$j][1];
        			echo "<a href='Candidate.php?id=$tempId' style='color: RGB(103,117,124)'> $tempFeat</a>";
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
	func();
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
  echo "</p>";
}
?>
</body>
</html>
