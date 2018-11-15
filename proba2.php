<!DOCTYPE html 5.0>
<html>
<head>
<meta http-equiv="Content-type" content="text/html' charset=utf8">
<title> data </title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password);
$database= mysqli_select_db($conn, 'dorothy');
echo "<form action='proba2.php' method='post'>
	<input type='submit' name='Save' value='SaveMe' />
	<input type='text' name='InputName'/>
</form>";

if(isset($_POST['InputName']))
{
	$InputName = $_POST['InputName']; 
}
if(isset($_POST['Save']))
    {
        func();
    }
    function func()
    {
    	$NameTaken=$GLOBALS['InputName'];
    	/*echo $NameTaken;
    	global $vare;
    	echo $vare;
    	$vare++;
    	echo $vare;
    	*/
    		$sql = "INSERT INTO candidates (Name, PhoneNumber, Email, DateOfBirth, Resume, Position)
			VALUES ('$NameTaken', '01387410', 'alabala', '1987-05-02', 'alaaa', 'balaa')";
			if($GLOBALS['conn'] -> query($sql)==TRUE)
			{
    			//GLOBALS['var']=1;
    			/*$_POST = array();
    			$GLOBALS['InputName']="--";
    			global $flag=1;
    			*/
    			/*$sql1 = "UPDATE flags SET lamp='1' WHERE id=1";

				if ($conn->query($sql) === TRUE) {
   				 echo "Record updated successfully";
				} else {
    			echo "Error updating record: " . $conn->error;
				}
				Trqbva da se dobavi zapis v lamp
				Trqbva da se updeitne flag = 1 i ako e 1 sled refresha da izpishe NEW Record
				*/

    			//echo $GLOBALS['InputName'];
			}
			else 
			{
    			echo "NE" .$sql."<br>".$conn->error;
			} 
    }
/*$sql = "INSERT INTO candidates (Name, PhoneNumber, Email, DateOfBirth, Resume, Position)
VALUES ('John Dimitrov', '01387410', 'alabala', '1987-05-02', 'alaaa', 'balaa')";
if($conn -> query($sql)==TRUE)
{
    echo "NEW RECORD";
}
else 
{
    echo "NE" .$sql."<br>".$conn->error;
}*/
mysqli_close($conn);
?>
</body>
</html>