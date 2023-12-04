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

	<?php
	include "dashboard.php";
	?>
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
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Author ID</strong> </span>SA_01</li>
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Batch ID</strong> </span>BA_01</li>
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Trainer ID</strong> </span>TR_01</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
						<div class="card text-white bg-primary">
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Request Author type</strong></span>Trainer</li>
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

					<?php
// Assuming you have already established a database connection
include "conn.php";

// Check if the form was submitted and the id is present
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Get the id from the form submission
    $id = $_POST['id'];

    $author_id = $_POST['author_id'];
    $author_name = $_POST['author_name'];
    $batch_id = $_POST['batch_id'];
    $trainer_id = $_POST['trainer_id'];
    $trainer_name = $_POST['trainer_name'];
    $type = $_POST['type'];
    $intern_id = $_POST['intern_id'];
	$intern_name = $_POST['intern_name'];
    $course_name = $_POST['course_name'];
    $task_id = $_POST['task_id'];
    $task = $_POST['task'];
    $task_start_date = $_POST['task_start_date'];
    $task_end_date = $_POST['task_end_date'];
    $attachment = $_POST['attachment'];
	$additional_information = $_POST['additional_information'];

    // Update the post in the database
    $sql = "UPDATE ims_task SET
                author_id = '$author_id',
                author_name = '$author_name',
                batch_id = '$batch_id',
                trainer_id = '$trainer_id',
                trainer_name = '$trainer_name',
                type = '$type',
                intern_id = '$intern_id',
				intern_name = '$intern_name',
                course_name = '$course_name',
                task_id = '$task_id',
                task = '$task',
                task_start_date = '$task_start_date',
                task_end_date = '$task_end_date',
                attachment = '$attachment',
				additional_information = '$additional_information'
            WHERE id = '$id'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo '
        <div class="alert alert-success alert-dismissible fade show">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
            <strong>Success!</strong> The details are updated.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>';

        echo '<script>
            setTimeout(function() {
                window.history.back();
            }, 5000);
        </script>';

    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Retrieve the details of the selected post from the database
$id = $_GET['id'];

$sql = "SELECT * FROM ims_task WHERE id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Assign the retrieved values to variables
    $author_id = $row['author_id'];
    $author_name = $row['author_name'];
    $batch_id = $row['batch_id'];
    $trainer_id = $row['trainer_id'];
    $trainer_name = $row['trainer_name'];
    $type = $row['type'];
    $intern_id = $row['intern_id'];
	$intern_name = $row['intern_name'];
    $course_name = $row['course_name'];
    $task_id = $row['task_id'];
    $task = $row['task'];
    $task_start_date = $row['task_start_date'];
    $task_end_date = $row['task_end_date'];
    $attachment = $row['attachment'];
	$additional_information = $row['additional_information'];

    // HTML form to display the details
    echo '
					<div class="col-xl-12 col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Update form</h4>
							</div>
							<div class="card-body">
							<div class="basic-form">
								<form action="" method="POST">
									<input type="hidden" name="id" value="' . $id . '">

										<div class="row">                     

										<div class="mb-3 col-md-6">
										<label class="form-label">author_id</label>
										<input type="text" class="form-control" id="comment-field" name="author_id"  value="' . $author_id . '">
						</div>
						<div class="mb-3 col-md-6">
						<label class="form-label">author_name</label>
						<input type="text" class="form-control" id="comment-field" name="author_name"  value="' . $author_name . '">
					</div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Batch ID </label>
                                        <input type="text" name="batch_id" class="form-control" value="' . $batch_id . '"  >
                                </div>
								<div class="mb-3 col-md-6">
					<label class="form-label">trainer_id</label>
					<input type="text" name="trainer_id" class="form-control" value="' . $trainer_id . '"  >
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">trainer_name</label>
					<input type="text" name="trainer_name" class="form-control" value="' . $trainer_name . '">
				</div>
                            

                        
						<div class="mb-3 col-md-6">
						<label class="form-label">type</label>
						<select id="inputState" name="type" class="default-select form-control wide" value="' . $type . '">
							<option>All</option>
							<option>Individual</option>
						</select>
					</div>
					<div class="mb-3 col-md-6">
					<label class="form-label">intern_id</label>
					<input type="text" name="intern_id" class="form-control"  value="' . $intern_id . '">
				</div>

				<div class="mb-3 col-md-6">
					<label class="form-label">intern_name</label>
					<input type="text" name="intern_name" class="form-control" value="' . $intern_name . '">
				</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">course_name</label>
						<input type="text" name="course_name" class="form-control" value="' . $course_name . '">
				</div>
				<div class="mb-3 col-md-6">
                                <label class="form-label">Task ID </label>
                                <input type="text" name="task_id" class="form-control" value="' . $task_id . '">
                        </div>

					<div class="mb-3 col-md-6">
						<label class="form-label">task</label>
						<input type="text" name="task" class="form-control"  value="' . $task . '">
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">task_start_date</label>
					<input type="datepicker" name="task_start_date" class="datepicker-default form-control" id="datepicker" value="' . $task_start_date . '" >
				</div>

				<div class="mb-3 col-md-6">
					<label class="form-label">task_end_date</label>
					<input type="datepicker" name="task_end_date" class="datepicker-default form-control" id="datepicker" value="' . $task_end_date . '" >
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">attachment</label>
					<input type="file" name="attachment" class="form-control" value="' . $attachment . '"  >
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">additional_information</label>
					<textarea class="form-control" name="additional_information" rows="1" id="comment" value="' . $additional_information . '" ></textarea>
					</div>
				</div> 
									 <!-- here ends the content -->
									 <button type="submit" class="btn btn-success">
										<span class="btn-icon-start text-success"><i class="fa fa-plus color-success"></i></span>
										Update Notification
									</button>
									<a type="button" href="manageinterntask.php" class="btn btn-primary">Go Back</a> &nbsp

								</form>
							</div>
						</div>
					</div>
				</div>';
			}
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