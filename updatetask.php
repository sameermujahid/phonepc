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

    <!--*******************
        Preloader start
    ********************-->
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
								<h4 class="card-title">Update form</h4>
							</div>
							<div class="card-body">
								<div class="basic-form">
									<form action="managetask.html">
										<div class="row">
									
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">task name </label>
                                                <input type="text" class="form-control" placeholder="enter task name">
                                        </div>

									<div class="mb-3 col-md-12">
											<label class="form-label">task id </label>
											<input type="text" class="form-control" placeholder="enter task id">
									</div>
										
                                   

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">name of the allocated person</label>
                                        <select id="inputState" class="default-select form-control wide">
                                            <option selected>Choose...</option>
                                            <option> vijaya</option>
                                            <option> kranthi</option>
                                        </select>
                                    </div>

                            

                            <div class="mb-3 col-md-12">
                                <label class="form-label">task end Date </label>
                                <input type="date" class="form-control" placeholder="dd-mm-yyyy">
                        </div>
		
                        <div class="mb-3 col-md-12">
                            <label class="form-label">choose file</label>
                            <input type="file" class="form-control" placeholder="upload your files">
                    </div>	

							</div>
										<br>
										<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal">Update</button>
										<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal2">Cancel</button>
										<!-- Modal -->
										<div class="modal fade" id="basicModal">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Update</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
													</div>
													<div class="modal-body">Are you sure you want to update the data?</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
														<button type="button" class="btn btn-success">Ok</button>
													</div>
												</div>
											</div>
										</div>
										<div class="modal fade" id="basicModal2">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Go back</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
													</div>
													<div class="modal-body">Are you sure you want to Go back?, All unsaved data will be lost.</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-danger" data-bs-dismiss="modal">No!</button>
														<button type="button" class="btn btn-success">Yes!</button>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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