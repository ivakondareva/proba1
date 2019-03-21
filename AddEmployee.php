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
  echo "<form action='AddEmployee.php' method='post' enctype='multipart/form-data'>
        <input type='text' name='InputName' placeholder='Име'/>
        </br>
        <input type='text' name='InputEmail' placeholder='Имейл'/>
        </br>
        <input type='text' name='InputWorkPhone' placeholder='Служебен телефон'/>
        </br>
        <input type='text' name='InputPersonalPhone' placeholder='Личен телефон'/>
        </br>
        <input type='text' name='Position' placeholder='Длъжност'/>
        </br>
        <input type='text' name='PeprmanentAdress' placeholder='Постоянен адрес'/>
        </br>
        <input type='text' name='TemporaryAdress' placeholder='Настоящ адрес'/>
        </br>
        <input type='radio' name='Sex' value='1'/>Мъж
        <input type='radio' name='Sex' value='0'/>Жена
        </br>
        </select> 
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
        <input type='text' name='Code' placeholder='КОД по НКПД'/>
        </br>
        <input type='text' name='Department' placeholder='Отдел'/>
        </br>
        <textarea name='Resume' placeholder='Резюме'></textarea>
        </br>
        <input type='file' name='image' />
        </br>
        <input type='submit' name='Save' value='SaveMe' />
        </form>";
  if(isset($_POST['InputName']))
  {
      $InputIsCandidate = 0;//=1 bachka
      $InputName = $_POST['InputName'];
      $InputEmail = $_POST['InputEmail'];
      $InputWorkPhone = $_POST['InputWorkPhone'];
      $InputPersonalPhone = $_POST['InputPersonalPhone'];
      $InputPermanentAdress = $_POST['PeprmanentAdress'];
      $InputTemporaryAdress = $_POST['TemporaryAdress'];
      $InputSex = $_POST['Sex'];
      $InputDay = $_POST['Day'];
      $InputMonth = $_POST['Month'];
      $InputYear= $_POST['Year'];
      $InputCode = $_POST['Code'];
      $InputResume= $_POST['Resume'];
      $InputDepartment = $_POST['Department'];
      $InputPosition= $_POST['Position'];
      $InputAddedBy= $_SESSION['username'];
      $InputDateOfApplication= date("Y/m/d");
    }

    function SaveFunction()
    {
        $ResumeTaken=$GLOBALS['InputResume'];
        $IsCandidateTaken=$GLOBALS['InputIsCandidate'];
        $NameTaken=$GLOBALS['InputName'];
        $EmailTaken=$GLOBALS['InputEmail'];
        $WorkPhoneTaken=$GLOBALS['InputWorkPhone'];
        $PersonalPhoneTaken=$GLOBALS['InputPersonalPhone'];
        $PermanentAdressTaken=$GLOBALS['InputPermanentAdress'];
        $TemporaryAdressTaken=$GLOBALS['InputTemporaryAdress'];
        $SexTaken=$GLOBALS['InputSex'];
        $CodeTaken=$GLOBALS['InputCode'];
        $DepartmentTaken=$GLOBALS['InputDepartment'];
        $DayTaken=(string)$GLOBALS['InputDay'];
        $MonthTaken=(string)$GLOBALS['InputMonth'];
        $YearTaken=(string)$GLOBALS['InputYear'];
        $tire='/';
        $BirthTaken=$DayTaken.$tire.$MonthTaken.$tire.$YearTaken;
        $BirthTaken=strtotime($BirthTaken);
        $BirthTaken=date('d/m/Y',$BirthTaken);
        $PositionTaken=$GLOBALS['InputPosition'];
        $NowAddedBy=$GLOBALS['InputAddedBy'];
        $DateOfApplication = $GLOBALS['InputDateOfApplication'];
        $sql = "INSERT INTO candidates (IsCandidate, DateOfApplication, PhoneNumber, Name, Email, Sex , DateOfBirth, Resume, Position, AddedBy, WorkPhoneNumber, PersonalPhoneNumber, PermanentAdress, TemporaryAdress, Department, Code)
        VALUES ('$IsCandidateTaken','$DateOfApplication', '$PersonalPhoneTaken', '$NameTaken', '$EmailTaken', '$SexTaken','$BirthTaken', '$ResumeTaken', '$PositionTaken','$NowAddedBy','$WorkPhoneTaken', '$PersonalPhoneTaken', '$PermanentAdressTaken', '$TemporaryAdressTaken', '$DepartmentTaken', '$CodeTaken')";
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
        SaveFunction();
        $userche='location:AddEmployee.php?user='.$_SESSION['username'];
        header($userche);
    }
}
?>
</body>
</html> 