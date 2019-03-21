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
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password);
$database= mysqli_select_db($conn, 'dorothy');
$idFound=-1;
$Id=0;
$prom;
if(isset($_REQUEST["id"]))
    {
        $GLOBALS['Id'] = urldecode($_REQUEST["id"]);
        $GLOBALS['prom']=$GLOBALS['Id'];
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
            "IsCandidate",
            "WorkPhoneNumber",
            "PersonalPhoneNumber",
            "PermanentAdress",
            "TemporaryAdress",
            "Department",
            "Code");
        
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
    $GLOBALS['Id'] = $arr[0];
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
    $PersPhone=$arr[12];
    $WorkPhone=$arr[13];
    $PerAdress=$arr[14];
    $TempAdress=$arr[15];
    $Dep=$arr[16];
    $CodeCode=$arr[17];
    $images = array("$Name".".jpg");
    $User= urldecode($_REQUEST["user"]);
    // Loop through array to create image gallery
    
    foreach($images as $image){
        echo '<center>
        <form action="Employee.php?user='.$User.'&isCandidate='.$IsCandidate.'" method="post" enctype="multipart/form-data">
        <input type="text" name = "InputId" value='.$GLOBALS["Id"].' hidden/>
        <input type="text" name = "NameZaDolu" value="'.$GLOBALS["Name"].'" hidden/>
        <input type="text" name = "EmailZaDolu" value="'.$GLOBALS["Name"].'" hidden/>
        <input type="text" name = "PNZaDolu" value="'.$GLOBALS["Name"].'" hidden/>
        <input type="text" name = "SexZaDolu" value="'.$GLOBALS["Name"].'" hidden/>
        <input type="text" name = "DoBZaDolu" value="'.$GLOBALS["Name"].'" hidden/>
        <input type="text" name = "ResumeZaDolu" value="'.$GLOBALS["Name"].'" hidden/>
        <input type="text" name = "PosZaDolu" value="'.$GLOBALS["Name"].'" hidden/>
        <div class="img-box">
            <img src="Files/' . $image . '" width="150" alt="' .  pathinfo($image, PATHINFO_FILENAME) .'">
        </div>
        </br>
        <label>Name:</label>
        <input type="text"  class="hidden" value="'.$GLOBALS["Name"].'" name="InputName"/>
        </br>
        <label>Email:</label>
        <input type="text"  class="hidden" value="'.$GLOBALS["Email"].'" name="InputEmail"/>
        </br>
        <label>Personal Phone:</label>
        <input type="text"  class="hidden" value="'.$GLOBALS["PersPhone"].'" name="PersPhoneInput"/>
        </br>
        <label>Work Phone:</label>
        <input type="text"  class="hidden" value="'.$GLOBALS["WorkPhone"].'" name="WorkPhoneInput"/>
        </br>
        <label>Permanent Adress:</label>
        <input type="text"  class="hidden" value="'.$GLOBALS["PerAdress"].'" name="PerAdressInput"/>
        </br>
        <label>Temporary Adress:</label>
        <input type="text"  class="hidden" value="'.$GLOBALS["TempAdress"].'" name="TempAdressInput"/>
        </br>
        <label>Sex:</label>
        <input type="text"  class="hidden" value="'.$GLOBALS["Sex"].'" name="InputSex"/>
        </br>
        <label>Date Of Birth:</label>
        <input type="text"  class="hidden" value="'.$GLOBALS["DateOfBirth"].'" name="InputDoB"/>
        </br>

        <label>Position:</label>
        <input type="text"  class="hidden" value="'.$GLOBALS["Position"].'" name="InputPos"/>
        </br>
        <label>Department:</label>
        <input type="text"  class="hidden" value="'.$GLOBALS["Dep"].'" name="DepInput"/>
        </br>
        <label>Code:</label>
        <input type="text"  class="hidden" value="'.$GLOBALS["CodeCode"].'" name="CodeInput"/>
        </br>
        <label>Resume:</label>
        <input type="text"  class="hidden" value="'.$GLOBALS["Resume"].'" name="InputResume"/>
        </br>
        <label>AddedBy:</label>
        <label>'.$AddedBy.'</label>
        </br>
        <label>Date Of Application:</label>
        <label>'.$DateOfApplication.'</label>
        </br>
        <input type="submit" name="Save" value="SaveMe" />
        </form>
      </center>';
      }
    }
    
    function Change()
    {
        $ChangeName = $_POST['InputName'];
        $ChangeId=$_POST['InputId'];
        $ChangeEmail = $_POST['InputEmail'];
        $ChangePersNumber = $_POST['PersPhoneInput'];
        $ChangeWorkNumber = $_POST['WorkPhoneInput'];
        $ChangePerAdress = $_POST['PerAdressInput'];
        $ChangeTempAdress = $_POST['TempAdressInput'];
        $ChangeDepartment = $_POST['DepInput'];
        $ChangeCode = $_POST['CodeInput'];
        if($_POST['InputSex']=="Мъж")
        $ChangeSex = 1;
        elseif ($_POST['InputSex']=="Жена") {
            $ChangeSex = 0;
        }
        else 
        {
            echo "Не може джендъри, има само два пола!" . $GLOBALS['conn']->error;
        }
        $ChangeDoB = $_POST['InputDoB'];
        $ChangeResume = $_POST['InputResume'];
        $ChangePos = $_POST['InputPos'];

        if(isset($_POST['TurnIt']))
        {
            $sql = "UPDATE Candidates SET Name='$ChangeName', Email='$ChangeEmail', Sex='$ChangeSex', DateOfBirth='$ChangeDoB', Resume='$ChangeResume', Position='$ChangePos', PersonalPhoneNumber='$ChangePersNumber', WorkPhoneNumber='$ChangeWorkNumber', PermanentAdress='$ChangePerAdress', TemporaryAdress='$ChangeTempAdress', Department='$ChangeDepartment', Code='$ChangeCode' WHERE id=$ChangeId";
            echo "good camila";
            if ($GLOBALS['conn']->query($sql) === FALSE) 
            {
                echo "Error updating record: " . $GLOBALS['conn']->error;
            }
        }
        else
        {
            $sql = "UPDATE Candidates SET Name='$ChangeName', Email='$ChangeEmail', PhoneNumber='$ChangePN', Sex='$ChangeSex', DateOfBirth='$ChangeDoB',
         Resume='$ChangeResume', Position='$ChangePos' WHERE id=$ChangeId";
            echo "good camila";
            if ($GLOBALS['conn']->query($sql) === FALSE) 
            {
                echo "Error updating record: " . $GLOBALS['conn']->error;
            }

        }
        $GLOBALS['Name']=$_POST['NameZaDolu'];
    }
    if(isset($_POST['Save']))
    {
        Change();
        //$ChangeName = $_POST['InputName'];
        //$NameZaSnimka = $_POST['NameZaDolu'];
        //rename("Files/".$NameZaSnimka.'.jpg', "Files/".$ChangeName.".jpg");
        //header($userche);
    }
mysqli_close($conn);
?>
</body>
</html>