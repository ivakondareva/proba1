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
$flag=-1;
if(isset($_REQUEST["id"]))
    {
        $Id = $_REQUEST["id"];
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
                            
                               $arr[$i][$ind]=$row[0];
                               if($row[0]==$Id) $flag=$ind;
                               $ind++;
                            //printf("%s</br>",$row[0]);
                        }
                       
                          mysqli_free_result($sql);
                      }
                }
                  while (mysqli_more_results($conn) && mysqli_next_result($conn));
            }
        }
        $j=0;
        "</br>";
        echo "<table>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>";
            echo "<tr>";
            for($i=1;$i<4;$i++)
            {
                echo "<td>";
                echo "<center>";
                $temp=$arr[0][$j];
                $tempname=$arr[$i][$flag];
                if($i==1)
                {echo "<a href='Candidate.php?id=$temp' style='color: RGB(103,117,124)'> $tempname
                </a>";}
                else printf("%s</br>",$arr[$i][$flag]);
                echo "</td>";
            }
            echo "</tr>";
        echo "</table>";
        
    }




mysqli_close($conn);
?>
</body>
</html>