<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admininfo.css">
    <title>Admin</title>
</head>
<body>


<?php


$con = mysqli_connect("localhost","root",""); 

if (!$con)
{
die('Could not connect: ' . mysqli_connect_error()); 
}else{
    echo "Success";
}
mysqli_select_db($con,"DBMS_DATABASE");
?>
 <h1>WORKDAY</h1>
    
    <div id="mySidenav" class="sidenav">
        <a href="/WORKDAY_DBMS/Welcome.html" id="about">Home</a>
        <a href="/WORKDAY_DBMS/news.html" id="blog">News</a>
        
      </div>

      <hr>  

      <?php
        echo "<div class=\"card\">";
        echo "<h2 class=\"h2_leaveinfo\">Staff Leave Info</h2>";

        //$staff_id=$row['user_name'];
       
        mysqli_select_db($con,"DBMS_DATABASE");
        $leave_details = mysqli_query($con,"SELECT * FROM `leave_data` WHERE `leave_from`>=CURRENT_DATE();");
    


       echo "<table class=\"Personal_Details_table\" border=\"2\" style=\"width:90%\">";
           
       

                echo"<tr>";
                echo"<th>Staff ID</th>";
                echo"<th>Leave from</th>";
                echo"<th>Leave to</th>";
                echo"<th>Type of leave</th>";
                echo"<th>Assigned to</th>";
                echo"<th>reason</th>";

                while($leave = mysqli_fetch_array($leave_details))
                {
                echo"<tr>";
                echo"<th>".$leave['staff_id']."</th>"; 
                echo"<th>".$leave['leave_from']."</th>";
                echo"<th>".$leave['leave_to']."</th>";
                echo"<th>".$leave['type_of_leave']."</th>";
                echo"<th>".$leave['assigned_to']."</th>";
                echo"<th>".$leave['reason']."</th>";
                }
    
          
            echo"</table>";
            
        echo "<button class=\"printbutton\" onclick=\"window.print()\">Print/Save</button>";
        



         ?>





    
</body>
</html>