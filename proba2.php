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
	<input type='text' name='InputName'/>
	<input type='submit' name='Save' value='SaveMe' />
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
    			
			}
			else 
			{
    			echo "NE" .$sql."<br>".$conn->error;
			} 
    }




    //NOVA CHAST
    echo 
    "<form action='' method='POST' enctype='multipart/form-data'>
    <input type='file' name='image' />
    <input type='submit'/>
 </form>";
    if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $tmp = explode('.',$_FILES['image']['name']);
        $file_ext=strtolower(end($tmp));
        
        /*$expensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$expensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }*/
        
        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"Files/".$file_name);
           echo "Success";
        }else{
           print_r($errors);
        }
     }
mysqli_close($conn);
?>
</body>
</html>
