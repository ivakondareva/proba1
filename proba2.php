<!DOCTYPE html 5.0>
<html>
<head>
<link rel="import" href="nav.php">
<meta http-equiv="Content-type" content="text/html' charset=utf8">

<title> data </title>
</head>
<body>
<div w3-include-html="nav.php"></div> 
<style>
input.dotted {border-style: dotted;}
input.dashed {border-style: dashed;}
input.solid {border-style: solid;}
input.double {border-style: double;}
input.groove {border-style: groove;}
input.ridge {border-style: ridge;}
input.inset {border-style: inset;}
input.outset {border-style: outset;}
input.none {border-style: none;}
input.hidden {border-style: hidden;}
input.mix {border-style: dotted dashed solid double;}
</style>
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
echo "<form action='proba2.php' method='post' enctype='multipart/form-data'>
  <input type='text' name='InputName' placeholder='Име'/>
  </br>
  <input type='text' name='InputEmail' placeholder='Имейл'/>
  </br>
  <input type='text' class='hidden' name='InputPhone' placeholder='Телефон'/>
  </br>
  
  <input type='radio' name='Sex' value='1'/>Мъж
  <input type='radio' name='Sex' value='0'/>Жена
  </br>
  <input type='text' name='Day' placeholder='Ден'/>
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
  <input type='text' name='Year' placeholder='Година'/>
  </br>
  <textarea name='Resume' placeholder='Резюме'></textarea>
  </br>
  <input type='text' name='Position' placeholder='Позиция'/>
    </br>
    <input type='file' name='image' />
    </br>
  <input type='submit' name='Save' value='SaveMe' />
</form>";
$images = array("Ivkan.docx");
// Loop through array to create image gallery
foreach($images as $image){
  echo '<div class="img-box">';
    echo '<img src="Files/' . $image . '" width="300" alt="' .  pathinfo($image, PATHINFO_FILENAME) .'">';
    echo '<p><a href="download.php?file=' . $image . '">Download</a></p>';
  echo '</div>';
}
 if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $tmp = explode('.',$_FILES['image']['name']);
        $file_ext=strtolower(end($tmp));
        
        if($file_size > 2097152){
           $errors[]='File size must be excatly 2 MB';
        }
        
        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"Files/".$_POST['InputName'].".".$file_ext);
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
  $InputAddedBy= $_SESSION['username'];
  $InputDateOfApplication= date("Y/m/d");
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
      $tire='/';
      $BirthTaken=$DayTaken.$tire.$MonthTaken.$tire.$YearTaken;
      $BirthTaken=strtotime($BirthTaken);
      $BirthTaken=date('d/m/Y',$BirthTaken);
      $ResumeTaken=$GLOBALS['InputResume'];
      $PositionTaken=$GLOBALS['InputPosition'];
      $NowAddedBy=$GLOBALS['InputAddedBy'];
      $DateOfApplication = $GLOBALS['InputDateOfApplication'];
        $sql = "INSERT INTO candidates (Name, Email, PhoneNumber, Sex , DateOfBirth, Resume, Position, AddedBy, DateOfApplication)
      VALUES ('$NameTaken', '$EmailTaken', '$PhoneTaken','$SexTaken','$BirthTaken', '$ResumeTaken', '$PositionTaken','$NowAddedBy', '$DateOfApplication')";
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
if(isset($_POST['Save']))
    {
        func();
        $userche='location:proba2.php?user='.$_SESSION['username'];
        header($userche);
    }
    
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