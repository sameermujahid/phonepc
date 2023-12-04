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
                                <?php
// Database connection details
include "conn.php";
$conn->query("SET GLOBAL max_allowed_packet = 67108864");

// Check if the Task_id is set in the URL
if (isset($_GET['Task_id'])) {
    // Get the Task_id from the URL
    $selected_task_id = $_GET['Task_id'];

    // Retrieve the task details from the database
    $sql = "SELECT * FROM add_task WHERE Task_id = '$selected_task_id'";
    $result = $conn->query($sql);

    // Check if the task record is found
    if ($result->num_rows > 0) {
        // Fetch the task details
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $taskId = 'SA_TASK_' . str_pad($id, 2, '0', STR_PAD_LEFT);

        // Assign the retrieved values to variables
        $employeeId = $row['Person_id'];
        $employeename = $row['Person_name'];
        $taskName = $row['Task_name'];
        $description = $row['Description'];
        $taskEndDate = $row['Task_end_date'];
        $chooseFile = $row['File'];
        $fileExtension = $row['File_extension'];
        $additionalInformation = $row['Additional_information'];

        // Update the task in the database if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
                    $file_size = $_FILES['chooseFile']['size'];
                    $file_type = $_FILES['chooseFile']['type'];
                    $allowed_extensions = array("pdf", "jpg", "jpeg", "doc", "docx"); // Example: Add more allowed extensions here

                    // Validate file extension
                    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                    if (!in_array($file_ext, $allowed_extensions)) {
                        echo "Invalid file extension. Allowed extensions are: " . implode(", ", $allowed_extensions);
                        exit();
                    }

                    // Validate file size (example: limit file size to 5 MB)
                    $max_file_size = 5 * 1024 * 1024; // 5 MB in bytes
                    if ($file_size > $max_file_size) {
                        echo "File size exceeds the maximum limit of 5 MB.";
                        exit();
                    }

                    // Read the file and convert it to binary data
                    $file_data = file_get_contents($file_tmp);

                    // Prepare the SQL statement to update the task details in the table
                    $updateSql = "UPDATE add_task SET
                        Task_name = ?,
                        Description = ?,
                        Task_end_date = ?,
                        File = ?,
                        File_extension = ?,
                        Additional_information = ?,
                        create_status = 3
                        WHERE Task_id = ?";

                    // Create a prepared statement
                    $stmt = $conn->prepare($updateSql);
                    $stmt->bind_param("sssssss", $taskName, $description, $taskEndDate, $file_data, $file_ext, $additionalInformation, $selected_task_id);

                    // Execute the prepared statement
                    if ($stmt->execute()) {
                        // Task updated successfully
                        echo "Task updated successfully.";
                        
                        // Redirect to the previous page
                        header("Location: " . $_SERVER['HTTP_REFERER']);
                        exit();
                    } else {
                        // Error updating data in the database
                        echo "Error updating task: " . $stmt->error;
                    }
        
                    // Close the prepared statement
                    $stmt->close();
                } else {
                    // Prepare the SQL statement to update the task details in the table (without file update)
                    $updateSql = "UPDATE add_task SET
                        Task_name = ?,
                        Description = ?,
                        Task_end_date = ?,
                        Additional_information = ?,
                        create_status = 3
                        WHERE Task_id = ?";

                    // Create a prepared statement
                    $stmt = $conn->prepare($updateSql);
                    $stmt->bind_param("sssss", $taskName, $description, $taskEndDate, $additionalInformation, $selected_task_id);

                    // Execute the prepared statement
                    if ($stmt->execute()) {
                        // Task updated successfully
                        echo "Task updated successfully.";
                        
                        // Redirect to the previous page
                        header("Location: pendingtask.php"); // Replace "success_page.php" with the desired page URL
                        exit();
                    } else {
                        // Error updating data in the database
                        echo "Error updating task: " . $stmt->error;
                    }
        
                    // Close the prepared statement
                    $stmt->close();
                }
            }
        }
    
 
        echo '
        <form action="updateemptask.php?Task_id=' . $selected_task_id . '" method="post" enctype="multipart/form-data">
		<div class="row">
		<div class="mb-3 col-md-12">
			<label class="form-label">Employee ID</label>
			<input type="text" class="form-control" name="employeeId" value="' . $employeeId . '" disabled>
		</div>
		<div class="mb-3 col-md-12">
			<label class="form-label">Name</label>
			<input type="text" class="form-control" name="employeename" value="' . $employeename . '" disabled>
		</div>
		<div class="mb-3 col-md-12">
			<label class="form-label">Task ID</label>
			<input type="text" class="form-control" name="taskId" value="' . $taskId . '" disabled>
		</div>
		<div class="mb-3 col-md-12">
			<label class="form-label">Task Name</label>
			<input type="text" class="form-control" name="taskName" value="' . $taskName . '">
		</div>
		<div class="mb-3 col-md-12">
			<label class="form-label">Description</label>
			<textarea class="form-control" name="description">' . $description . '</textarea>
		</div>
		<div class="mb-3 col-md-12">
			<label class="form-label">Task End Date</label>
			<input type="text" class="datepicker-default form-control" name="taskEndDate" value="' . $taskEndDate . '">
		</div>
		<div class="mb-3 col-md-12">
			<label class="form-label">Choose File</label>
			<input type="file" class="form-control" name="chooseFile">
		</div>
		<div class="mb-3 col-md-12">
			<label class="form-label">Current File</label>
			<a type="button" class="btn btn-success" href="downloadfile.php?task_id=' . $selected_task_id . '">Download File</a>
		</div>
		<div class="mb-3 col-md-12">
			<label class="form-label">Additional Information</label>
			<textarea class="form-control" name="additionalInformation">' . $additionalInformation . '</textarea>
		</div>
		<div class="mb-3 col-md-12">
			<input type="hidden" name="selected_task_id" value="' . $selected_task_id . '">
			<input type="submit" value="Update Task" class="btn btn-primary">
            <button type="button" class="btn btn-danger" onclick="window.history.back()">Go back</button>

		</div>
	</div>        
</form>';
    } else {
        echo "No task found with the selected ID.";
    }
} else {
    echo "Invalid Task ID.";
}

// Close the database connection
$conn->close();
?>

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