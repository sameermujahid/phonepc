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
        $sql = "SELECT DISTINCT Date_of_task_allocated FROM add_task WHERE create_status IN (1)";
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
        $sql = "SELECT DISTINCT Task_name FROM add_task WHERE create_status IN (1)";
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
    <label class="form-label">Task End Date</label>
    <select id="filter3" class="default-select form-control wide" name="Task_end_date">
        <option value="all" selected>All</option>
        <?php
        // Retrieve unique job titles from the database
        include "conn.php";

        $sql = "SELECT DISTINCT Task_end_date FROM add_task WHERE create_status IN (1)";
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

<div class="mb-3 col-md-3">
    <label class="form-label">Employee Name</label>
    <select id="filter4" class="default-select form-control wide" name="Person_name">
        <option value="all" selected>All</option>
        <?php
        // Retrieve unique job titles from the database
        include "conn.php";

        $sql = "SELECT DISTINCT Person_name FROM add_task WHERE create_status IN (1)";
        $result = $conn->query($sql);

        // Check if there are any rows returned
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $employeename = $row['Person_name'];
                echo '<option value="' . $employeename . '">' . $employeename . '</option>';
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
											<th>Actions</th>
										
										</tr>
									</thead>
									<tbody>
									<?php
include "conn.php";

// Function to update the task_pending_status
function updateTaskStatus($taskId) {
  global $conn;
  $query = "UPDATE add_task SET Task_pending_status = 1 WHERE Task_id = '$taskId'";
  $result = $conn->query($query);
  if ($result) {
    echo "Task status updated successfully.";
  } else {
    echo "Error updating task status: " . $conn->error;
  }
}

// Retrieve the posts with create_status = 0 from the table
$sql = "SELECT * FROM add_task WHERE create_status IN (1, 4)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $counter = 1;
    while ($row = $result->fetch_assoc()) {
        $date_of_allocated = $row['Date_of_task_allocated'];
        $taskId = $row['Task_id'];
        $taskname = $row['Task_name'];
        $taskEndDate = $row['Task_end_date'];
        $employeename = $row['Person_name'];

        // Get the ID from the table and format it
        $id = $row['id'];
        $taskId = 'SA_TASK_' . str_pad($id, 2, '0', STR_PAD_LEFT);

        echo "<tr>";
        echo "<td>$counter</td>";
        echo "<td>$date_of_allocated</td>";
        echo "<td>$taskId</td>";
        echo "<td>$taskname</td>";
        echo "<td>$taskEndDate</td>";
        echo "<td>$employeename</td>";
        echo '<td>
        <div class="basic-dropdown">
          <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
              Actions
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="viewemptask.php?Task_id=' . $row['Task_id'] . '">View</a>
              <a class="dropdown-item" href="updateemptask.php?Task_id=' . $row['Task_id'] . '">Update</a>
              <a class="dropdown-item" href="replytask.php?Task_id=' . $row['Task_id'] . '">Reply</a>
              <a class="dropdown-item" href="viewreplies.php?Task_id=' . $row['Task_id'] . '">View reply</a>
              <a class="dropdown-item" href="updateacceptemptask.php?Task_id=' . $row['Task_id'] . '&id=' . $row['id'] . '">Accept update</a>
              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setPostId(\'' . $row['Task_id'] . '\')">Delete</a>
              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#blockModal" onclick="setPostId(\'' . $row['Task_id'] . '\')">Block</a>
              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#unblockModal" onclick="setPostId(\'' . $row['Task_id'] . '\')">Unblock</a>
              <a class="dropdown-item completeButton" data-task-id="' . $row['Task_id'] . '">Complete</a>
            </div>
          </div>
        </div>
      </td>';
        echo "</tr>";
        $counter++;
    }
} else {
    echo "<tr><td colspan='10'>No posts found</td></tr>";
}

// Close the database connection
$conn->close();
?>

                        <!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this item?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" onclick="updateStatus('delete')">Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Block Modal -->
<div class="modal fade" id="blockModal" tabindex="-1" aria-labelledby="blockModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="blockModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to block this item?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" onclick="updateStatus('block')">Block</button>
      </div>
    </div>
  </div>
</div>

<!-- Unblock Modal -->
<div class="modal fade" id="unblockModal" tabindex="-1" aria-labelledby="unblockModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="unblockModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to unblock this item?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" onclick="updateStatus('unblock')">Unblock</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Listen for the click event on the completeButton class
    $(document).on('click', '.completeButton', function() {
      var taskId = $(this).data('task-id');

      // Send an AJAX request to update the task status
      $.ajax({
        url: 'update_task_status.php',
        method: 'POST',
        data: { taskId: taskId },
        success: function(response) {
          // Handle the response from the server if needed
          console.log(response);
        },
        error: function(xhr, status, error) {
          // Handle errors if any
          console.error(error);
        }
      });
    });
  });
</script>


<!-- The rest of your HTML code here -->

<script>
    var selectedTaskId = null;

    function setPostId(taskId) {
      selectedTaskId = taskId;
    }

    function updateStatus(action) {
        if (!selectedTaskId) {
            console.error('No task_id selected.');
            return;
        }

        var userStatus;
        if (action === 'delete') {
            userStatus = 3;
        } else if (action === 'block') {
            userStatus = 2;
        } else if (action === 'unblock') {
            userStatus = 1;
        } else {
            console.error('Invalid action.');
            return;
        }

        // Send AJAX request to update_user_status.php
        $.ajax({
            type: "POST",
            url: "update_task_user_status.php",
            data: {
                task_id: selectedTaskId,
                user_status: userStatus
            },
            success: function (response) {
                // If the update is successful, you can do something here (e.g., show a success message)
                console.log(response);
            },
            error: function (xhr, status, error) {
                // If there's an error with the AJAX request, you can handle it here
                console.error(error);
            }
        });

        // Hide the modal after the action is complete (optional)
        $("#deleteModal").modal("hide");
        $("#blockModal").modal("hide");
        $("#unblockModal").modal("hide");
    }
</script>



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
        var selectedemployeename = document.getElementById("filter4").value;
       

        // Get all the rows in the table
        var tableRows = document.querySelectorAll("#example tbody tr");

        // Loop through each row and show/hide based on the selected filters
        for (var i = 0; i < tableRows.length; i++) {
            var row = tableRows[i];
            var DateoftaskallocatedCell = row.cells[1].innerText; // Assuming Date of Action is the 2nd cell (index 1)
            var TasknameCell = row.cells[3].innerText; // Assuming Company Name is the 4th cell (index 3)
            var TaskenddateCell = row.cells[4].innerText; // Assuming Job Title is the 5th cell (index 4)
            var employeenameCell = row.cells[5].innerText; // Assuming Job Title is the 5th cell (index 4)


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
            if (selectedemployeename !== "all" && employeenameCell !== selectedemployeename) {
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
        document.getElementById("filter4").value = "all";

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