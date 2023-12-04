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

    <!--*******************
        Preloader start
    ********************-->
	<?php 
	include "dashboard.php"; 
	 ?> <div class="content-body">
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
                                <h4 class="card-title">Add Task</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
    
                                        <div class="row">
                                        
                                        <div class="mb-3 col-md-12">
                                                <label class="form-label">Add Task</label>
                                                <input type="text" class="form-control"disabled placeholder="enter text">
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" rows="1" id="comment"></textarea>
                                            </div>
                                        </div> 
    
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Name of the Allocated person</label>
                                            <input type="text" class="form-control" placeholder="enter text">
                                        </div>
    
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Task end date </label>
                                            <input name="datepicker" class="datepicker-default form-control"placeholder="dd-mm-yyyy" id="datepicker">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Choose file</label>
                                            <input type="file" class="form-control" placeholder="Enter your number">
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <div class="mb-3">
                                            <label class="form-label">Additional Information</label>
                                            <textarea class="form-control" rows="1" id="comment"disabled></textarea>
                                            </div>
                                        </div> 
                                        </div>
                                         <a type="button" href="managetask.html" class="btn btn-success">Go Back</a> &nbsp
								<a type="button" href="updatetask.html" class="btn btn-primary">Update Details</a>
                                    </div>
                                <!-- here ends the content -->
                           
     
                                    </form>
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