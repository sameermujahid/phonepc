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

    <!--*******************
        Preloader start
    ********************-->
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
                                    <label class="form-label">Employee ID</label>
                                    <select id="filter1" class="default-select form-control wide" name="Employee_id">
                                        <option value="all" selected>All</option>
                                        <?php
                                        // Database connection details
                                        include "conn.php";

                                        // Retrieve unique Employee IDs from the employee_credentials table
                                        $sql = "SELECT DISTINCT Employee_id FROM employee_credentials";
                                        $result = $conn->query($sql);

                                        // Check if there are any rows returned
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $EmployeeID = $row['Employee_id'];
                                                echo '<option value="' . $EmployeeID . '">' . $EmployeeID . '</option>';
                                            }
                                        }

                                        // Close the database connection
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Employee Name</label>
                                    <select id="filter2" class="default-select form-control wide" name="Employee_name">
                                        <option value="all" selected>All</option>
                                        <?php
                                        // Establish a new database connection
                                        include "conn.php";

                                        // Retrieve unique employee names from the employee_credentials table
                                        $sql = "SELECT DISTINCT Employee_name FROM employee_credentials";
                                        $result = $conn->query($sql);

                                        // Check if there are any rows returned
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $EmployeeName = $row['Employee_name'];
                                                echo '<option value="' . $EmployeeName . '">' . $EmployeeName . '</option>';
                                            }
                                        }

                                        // Close the database connection
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
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
                <h4 class="card-title">Manage Table</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display text-center" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Your database connection code
                        include "conn.php";

                        // Fetch employee_id and Employee_name from employee_credentials table
                        $sql = "SELECT Employee_id, Employee_name FROM employee_credentials";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $counter = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $counter . "</td>";
                                echo "<td>" . $row['Employee_id'] . "</td>";
                                echo "<td>" . $row['Employee_name'] . "</td>";
                                echo '<td>
                                <a type="button" class="btn tp-btn btn-primary" href="addemptask.php?Employee_id=' . urlencode($row['Employee_id']) . '">ADD</a>
                                    </td>';
                                echo "</tr>";
                                $counter++;
                            }
                        } else {
                            echo "<tr><td colspan='4'>No records found</td></tr>";
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // JavaScript function to update project status
function updateProjectStatus(projId, status) {
    // AJAX request
    $.ajax({
        url: 'update_proj_status.php', // Change the URL to the file that handles the update logic
        type: 'POST',
        data: { proj_id: projId, user_status: status },
        success: function(response) {
            // Handle the response from the server
            if (response === 'success') {
                // Perform any necessary actions upon successful update
                alert('Project status updated successfully.');
                // Reload the page or perform any other actions as needed
                location.reload();
            } else {
                alert('Error updating project status.');
            }
        },
        error: function() {
            alert('Error updating project status. Please try again.');
        }
    });
}

</script>
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
        var selectedEmployeeID = document.getElementById("filter1").value;
        var selectedEmployeeName = document.getElementById("filter2").value;

        // Get all the rows in the table
        var tableRows = document.querySelectorAll("#example tbody tr");

        // Loop through each row and show/hide based on the selected filters
        for (var i = 0; i < tableRows.length; i++) {
            var row = tableRows[i];
            var employeeIDCell = row.cells[1].innerText; // Assuming Employee ID is the 1st cell (index 0)
            var employeeNameCell = row.cells[2].innerText; // Assuming Employee Name is the 2nd cell (index 1)

            var showRow = true;

            // Filter based on "Employee ID"
            if (selectedEmployeeID !== "all" && employeeIDCell !== selectedEmployeeID) {
                showRow = false;
            }

            // Filter based on "Employee Name"
            if (selectedEmployeeName !== "all" && employeeNameCell !== selectedEmployeeName) {
                showRow = false;
            }

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

        filterPosts(); // Apply the default filter values
    }
</script>


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