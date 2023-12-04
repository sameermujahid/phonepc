<!DOCTYPE html>
<html lang="en">
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
<?php include "dashboard.php"?>

        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
	 <div class="content-body">
    <div class="container-fluid">
        <div class="custom-card overflow">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Filters</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form id="filterForm" method="post">
                            <div class="row">
                            <div class="mb-3 col-md-3">
    <label class="form-label">Date of task allocated</label>
    <select id="filter1" class="default-select form-control wide" name="Date_of_task_allocated">
        <option value="all" selected>All</option>
        <?php
        // Database connection details
        include "conn.php";

        // Retrieve unique Date_of_task_allocated values from the database
        $sql = "SELECT DISTINCT Date_of_task_allocated FROM add_task WHERE create_status IN (0, 3)";
        $result = $conn->query($sql);

        // Check if there are any rows returned
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Dateoftaskallocated = $row['Date_of_task_allocated'];
                echo '<option value="' . $Dateoftaskallocated . '">' . $Dateoftaskallocated . '</option>';
            }
        }

        // Close the database connection
        $conn->close();
        ?>
    </select>
</div>

<div class="mb-3 col-md-3">
    <label class="form-label">Task Name</label>
    <select id="filter2" class="default-select form-control wide" name="Task_name">
        <option value="all" selected>All</option>
        <?php
        // Establish a new database connection
        include "conn.php";

        // Retrieve unique company names from the database
        $sql = "SELECT DISTINCT Task_name FROM add_task WHERE create_status IN (0, 3)";
        $result = $conn->query($sql);

        // Check if there are any rows returned
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Taskname = $row['Task_name'];
                echo '<option value="' . $Taskname . '">' . $Taskname . '</option>';
            }
        }

        // Close the database connection
        $conn->close();
        ?>
    </select>
</div>

<div class="mb-3 col-md-3">
    <label class="form-label">Deadline of Task</label>
    <select id="filter3" class="default-select form-control wide" name="Task_end_date">
        <option value="all" selected>All</option>
        <?php
        // Retrieve unique job titles from the database
        include "conn.php";

        $sql = "SELECT DISTINCT Task_end_date FROM add_task WHERE create_status IN (0, 3)";
        $result = $conn->query($sql);

        // Check if there are any rows returned
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Taskenddate = $row['Task_end_date'];
                echo '<option value="' . $Taskenddate . '">' . $Taskenddate . '</option>';
            }
        }

        // Close the result set
        $result->close();

        // Close the database connection
        $conn->close();
        ?>
    </select>
</div>



                                <div class="row">

                                <div class="mb-3 col-md-3">
                                    <button type="submit" class="btn btn-success" id="searchButton">Search</button>
                                    <button type="button" class="btn btn-danger" id="resetButton">Reset all</button>
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
							<h4 class="card-title">Pending Table</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="example" class="display text-center" style="min-width: 845px">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Date of task allocated</th>
											<th>Task ID</th>
											<th>Task Name</th>
											<th>Deadline of Task</th>
											<th>Employee Name</th>
											<th>View</th>
											<th>Accept</th>
											<th>Reject</th>
											<th>Update</th>
										</tr>
									</thead>
									<tbody>
									<?php
include "conn.php";

