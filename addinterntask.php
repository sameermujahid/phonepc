<!DOCTYPE html>
<html lang="en">
<include conn.php>
<head>
<?php 
	include "static_values.php";
	$typeinfo = type();
	?>
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
        <div class="content-body">
        <div class="main-content container-fluid app-content">

				<!-- container -->
				<div class="col-xl-12 col-lg-10">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Add Task</h4>
						</div>
						<div class="card-body">
							<div class="basic-form">
                            <form action= "addtaskvalid.php" method= "POST" enctype="multipart/form-data">

									<div class="row">

                                    <div class="mb-3 col-md-6">
                                                <label class="form-label">author_id</label>
                                                <input type="text" name="author_id" class="form-control" placeholder="enter author id">
                                        </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">author_name</label>
                                        <input type="text" name="author_name" class="form-control" placeholder="enter author_name">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">batch_id</label>
                                        <input type="text" name="batch_id" class="form-control" placeholder="enter batch_id">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">trainer_id</label>
                                        <input type="text" name="trainer_id" class="form-control" placeholder="enter intern_id">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">trainer_name</label>
                                        <input type="text" name="trainer_name" class="form-control" placeholder="enter intern_id">
                                    </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">type</label>
                                            <select id="type" name="type" class="default-select form-control wide"  onchange="toggletype()" required>
                                                <option selected>Choose...</option>
                                                <option>All</option>
                                                <option>Individual</option>
                                            </select>
                                        </div>
                                        <script>
                                            function toggletype() {
                                                var type = document.getElementById('type');
                                                var internIdfield = document.getElementsByName('intern_id')[0];
                                                var internNamefield = document.getElementsByName('intern_name')[0];

                                                if (type.value === 'Individual') {
                                                    internIdfield.disabled = false;
                                                    internNamefield.disabled = false;
                                                } else {
                                                    internIdfield.disabled = true;
                                                    internNamefield.disabled = true;
                                                }
                                            }
                                        </script>
                                        
                                        <div class="mb-3 col-md-6">
                                        <label class="form-label">intern_id</label>
                                        <input type="text" name="intern_id" class="form-control" placeholder="enter intern_id" disable>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">intern_name</label>
                                        <input type="text" name="intern_name" class="form-control" placeholder="enter intern_name" disable>
                                    </div>
                                        <div class="mb-3 col-md-6">
											<label class="form-label">course_name</label>
											<input type="text" name="course_name" class="form-control" placeholder="enter text">
									</div>
                                    <div class="mb-3 col-md-6">
											<label class="form-label">task_id</label>
											<input type="text" name="task_id" class="form-control" placeholder="enter text">
									</div>
										<div class="mb-3 col-md-6">
											<label class="form-label">task</label>
											<input type="text" name="task" class="form-control" placeholder="enter text">
									</div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">task_start_date</label>
                                        <input type="datepicker" name="task_start_date" class="datepicker-default form-control"placeholder="dd-mm-yyyy" id="datepicker">
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">task_end_date</label>
                                        <input type="datepicker" name="task_end_date" class="datepicker-default form-control"placeholder="dd-mm-yyyy" id="datepicker">
                                    </div>
                                    
                                   
                                   
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">attachment</label>
                                        <input type="file" name="attachment" class="form-control" placeholder="choose a file">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">additional_information</label>
                                        <textarea class="form-control" name="additional_information" rows="1" id="comment"></textarea>
                                        </div>
                                    </div> 
										
								   
									<div class="mb-3 col-md-6">
                                                    <label class="col-lg-4 col-form-label"><a
                                                            href="javascript:void()">Terms &amp; Conditions</a> <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <div class="form-check">
														  <input class="form-check-input" type="checkbox" value="" id="validationCustom12" required>
														  <label class="form-check-label" for="validationCustom12">
															Agree to terms and conditions
														  </label>
														</div>
                                                    </div>
                                     </div>
								</div>
							<!-- here ends the content -->
							<button type="primary" class="btn  btn-success"><span class="btn-icon-start text-success"><i class="fa fa-plus color-success"></i>
							</span>Add</button>
 
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