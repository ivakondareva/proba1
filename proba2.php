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
echo "<input type='text'>";

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