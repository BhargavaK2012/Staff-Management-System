<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <style>
    <?php include 'apply_for_leave.css'; ?>
    </style>



    <title>Personal Details</title>

    
</head>

<body>

    <h1>WORKDAY</h1>
    
    <div id="mySidenav" class="sidenav">
        <a href="/WORKDAY_DBMS/frontend.html" id="about">Back</a>
    
      </div>
  

      <hr>

    <form action="http://localhost/WORKDAY_DBMS/Leave_submit.php/" method="post">
      <div class="card">

      <div>
          <h2>Please enter your staff ID :</h2>
          <input type="text" name="staffID" style="width:500px" required>

        </div>

        <div>
          <h2>Leave From : </h2>
          <input type="date" name="date_from" style="width:500px" required>

        </div>

        <div>
          <h2>Leave To : </h2>
          <input type="date" name="date_to" style="width:500px" required>

        </div>

        <div>
          <h2>Type of Leave :</h2>

          
          <select name="leave_type" class="leave_type" placeholder="Select" required>
            <option value="Casual_leave">Casual leave</option>
            <option value="Medical_leave">Medical leave</option>
            <option value="Unpaid_leave">Unpaid leave</option>
            
          </select>
        </div>

        <div>
          <h2>Assigned to :</h2>

          <select name="staff_name" class="leave_type" required>
            <option value="Not Applicable">Not Applicable</option>
            <option value="Dr. JYOTHI SHETTY	">Dr. JYOTHI SHETTY	</option>
            <option value="Dr. D K SREEKANTHA	">Dr. D K SREEKANTHA	</option>
            <option value="Dr. VENKATRAMANA BHAT P">Dr. VENKATRAMANA BHAT P</option>
            <option value="Dr. VENUGOPALA P S">Dr. VENUGOPALA P S</option>
            <option value="Dr. ARAVIND C V">Dr. ARAVIND C V</option>
            <option value="Dr. SARIKA HEGDE">Dr. SARIKA HEGDE</option>
            <option value="Dr. ROSHAN FERNANDES">Dr. ROSHAN FERNANDES</option>
            <option value="Dr.SUDEEPA K B">Dr.SUDEEPA K B</option>
            <option value="Dr. RADHAKRISHNA">Dr. RADHAKRISHNA</option>
            <option value="Dr. RAJU K">Dr. RAJU K</option>
            <option value="Dr. ANISHA P RODRIGUES">Dr. ANISHA P RODRIGUES</option>
            <option value="Dr. PRADEEP KANCHAN">Dr. PRADEEP KANCHAN</option>
          </select>
        </div>

        <div>
          <h2>Reason :</h2>
          <input type="text" name="reason" class="Reason_Text_Box" required>

        </div>

        <div>
          <button class="Submit">Submit</button>
        </div>

       </div>
</form>


</body>
</html>