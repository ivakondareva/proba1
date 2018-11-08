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
<input type='submit' name='Insert' value='Insert Person' />
<input type='text' name='InputName'>
</form>";
if(isset($_POST['InputName'])){
$InputName = $_POST['InputName']; 
}
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['InputName']))
{
    func();
}
function func()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password);
    $database= mysqli_select_db($conn, 'dorothy');
    
    $shiban = $GLOBALS['InputName'];
        $sql = "INSERT INTO candidates (Name, PhoneNumber, Email, DateOfBirth, Resume, Position)
        VALUES ('$shiban', '01387410', 'alabala', '1987-05-02', 'alaaa', 'balaa')";
        if($conn -> query($sql)==TRUE)
        {
            echo "NEW RECORD";
        }
        else 
        {
            echo "NE" .$sql."<br>".$conn->error;
        }
       $_SET['InputName'] = null;
}

mysqli_close($conn);
?>
</body>
</html>
