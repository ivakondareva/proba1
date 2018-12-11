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
        echo"$Id";
        $word=array(
            "Id",
            "Name",
            "Email",
            "PhoneNumber",);
        
        $i=0;
        $arr=array();
        for($i=0;$i<4;$i++)
        {
            $sql = "SELECT $word[$i] FROM candidates ORDER BY Name";
            //$sqlphone .= "SELECT id FROM candidates";
            
            $ind=0;
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
                            
                               $arr[$ind][$i]=$row[0];
                               if($row[0]==$Id){$idFound=$ind;break;}
                               $ind++;
                            //printf("%s</br>",$row[0]);
                        }
                       
                          mysqli_free_result($sql);
                      }
                }
                  while (mysqli_more_results($conn) && mysqli_next_result($conn));
            }
        }
        
        "</br>";
        $tempId=$arr[$idFound][0];
        echo "<table>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>";
            echo "<tr>";
            for($i=1;$i<4;$i++)
            {
                echo "<td>";
                echo "<center>";
                $tempFeat=$arr[$idFound][$i];
                if($i==1)
                {echo "<a href='Candidate.php?id=$tempId' style='color: RGB(103,117,124)'> $tempFeat
                </a>";}
                else printf("%s</br>",$tempFeat);
                echo "</td>";
            }
            echo "</tr>";
        echo "</table>";
        
    }




mysqli_close($conn);
?>
</body>
</html>