// Retrieve the posts with create_status = 0 from the table
$sql = "SELECT * FROM add_task WHERE create_status IN (0, 3)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $counter = 1;
    while ($row = $result->fetch_assoc()) {
        $date_of_allocated = $row['Date_of_task_allocated'];
        $taskId = $row['Task_id'];
        $taskname = $row['Task_name'];
        $taskEndDate = $row['Task_end_date'];
        $Dateoftaskallocated = $row['Person_name'];

        // Get the ID from the table and format it
        $id = $row['id'];
        $taskId = 'SA_TASK_' . str_pad($id, 2, '0', STR_PAD_LEFT);

        echo "<tr>";
        echo "<td>$counter</td>";
        echo "<td>$date_of_allocated</td>";
        echo "<td>$taskId</td>";
        echo "<td>$taskname</td>";
        echo "<td>$taskEndDate</td>";
        echo "<td>$Dateoftaskallocated</td>";
        echo '<td>
                <a type="button" class="btn tp-btn btn-info" href="viewemptask.php?Task_id=' . $row['Task_id'] . '">View</a>
              </td>';
        echo '<td>
        <a type="button" class="btn tp-btn btn-success" href="acceptemptask.php?Task_id=' . $row['Task_id'] . '&id=' . $row['id'] . '">Accept</a>
        </td>';
        echo '<td>
        <button type="button" class="btn tp-btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal' . $row['Task_id'] .  '">Reject</button>
        </td>';
        echo '<td>
        <a type="button" class="btn tp-btn btn-warning" href="updateemptask.php?Task_id=' . $row['Task_id'] . '">Update</a>
        </td>';

        echo "</tr>";

        echo '<div class="modal fade" id="rejectModal' . $row['Task_id'] . '">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirmation Message</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body"><h6>Are you sure you want to reject it?</h6></div>
                        <div class="modal-footer">
                            <a href="rejecttask.php?Task_id=' . $row['Task_id'] . '&id=' . $row['id'] . '" class="btn btn-danger btn-lg">Yes</a>
                            <button type="button" class="btn btn-success btn-lg" data-bs-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div>';

        $counter++;
    }
} else {
    echo "<tr><td colspan='10'>No posts found</td></tr>";
}

// Close the database connection
$conn->close();
?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			
        </div>
<script>
    document.getElementById("filterForm").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Call the filterPosts function to handle filtering based on selected options
        filterPosts();
    });

    document.getElementById("resetButton").addEventListener("click", function () {
        resetFilters();
    });

    function filterPosts() {
        // Get the selected values from the filters
        var selectedDateoftaskallocated = document.getElementById("filter1").value;
        var selectedTaskname = document.getElementById("filter2").value;
        var selectedTaskenddate = document.getElementById("filter3").value;
       

        // Get all the rows in the table
        var tableRows = document.querySelectorAll("#example tbody tr");

        // Loop through each row and show/hide based on the selected filters
        for (var i = 0; i < tableRows.length; i++) {
            var row = tableRows[i];
            var DateoftaskallocatedCell = row.cells[1].innerText; // Assuming Date of Action is the 2nd cell (index 1)
            var TasknameCell = row.cells[3].innerText; // Assuming Company Name is the 4th cell (index 3)
            var TaskenddateCell = row.cells[4].innerText; // Assuming Job Title is the 5th cell (index 4)


            var showRow = true;

            // Filter based on "Filter 1" (Date of Action)
            if (selectedDateoftaskallocated !== "all" && DateoftaskallocatedCell !== selectedDateoftaskallocated) {
                showRow = false;
            }

            // Filter based on "Filter 2" (Company Name)
            if (selectedTaskname !== "all" && TasknameCell !== selectedTaskname) {
                showRow = false;
            }

            // Filter based on "Filter 3" (Job Title)
            if (selectedTaskenddate !== "all" && TaskenddateCell !== selectedTaskenddate) {
                showRow = false;
            }

            // Filter based on "Filter 4" (Mode of Work)
           

            // Display or hide the row accordingly
            if (showRow) {
                row.style.display = "table-row";
            } else {
                row.style.display = "none";
            }
        }
    }

    function resetFilters() {
        document.getElementById("filter1").value = "all";
        document.getElementById("filter2").value = "all";
        document.getElementById("filter3").value = "all";

        filterPosts(); // Apply the default filter values
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
	<script>
    $(document).ready(function() {
        // When the "Yes" button is clicked in the confirmation modal
        $('.confirm-reject-form').submit(function(event) {
            event.preventDefault(); // Prevent form submission

            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                success: function(response) {
                    // Display the success message or handle the response
                    console.log(response);
                },
                error: function() {
                    // Display the error message or handle the error
                    console.log("Error rejecting the post.");
                }
            });
        });
    });
</script>
<script src="js/plugins-init/sweetalert.init.js"></script>
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

</html>