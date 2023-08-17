<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        <?php include 'Leave_submit.css'; ?>
    </style>
    <title>Leave_Submit</title>
</head>

<body>

    <?php



    $con = mysqli_connect("localhost", "root", "");

    if (!$con) {
        die('Could not connect: ' . mysqli_connect_error());
    } else {
        echo "Success";
    }
    mysqli_select_db($con, "DBMS_DATABASE");


    ?>

    </div>

    <h1>WORKDAY</h1>

    <div id="mySidenav" class="sidenav">
        <a href="/WORKDAY_DBMS/frontend.html" id="about">Login</a>
        <a href="/WORKDAY_DBMS/news.html" id="blog">News</a>

    </div>

    <hr>

    <h2 class="Data_Update">Your leave has been successfully registered !</h2>

    <?php

    $datefrom = $_POST['date_from'];
    $dateto = $_POST['date_to'];
    $leavetype = $_POST['leave_type'];
    $assignedto = $_POST['staff_name'];
    $reason = $_POST['reason'];
    $staff_id = $_POST['staffID'];

    echo $leavetype;

    mysqli_select_db($con, "DBMS_DATABASE");
    $successful = mysqli_query($con, "INSERT INTO `leave_data`(`leave_from`, `leave_to`, `type_of_leave`, `assigned_to`, `reason`, `staff_id`) VALUES ('$datefrom','$dateto','$leavetype','$assignedto','$reason','$staff_id')");

    if (!$successful) {

        echo "Not Sucesss";

    } else {


        if ($leavetype == "Casual_leave") {
            $change_value = mysqli_query($con, "UPDATE `leave_info` SET `casual_leaves`=casual_leaves-1 ,`total_leaves`=total_leaves-1 WHERE '$staff_id'=staff_id AND `casual_leaves`!=0");
        } else if ($leavetype == "Medical_leave") {
            $change_value = mysqli_query($con, "UPDATE `leave_info` SET `medical_leaves`=medical_leaves-1 ,`total_leaves`=total_leaves-1 WHERE '$staff_id'=staff_id AND `medical_leaves`!=0");
        } else if ($leavetype == "Unpaid_leave") {
            $change_value = mysqli_query($con, "UPDATE `leave_info` SET `unpaid_leaves`=unpaid_leaves+1 ,`total_leaves`=total_leaves-1 WHERE '$staff_id'=staff_id");
        } else {
            header("Location: http://localhost/WORKDAY_DBMS/apply_for_leave.php/");
            exit();
        }


        if (!$change_value) {
            echo "Error";
        } else {

            $personal_details_leave_info = mysqli_query($con, "SELECT * FROM `leave_info`,`LOGIN` WHERE '$staff_id'=staff_id");
            $row_leave_info = mysqli_fetch_array($personal_details_leave_info);

            if ($row_leave_info) {



                echo "<div class=\"leave_card\">";
                echo "<h2 class=\"h2_leaveinfo\">Leave Info </h2>";


                echo "<table class=\"leave_table\" border=\"2\" style=\"width:90%\">";

                echo "<tr>";
                echo "<th>TOTAL LEAVES LEFT :	</th>";

                echo "<th style=\"width:80px\">" . $row_leave_info['total_leaves'] . "</th>";

                echo "<tr>";
                echo "<th>CASUAL LEAVES LEFT : 	</th>";
                echo "<th style=\"width:80px\">" . $row_leave_info['casual_leaves'] . "</th>";

                echo "<tr>";
                echo "<th>MEDICAL LEAVES LEFT :	</th>";
                echo "<th style=\"width:80px\">" . $row_leave_info['medical_leaves'] . "</th>";

                echo "<tr>";
                echo "<th>UNPAID LEAVES TAKEN :	</th>";
                echo "<th style=\"width:80px\">" . $row_leave_info['unpaid_leaves'] . "</th>";

                echo "</table>";


                echo "<div class=\"button_div\" name=\"Apply for leave\">";
                echo "<form action=\"http://localhost/WORKDAY_DBMS/Personal_Details.php/\">";
                echo "<button class=\"button_leave\">Back to Home</button>";
            } else {
                header("Location: http://localhost/WORKDAY_DBMS/apply_for_leave_wrong_staffid.php/");
                exit();
            }
        }
    }

    ?>

    </div>

</body>

</html>