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
$Id
if (isset($_SESSION['username']) && isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
  $GLOBALS['Id']=urldecode($_REQUEST['id']);
  $word=array(
            "Id",
            "Name",
            "Email",
            "PhoneNumber",
            "Sex",
            "DateOfBirth",
            "CV",
            "Resume",
            "Position",
            "AddedBy",
            "DateOfApplication",
            "IsCandidate");
        
        $i=0;
        $arr=array();
        for($i=0;$i<count($word);$i++)
        {
            $NqkvoId = $GLOBALS['Id'];
            $sql = "SELECT $word[$i] FROM candidates Where Id=$NqkvoId";
            //$sqlphone .= "SELECT id FROM candidates";
            
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
                            
                               $arr[$i]=$row[0];
                               
                            //printf("%s</br>",$row[0]);
                        }
                       
                          mysqli_free_result($sql);
                      }
                }
                  while (mysqli_more_results($conn) && mysqli_next_result($conn));
            }
        }
        
        "</br>";
    /*    $tempId=$arr[0];
        echo "<table>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>";
            echo "<tr>";
            for($i=1;$i<10;$i++)
            {
                echo "<td>";
                echo "<center>";
                $tempFeat=$arr[$i];
                if($i==1)
                {echo "<a href='Candidate.php?id=$tempId' style='color: RGB(103,117,124)'> $tempFeat
                </a>";}
                else printf("%s</br>",$tempFeat);
                echo "</td>";
            }
            echo "</tr>";
        echo "</table>";
    */    
    $Id = $arr[0];
    $Name = $arr[1];
    $Email = $arr[2];
    $PhoneNumber = $arr[3];
    if($arr[4]==1) $Sex="Мъж";
    else $Sex="Жена";
    $DateOfBirth = $arr[5];
    $CV = $arr[6];
    $Resume = $arr[7];
    $Position = $arr[8];
    $AddedBy = $arr[9];
    if(isset($arr[10])==1)
    $DateOfApplication = $arr[10];
    else
    $DateOfApplication = "No information";
    $IsCandidate=$arr[11];
    $User= urldecode($_REQUEST["user"]);
}
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
if(isset($_REQUEST['id']))
{

}
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
function func()
    {
      $ChangeId=$_REQUEST['id'];
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
      $ResumeTaken=$GLOBALS['InputResume'];
      $PositionTaken=$GLOBALS['InputPosition'];
      $NowAddedBy=$GLOBALS['InputAddedBy'];
      $DateOfApplication = $GLOBALS['InputDateOfApplication'];
        $sql = "UPDATE Candidates SET Name='$NameTaken', Email='$EmailTaken', WorkPhoneNumber='$WorkPhoneTaken', PersonalPhoneNumber='PersonalPhoneTaken', PermanentAdress='$PermanentAdressTaken', TemporaryAdress='$TemporaryAdressTaken', Code='CodeTaken', Department='DepartmentTaken', Sex='$SexTaken', DateOfBirth='$BirthTaken',Resume='$ResumeTaken', Position='$PositionTaken', IsCandidate='$IsCandidateTaken' WHERE id=$ChangeId";
        echo "good camila";
        if ($GLOBALS['conn']->query($sql) === FALSE) 
        {
            echo "Error updating record: " . $GLOBALS['conn']->error;
        }
    }
if(isset($_POST['Save']))
    {
        func();
        $userche='location:AddEmployees.php?user='.$_SESSION['username'];
        header($userche);
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