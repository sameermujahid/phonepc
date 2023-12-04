<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from getskills.dexignzone.com/xhtml/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 May 2023 11:35:36 GMT -->
<head>
        <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="SAHAI  : SAHAI Online Learning Admin Bootstrap 5 Template" />
	<meta property="og:title" content="SAHAI  : SAHAI Online Learning  Admin Bootstrap 5 Template" />
	<meta property="og:description" content="SAHAI  : SAHAI Online Learning  Admin Bootstrap 5 Template" />
	<meta property="og:image" content="social-image.html" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>SAHAI Online Learning Admin</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
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
			<div class="container-fluid">
			<div class=" custom-card ">
				<div class="card">
				                            <div class="card-header">
                                <h4 class="card-title">Filters</h4>
                            </div>
		
					<div class="card-body">
						<div class="basic-form">
							<form>
		
								<div class="row">
									<div class="mb-3 col-md-3">
										<label class="form-label">Select Mentor</label>
										<select id="inputState" class="default-select form-control wide">
											<option selected>Choose...</option>
											<option>Option 1</option>
											<option>Option 2</option>
											<option>Option 3</option>
										</select>
									</div>
                                    <div class="mb-3 col-md-3">
										<label class="form-label">Select Intern</label>
										<select id="inputState" class="default-select form-control wide">
											<option selected>Choose...</option>
											<option>Option 1</option>
											<option>Option 2</option>
											<option>Option 3</option>
										</select>
									</div>
                                    <div class = "row">
									<div class="mb-3 col-md-3">
									<button type="submit" class="btn btn-success">Search</button> &nbsp
									<button type="submit" class="btn btn-danger">Reset all</button>
								</div>
								</div>
                            </div>
								
								
							</form>
						</div>
					</div>
				</div>
			</div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Manage Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                        <tr>
							<th>S.No</th>
							<th>Date and Time</th>
                            <th>Username</th>
                            <th>Subject</th>
							<th>Description</th>
							<th>Attachment</th>
							<th>Reply</th>
                            <th>Comment</th>							
                            <th>Marks</th>							
						</tr>
					</thead>
					<tbody>
                                        
                        <td>01</td>
                        <td>01/02/2023 11:15</td>
                        <td>Pooja</td>
                        <td>Web Technologies</td>
                        <td>Learn the new type of Technologies</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>10</td>
						</tr>
						<tr>
							<td>02</td>
                            <td>01/02/2023 11:15</td>
                            <td>Pooja</td>
                            <td>Web Technologies</td>
                            <td>Learn the new type of Technologies</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>10</td>
                         </td>                                           
						</tr>
						<tr>
                            <td>03</td>
                            <td>01/02/2023 11:15</td>
                            <td>Pavan</td>
                            <td>Web Technologies</td>
                            <td>Learn the new type of Technologies</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>10</td>
                         </td>
						</tr>
						<tr>
                            <td>04</td>
                            <td>01/02/2023 11:15</td>
                            <td>Radha</td>
                            <td>Web Technologies</td>
                            <td>Learn the new type of Technologies</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>10</td>
                    	</tr>
									
                                        </tbody>
                                    </table>
							</div>
						</div>
																		
									</div>
								</div>
							</div>
							<!-- End Row -->
	
		
							<div class="modal fade" id="success">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Confirmation Message</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
										</div>
										<div class="modal-body">Are you sure you want to Delete it?</div>
										<div class="modal-footer">
											<button class="btn ripple btn-success" type="button">Delete</button>
											<button class="btn ripple btn-primary" data-bs-dismiss="modal" type="button">Not Now</button>
										</div>
									</div>
								</div>
							</div>
							
			
							
								
								
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
	<!-- Apex Chart -->
	<script src="vendor/apexchart/apexchart.js"></script>
	
    <!-- Datatable -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>

	<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <script src="js/custom.js"></script>
	<script src="js/dlabnav-init.js"></script>
	<script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>

<!-- Mirrored from getskills.dexignzone.com/xhtml/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 May 2023 11:35:38 GMT -->
</html>