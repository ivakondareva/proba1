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
	</br>
	<input type='text' name='InputEmail'/>
	</br>
	<input type='text' name='InputPhone'/>
	</br>
	
	<input type='radio' name='Sex' value='1'/>Мъж
	<input type='radio' name='Sex' value='0'/>Жена
	</br>
	<input type='text' name='Day'/>
	<select name='Month'>
  		<option value='01'>Януари</option>
  		<option value='02'>Февруари</option>
  		<option value='03'>Март</option>
  		<option value='04'>Април</option>
  		<option value='05'>Май</option>
  		<option value='06'>Юни</option>
  		<option value='07'>Юли</option>
  		<option value='08'>Август</option>
  		<option value='09'>Септември</option>
  		<option value='10'>Октомври</option>
 		<option value='11'>Ноември</option>
  		<option value='12'>Декември</option>
	</select> 
	<input type='text' name='Year'/>
	</br>
	<textarea name='Resume' >
	</textarea>
	</br>
	<input type='text' name='Position'/>
	</br>
	<input type='submit' name='Save' value='SaveMe' />
</form>";

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

if(isset($_POST['InputName']))
{
	$InputName = $_POST['InputName'];
	$InputEmail = $_POST['InputEmail'];
	$InputPhone = $_POST['InputPhone'];
	$InputSex = $_POST['Sex'];
	$InputDay = $_POST['Day'];
	$InputMonth = $_POST['Month'];
	$InputYear= $_POST['Year'];
	$InputResume= $_POST['Resume'];
	$InputPosition= $_POST['Position'];

}
if(isset($_POST['Save']))
    {
        func();
    }
    function func()
    {
    	$NameTaken=$GLOBALS['InputName'];
    	$EmailTaken=$GLOBALS['InputEmail'];
    	$PhoneTaken=$GLOBALS['InputPhone'];
    	$SexTaken=$GLOBALS['InputSex'];
    	
    	$DayTaken=(string)$GLOBALS['InputDay'];
    	$MonthTaken=(string)$GLOBALS['InputMonth'];
    	$YearTaken=(string)$GLOBALS['InputYear'];
    	$tire='-';
    	$BirthTaken=$YearTaken.$tire.$MonthTaken.$tire.$DayTaken;
    	$BirthTaken=strtotime($BirthTaken);
    	$BirthTaken=date('Y-m-d',$BirthTaken);

    	$ResumeTaken=$GLOBALS['InputResume'];

    	$PositionTaken=$GLOBALS['InputPosition'];
    	//+'-'+(string)$GLOBALS['InputMonth']+'-'+(string)$GLOBALS['InputYear'];
    	/*echo $NameTaken;
    	global $vare;
    	echo $vare;
    	$vare++;
    	echo $vare;
    	*/
    		$sql = "INSERT INTO candidates (Name, PhoneNumber, Email, Sex , DateOfBirth, Resume, Position)
			VALUES ('$NameTaken', '$EmailTaken', '$PhoneTaken','$SexTaken','$BirthTaken', '$ResumeTaken', '$PositionTaken')";
			if($GLOBALS['conn'] -> query($sql)==TRUE)
			{

    			//header("refresh:0;");
    			//GLOBALS['var']=1;
    			/*$_POST = array();
    			$GLOBALS['InputName']="--";
    			global $flag=1;
    			*/
    			/*$sql1 = "UPDATE flags SET lamp='1' WHERE id=1";

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