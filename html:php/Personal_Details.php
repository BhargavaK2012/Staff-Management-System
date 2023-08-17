<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style><?php include 'personal_details_css.css'; ?></style>
    <title>Personal Details</title>
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
        <a href="/WORKDAY_DBMS/frontend.html" id="about">Login</a>
        <a href="/WORKDAY_DBMS/news.html" id="blog">News</a>
        
      </div>

      <hr>  

<?php

$user = $_POST['uname'];
$pass = $_POST['password'];

echo $user;
echo $pass;

if($user=="admin" && $pass=="admin")
{
    header("Location: http://localhost/WORKDAY_DBMS/admin_info.php");
    exit();
    
}

mysqli_select_db($con,"DBMS_DATABASE");
$success = mysqli_query($con,"SELECT * FROM `Login` WHERE '$user'=user_name AND '$pass'=pass_word ");

if(!($row=mysqli_fetch_array($success)))
{


        
    header("Location: http://localhost/WORKDAY_DBMS/frontend_wrongpassword.html");
    exit();
 
}else{

        echo "<div class=\"card\">";
        echo "<h2 class=\"h2_leaveinfo\">Personal Details</h2>";

        $staff_id=$row['user_name'];
       
        mysqli_select_db($con,"DBMS_DATABASE");
        $personal_details_staff = mysqli_query($con,"SELECT * FROM `personal_details`,`LOGIN` WHERE '$staff_id'= s_id ");
        $row_staff = mysqli_fetch_array($personal_details_staff);




       echo "<table class=\"Personal_Details_table\" border=\"2\" style=\"width:90%\">";
           
                echo"<tr>";
                echo"<th>Name :</th>";
                echo"<th>".$row_staff['s_name']."</th>";

                echo"<tr>";
                echo"<th>Staff ID  :</th>";
                echo"<th>".$row_staff['s_id']."</th>";

                echo"<tr>";
                echo"<th>Contact :</th>";
                echo"<th>".$row_staff['contact']."</th>";

                echo"<tr>";
                echo"<th>Department Name :</th>";
                echo"<th>".$row_staff['department_name']."</th>";

                echo"<tr>";
                echo"<th>Email ID :</th>";
                echo"<th>".$row_staff['email_id']."</th>";

                echo"<tr>";
                echo"<th>Address :</th>";
                echo"<th>".$row_staff['address']."</th>";
                
        
    
          
            echo"</table>";

         ?>
         <hr>
      </div>

    <?php


        $personal_details_leave_info = mysqli_query($con,"SELECT * FROM `leave_info`,`LOGIN` WHERE '$staff_id'=staff_id");
        $row_leave_info = mysqli_fetch_array($personal_details_leave_info);
        ?>


    <div class="leave_card">
    <h2 class="h2_leaveinfo">Leave Info</h2>

    <?php

    echo"<table class=\"leave_table\" border=\"2\" style=\"width:90%\">"; 
       
            echo"<tr>";
            echo"<th>TOTAL LEAVES LEFT :	</th>";
            echo"<th style=\"width:80px\">".$row_leave_info['total_leaves']."</th>";

            echo"<tr>";
            echo"<th>CASUAL LEAVES LEFT : 	</th>";
            echo"<th style=\"width:80px\">".$row_leave_info['casual_leaves']."</th>";

            echo"<tr>";
            echo"<th>MEDICAL LEAVES LEFT :	</th>";
            echo"<th style=\"width:80px\">".$row_leave_info['medical_leaves']."</th>";

            echo"<tr>";
            echo"<th>UNPAID LEAVES TAKEN :	</th>";
            echo"<th style=\"width:80px\">".$row_leave_info['unpaid_leaves']."</th>";
            
      
            
        echo"</table>";

        if($row_leave_info['casual_leaves']==0)
        {
            echo "<h2 class=\"Leave_Warning\">WARNING ! You cannot apply for anymore casual leaves !<h2>";
        }
        if($row_leave_info['medical_leaves']==0)
        {
            echo "<h2 class=\"Leave_Warning\">WARNING ! You cannot apply for anymore medical leaves !<h2>";
        }
      
        


        echo "<div class=\"button_div\" name=\"Apply for leave\">";
        echo "<form action=\"http://localhost/WORKDAY_DBMS/apply_for_leave.php/\">";
        echo "<button class=\"button_leave\">Apply for Leave</button>";
        echo "</form>";
        echo "<button class=\"printbutton\" onclick=\"window.print()\">Print/Save</button>";
        





}
        ?>



</div>







</body>
</html>

