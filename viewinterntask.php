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
	<?php include "dashboard.php" ?>
	<!--**********************************
            Sidebar end
     ***********************************-->
		
	<!--**********************************
        Content body start
    ***********************************-->

        <div class="content-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
						<div class="card text-white bg-primary">
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Author ID</strong> </span>SA_01</li>
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Batch ID</strong> </span>BA_01</li>
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Trainer ID</strong> </span>TR_01</li>
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Intern ID</strong> </span>IN_01</li>

							</ul>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
						<div class="card text-white bg-primary">
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Request Author type</strong></span>Trainer</li>
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Date of Request Author Action</strong> </span>21/03/2022</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
						<div class="card text-white bg-primary">
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Accepted Author Type</strong></span>Super Admin</li>
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0"><strong>Date of Accept Author Action</strong> </span>21/03/2022</li>
							</ul>
						</div>
					</div>
					
						<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">View Task</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
									<?php
									// Assuming you have retrieved the selected post_id from the previous page
									$selected_id = $_GET['id'];
									
									// Retrieve the details of the selected post from the database
									include "conn.php";

									$sql = "SELECT * FROM `ims_task` WHERE id = '$selected_id'";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
										$row = $result->fetch_assoc();

										// Assign the retrieved values to variables
										$author_id = $row['author_id'];
										$author_name = $row['author_name'];
										$type = $row['type'];
                                        $intern_id = $row['intern_id'];
                                        $intern_name = $row['intern_name'];
										$course_name = $row['course_name'];
										$task_id = $row['task_id'];										
										$course_name = $row['course_name'];
										$task = $row['task'];
										$trainer_id = $row['trainer_id'];
										$trainer_name = $row['trainer_name'];
										$task_start_date = $row['task_start_date'];
										$task_end_date = $row['task_end_date'];
										$attachment = $row['attachment'];
										$additional_information = $row['additional_information'];
                                        echo'<div class="row">
										<div class="mb-3 col-md-6">
                                        <label class="form-label">Author ID</label>
                                        <input type="text" class="form-control"  value="' . $author_id . '" disabled>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                    <label class="form-label">Author Name</label>
                                    <input type="text" class="form-control"  value="' . $author_name . '" disabled>
                                </div>
								<div class="mb-3 col-md-6">
								<label class="form-label">Type</label>
								<select id="inputState" class="fill-select form-control " value="' . $type . '" disabled>                                           
								 <option>All</option>
									<option>Individual</option>
								</select>
							</div>
							<div class="mb-3 col-md-6">
							<label class="form-label">intern_id</label>
							<input type="text" name="intern_id" class="form-control"  value="' . $intern_id . '" disabled>
						</div>

						<div class="mb-3 col-md-6">
							<label class="form-label">intern_name</label>
							<input type="text" name="intern_name" class="form-control" value="' . $intern_name . '" disabled>
						</div>
											<div class="mb-3 col-md-6">
											 <label class="form-label">course_name</label>
											 <input type="text" name="course_name" class="form-control" placeholder="enter text" value="' . $course_name . '" disabled>
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label">Task ID</label>
												<input type="text" class="form-control" placeholder="enter text" value="' . $task_id . '" disabled>
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label">Task</label>
												<input type="text" class="form-control" placeholder="enter text" value="' . $task . '" disabled>
											</div>
											<div class="mb-3 col-md-6">
											<label class="form-label">Intern ID</label>
											<input type="text" class="form-control" placeholder="enter text" value="' . $intern_name . '" disabled>
										</div>
										<div class="mb-3 col-md-6">
											<label class="form-label">Intern Name</label>
											<input type="text" class="form-control" placeholder="enter text" value="' . $intern_name . '" disabled>
										</div>
										<div class="mb-3 col-md-6">
                                        <label class="form-label">Task start date</label>
                                        <input type="datepicker" name="task_start_date" class="datepicker-default form-control"placeholder="dd-mm-yyyy" id="datepicker" value="' . $task_start_date . '" disabled>
                                        </div>

	
										<div class="mb-3 col-md-6">
											<label class="form-label">Task end date </label>
											<input name="datepicker" class="datepicker-default form-control"placeholder="dd-mm-yyyy" id="datepicker" value="' . $task_end_date . '" disabled>
										</div>
										<div class="mb-3 col-md-6">
											<label class="form-label">Attachment</label>
											<div>
											Current file: <a type="button" class="btn btn-success" href="download1.php?id=' . $selected_id . '">Download File</a>
										
											</div>
										</div>
										<div class="mb-3 col-md-6">
											<label class="form-label">Additional Information</label>
											<input type="text" class="form-control" placeholder="enter text" value="' . $additional_information . '" disabled>
										</div>
										</div>';

										
                                        } else {
                                echo "No post found with the selected ID.";
                            }

                            // Close the database connection
                            $conn->close();
                        ?>

									<div class="mb-3 col-md-6">
                                    <a type="button" href="manageinterntask.php" class="btn btn-success">Go Back</a> &nbsp
									<a class="btn btn-primary" href="updateinterntask.php?id=<?php echo $row['id']; ?>" >Update</a>                          </div>
							       </div>
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
                                        </form>	
                                    </div>
                                <!-- here ends the content -->
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