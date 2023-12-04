<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="Best platform to reduce Unemployment through strong Education" />
	<meta name="author" content=" MY Company" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="E-Learning Platform" />
	<meta property="og:title" content="SAHAI : Let's Reduce Unemployment" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>SAHAI: Lets Reduce Unemployment</title>
	
<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/web/logo.png" />
	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	    <link href="vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <link href="vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">


    <!-- Material color picker -->
    <link href="vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
	
    <!-- Pick date -->
    <link rel="stylesheet" href="vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="vendor/pickadate/themes/default.date.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom Stylesheet -->
	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	
</head>
<body>
<?php
// Database connection details
include "conn.php";
$conn->query("SET GLOBAL max_allowed_packet = 67108864");

// Check if the employee_id is set in the URL
if (isset($_GET['Employee_id'])) {
    // Get the employee_id from the URL
    $employeeId = $_GET['Employee_id'];

    // Retrieve the employee's details from the database
    $sql = "SELECT * FROM Employee_credentials WHERE Employee_id = '$employeeId'";
    $result = $conn->query($sql);

    // Check if the employee record is found
    if ($result->num_rows > 0) {
        // Fetch the employee's details
        $row = $result->fetch_assoc();
        $employeeId = $row['Employee_id'];
        $employeename = $row['Employee_name'];
        $employeeEmail = $row['Employee_email'];
        $employeePhone = $row['Employee_phone_no'];
    } else {
        // Employee record not found, handle the error or redirect
        echo "Employee record not found";
        exit;
    }
} else {
    // employee_id parameter not set, handle the error or redirect
    echo "Employee ID not provided";
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $taskName = $_POST['taskName'];
    $description = $_POST['description'];
    $taskEndDate = $_POST['taskEndDate'];
    $additionalInformation = $_POST['additionalInformation'];

    // Validate form inputs
    if (empty($taskName) || empty($description) || empty($taskEndDate)) {
        // Required fields are missing
        echo "Please fill all the required fields.";
    } else {
        // Validate file upload (if provided)
        if (isset($_FILES['chooseFile']) && $_FILES['chooseFile']['error'] === UPLOAD_ERR_OK) {
            $file_tmp = $_FILES['chooseFile']['tmp_name'];
            $file_name = $_FILES['chooseFile']['name'];
            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

            // Read the file and convert it to binary data
            $file_data = file_get_contents($file_tmp);

            // Prepare the SQL statement to insert the form values into the table
            $insertSql = "INSERT INTO add_task (
                Task_id,
                Author_id,
                Author_name,
                Created_user_roles,
                Last_updated_by,
                last_user_roles,
                Task_name,
                Description,
                Person_id,
                Person_name,
                Task_end_date,
                File,
                File_extension,
                Additional_information,
                Task_pending_status,
                Create_status
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
            )";

            // Create a prepared statement
            $stmt = $conn->prepare($insertSql);
            $stmt->bind_param("ssssssssssssssss", $task_id, $author_id, $author_name, $created_user_roles, $last_updated_by, $last_user_roles, $taskName, $description, $employeeId, $employeename, $taskEndDate, $file_data, $file_extension, $additionalInformation, $task_pending_status, $create_status);

            // Generate a unique Task_id
            $task_id = uniqid('');
            $author_id = ''; // Modify as per your requirement
            $author_name = ''; // Modify as per your requirement
            $created_user_roles = ''; // Modify as per your requirement
            $last_updated_by = ''; // Modify as per your requirement
            $last_user_roles = ''; // Modify as per your requirement
            $task_pending_status = 0;
            $create_status = 0; // Modify as per your requirement

            // Execute the prepared statement
            if ($stmt->execute()) {
                // Data inserted successfully
                header("Location: pendingtask.php");
                exit();
            } else {
                // Error inserting data into the database
                header("Location: addemptask.php?error=DatabaseError");
                exit();
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            // File input not found or error occurred during upload
            $file_name = null;
        }
    }
}
?>



<div class="content-body">
    <div class="main-content container-fluid app-content">
        <div class="col-xl-12 col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Level</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Employee ID</label>
                                    <input type="text" class="form-control" value="<?php echo $employeeId; ?>" disabled>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" value="<?php echo $employeename; ?>" disabled>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Task Name</label>
                                    <input type="text" class="form-control" name="taskName" placeholder="Enter Task Name" required>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" placeholder="Enter Description" required></textarea>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Task End Date</label>
                                        <input type="text" class="datepicker-default form-control" name="taskEndDate" id="taskEndDate" required>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Choose File</label>
                                        <input type="file" class="form-control" name="chooseFile" required>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Additional Information</label>
                                        <textarea class="form-control" name="additionalInformation" placeholder="Enter Additional Information" required></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success"><span class="btn-icon-start text-success"><i class="fa fa-plus color-success"></i></span>Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



       <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed   by <a href="www.mycompany.org.in" target="_blank">MYCOMPANY</a> 2023</p>
            </div>
        </div>


	</div>
       


	</div>

    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="vendor/apexchart/apexchart.js"></script>

	<script src="vendor/bootstrap-datetimepicker/js/moment.js"></script>
	<script src="vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Dashboard 1 -->
	<script src="js/dashboard/dashboard-1.js"></script>
	
    <script src="js/custom.js"></script>
	<script src="js/dlabnav-init.js"></script>
	<script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
	<script>
		$(function () {
			$('#datetimepicker').datetimepicker({
				inline: true,
			});
		});
		
		$(document).ready(function(){
			$(".booking-calender .fa.fa-clock-o").removeClass(this);
			$(".booking-calender .fa.fa-clock-o").addClass('fa-clock');
		});
		
		
	</script>
    
	    <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="vendor/moment/moment.min.js"></script>
    <script src="vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- clockpicker -->
    <script src="vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <!-- asColorPicker -->
    <script src="vendor/jquery-asColor/jquery-asColor.min.js"></script>
    <script src="vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
    <script src="vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
    <!-- Material color picker -->
    <script src="vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- pickdate -->
    <script src="vendor/pickadate/picker.js"></script>
    <script src="vendor/pickadate/picker.time.js"></script>
    <script src="vendor/pickadate/picker.date.js"></script>
	    <script src="js/plugins-init/bs-daterange-picker-init.js"></script>
    <!-- Clockpicker init -->
    <script src="js/plugins-init/clock-picker-init.js"></script>
    <!-- asColorPicker init -->
    <script src="js/plugins-init/jquery-asColorPicker.init.js"></script>
    <!-- Material color picker init -->
    <script src="js/plugins-init/material-date-picker-init.js"></script>
    <!-- Pickdate -->
    <script src="js/plugins-init/pickadate-init.js"></script>

	<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	

</body>

</html>