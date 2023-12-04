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
	
	<link rel="shortcut icon" type="image/png" href="images/web/logo.png" />
	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	    <link href="vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

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
<?php include "dashboard.php";?>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
						<div class="card text-white bg-primary">
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Schema ID</strong> </span>SA_0123456</li>
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Author ID</strong> </span>JS_01</li>
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Author ID</strong> </span>SA_01</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
						<div class="card text-white bg-primary">
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Request Author type</strong></span>Job Seeker</li>
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Date of Request Author Action</strong> </span>21/03/2022</li>
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Latest Update Time </strong></span>21/03/2022</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
						<div class="card text-white bg-primary">
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Accepted Author Type</strong></span>Super Admin</li>
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Date of Accept Author Action</strong> </span>21/03/2022</li>
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Times of Update</strong> </span>5</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">View form</h4>
							</div>
							<div class="card-body">
								<div class="basic-form">
									<form action="managesahaishare.html">
                                    <?php
// Assuming you have retrieved the selected Task_id from the previous page
$selected_task_id = $_GET['Task_id'];

// Retrieve the details of the selected task from the database
include "conn.php";

$sql = "SELECT * FROM add_task WHERE Task_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $selected_task_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $taskId = 'SA_TASK_' . str_pad($id, 2, '0', STR_PAD_LEFT);

    // Assign the retrieved values to variables
    $employeeId = $row['Person_id'];
    $employeename = $row['Person_name'];
    $taskName = $row['Task_name'];
    $description = $row['Description'];
    $taskEndDate = $row['Task_end_date'];
    $chooseFile = $row['File']; // Update to use the column name from the database
    $additionalInformation = $row['Additional_information']; // Update to use the column name from the database

    // HTML form to display the details
    echo '
<div class="row">
    <div class="mb-3 col-md-12">
        <label class="form-label">Employee ID</label>
        <input type="text" class="form-control" value="' . $employeeId . '" disabled>
    </div>
    <div class="mb-3 col-md-12">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" value="' . $employeename . '" disabled>
    </div>
    <div class="mb-3 col-md-12">
        <label class="form-label">Task ID</label>
        <input type="text" class="form-control" value="' . $taskId . '" disabled>
    </div>
    <div class="mb-3 col-md-12">
        <label class="form-label">Task Name</label>
        <input type="text" class="form-control" value="' . $taskName . '" disabled>
    </div>
    <div class="mb-3 col-md-12">
        <label class="form-label">Description</label>
        <textarea class="form-control" disabled>' . $description . '</textarea>
    </div>
    <div class="mb-3 col-md-12">
        <label class="form-label">Task End Date</label>
        <input type="text" class="form-control" value="' . $taskEndDate . '" disabled>
    </div>
    <div class="mb-3 col-md-12">
        <label class="form-label">Choose File</label>
        <div>
            Current File: <a type="button" class="btn btn-success" href="downloadfile.php?task_id=' . $selected_task_id . '">Download File</a>
        </div>
    </div>
    <div class="mb-3 col-md-12">
        <label class="form-label">Additional Information</label>
        <textarea class="form-control" disabled>' . $additionalInformation . '</textarea>
    </div>
</div>';

} else {
    echo "No task found with the selected ID.";
}

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();
?>

<br>
<button type="button" class="btn btn-danger" onclick="window.history.back()">Go back</button>

		<script>
			function toggleDateInputs() {
				var typeSelect = document.getElementById("codeTypeSelect");
				var fromDateInput = document.getElementById("fromDateInput");
				var toDateInput = document.getElementById("toDateInput");
		
				if (typeSelect.value === "showdate") {
					fromDateInput.disabled = false;
					toDateInput.disabled = false;
				} else {
					fromDateInput.disabled = true;
					toDateInput.disabled = true;
				}
			}
		
			function toggleUsageInput() {
				var typeSelect = document.getElementById("userTypeSelect");
				var usageInput = document.getElementById("usageInput");
		
				if (typeSelect.value === "enable") {
					usageInput.disabled = false;
					usageInput.style.opacity = "1";
				} else {
					usageInput.disabled = true;
					usageInput.style.opacity = "0.5";
				}
			}
		</script>
		
            
        <!--**********************************
            Content body end
        ***********************************-->
		
		
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed   by <a href="https://www.mycompany.org.in" target="_blank">MY Company</a> 2023</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->
			


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