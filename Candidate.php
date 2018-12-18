<!DOCTYPE html 5.0>
<html>
<head>
<link rel="import" href="nav.php">
<meta http-equiv="Content-type" content="text/html' charset=utf8">

<title> data </title>
</head>
<body>
<div w3-include-html="nav.php"></div> 
</br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password);
$database= mysqli_select_db($conn, 'dorothy');
$idFound=-1;
if(isset($_REQUEST["id"]))
    {
        $Id = urldecode($_REQUEST["id"]);
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
            "DateOfApplication");
        
        $i=0;
        $arr=array();
        for($i=0;$i<count($word);$i++)
        {
            $sql = "SELECT $word[$i] FROM candidates Where Id=$Id";
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
    $Sex = $arr[4];
    $DateOfBirth = $arr[5];
    $CV = $arr[6];
    $Resume = $arr[7];
    $Position = $arr[8];
    $AddedBy = $arr[9];
    if($arr[10]!=null)
    $DateOfApplication = $arr[10];
    else
    $DateOfApplication = "No information";
    $images = array("$Name".".jpg");
    // Loop through array to create image gallery
    foreach($images as $image){
        echo '<center>
        <div class="img-box">
            <img src="Files/' . $image . '" width="150" alt="' .  pathinfo($image, PATHINFO_FILENAME) .'">
        </div>
        </br>
        <label>NAME:</label>
        <label>'.$Name.'</label>
        </br>
        <label>Email:</label>
        <label>'.$Email.'</label>
        </br>
        <label>Phone Number:</label>
        <label>'.$PhoneNumber.'</label>
        </br>
        <label>Phone Number:</label>
        <label>'.$Sex.'</label>
        </br>
        <label>Date Of Birth:</label>
        <label>'.$DateOfBirth.'</label>
        </br>
        <label>Resume:</label>
        <label>'.$Resume.'</label>
        </br>
        <label>Position:</label>
        <label>'.$Position.'</label>
        </br>
        <label>AddedBy:</label>
        <label>'.$AddedBy.'</label>
        </br>
        <label>Date Of Application:</label>
        <label>'.$DateOfApplication.'</label>
        </br>
      </center>';
    }
    }
mysqli_close($conn);
?>
</body>
</html>