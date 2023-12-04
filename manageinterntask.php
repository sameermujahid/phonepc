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
    <?php include "dashboard.php" ?>
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
                                        <label class="form-label">Date of Action</label>
                                        <select id="filter1" class="default-select form-control wide" name="date_of_action">
                                            <option value="all" selected>All</option>
                                            <?php
                                            // Retrieve unique date_of_action values from the database
                                            include "conn.php";

                                            $sql = "SELECT DISTINCT date_of_action FROM ims_task";
                                            $result = $conn->query($sql);

                                            // Check if there are any rows returned
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $date_of_action = $row['date_of_action'];
                                                    echo '<option value="' . $date_of_action . '">' . $date_of_action . '</option>';
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
                                        <label class="form-label">Course Name</label>
                                        <select id="filter2" class="default-select form-control wide" name="course_name">
                                            <option value="all" selected>All</option>
                                            <?php
                                            // Establish a new database connection
                                            include "conn.php";

                                            // Retrieve unique course_name values from the database
                                            $sql = "SELECT DISTINCT course_name FROM ims_task";
                                            $result = $conn->query($sql);

                                            // Check if there are any rows returned
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $course_name = $row['course_name'];
                                                    echo '<option value="' . $course_name . '">' . $course_name . '</option>';
                                                }
                                            }

                                            // Close the database connection
                                            $conn->close();
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">Trainer Name</label>
                                        <select id="filter3" class="default-select form-control wide" name="trainer_name">
                                            <option value="all" selected>All</option>
                                            <?php
                                            // Retrieve unique trainer_name values from the database
                                            include "conn.php";

                                            $sql = "SELECT DISTINCT trainer_name FROM ims_task";
                                            $result = $conn->query($sql);

                                            // Check if there are any rows returned
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $trainer_name = $row['trainer_name'];
                                                    echo '<option value="' . $trainer_name . '">' . $trainer_name . '</option>';
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
                                        <label class="form-label">Batch ID</label>
                                        <select id="filter4" class="default-select form-control wide" name="batch_id">
                                            <option value="all" selected>All</option>
                                            <?php
                                            // Retrieve unique batch_id values from the database
                                            include "conn.php";

                                            $sql = "SELECT DISTINCT batch_id FROM ims_task";
                                            $result = $conn->query($sql);

                                            // Check if there are any rows returned
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $batch_id = $row['batch_id'];
                                                    echo '<option value="' . $batch_id . '">' . $batch_id . '</option>';
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
                            <h4 class="card-title">Manage Form</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Date of Action</th>
                                            <th>Author Name</th>
                                            <th>Batch ID</th>
                                            <th>Trainer ID</th>
                                            <th>Trainer Name</th>
                                            <th>Course Name</th>
                                            <th>Task ID</th>
                                            <th>Intern ID</th>
                                            <th>Intern Name</th>
                                            <th>Task start date</th>
                                            <th>Task end date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "conn.php";

                                        // Query to retrieve the data
                                        $sql = "SELECT * FROM `ims_task` WHERE create_status = 0";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['id'] . "</td>";
                                                echo "<td>" . $row['date_of_action'] . "</td>";
                                                echo "<td>" . $row['author_name'] . "</td>";
                                                echo "<td>" . $row['batch_id'] . "</td>";
                                                echo "<td>" . $row['trainer_id'] . "</td>";
                                                echo "<td>" . $row['trainer_name'] . "</td>";
                                                echo "<td>" . $row['course_name'] . "</td>";
                                                echo "<td>" . $row['unique_id'] . "</td>";
                                                echo "<td>" . $row['intern_id'] . "</td>";
                                                echo "<td>" . $row['intern_name'] . "</td>";
                                                echo "<td>" . $row['task_start_date'] . "</td>";
                                                echo "<td>" . $row['task_end_date'] . "</td>";
                                                echo '<td>';
                                                echo "<div class='dropdown'>";
                                                echo "<button class='btn btn-secondary dropdown-toggle' type='button' id='actionDropdown" . $row['id'] . "' data-bs-toggle='dropdown' aria-expanded='false'>Actions</button>";
                                                echo "<ul class='dropdown-menu' aria-labelledby='actionDropdown" . $row['id'] . "'>";
                                                echo "<li><a class='dropdown-item' href='viewinterntask.php?id=" . $row['id'] . "'>View</a></li>";
                                                echo "<li><a class='dropdown-item' href='updateinterntask.php?id=" . $row['id'] . "'>Update</a></li>";
                                                echo "<li><a class='dropdown-item' href='deletetask.php?id=" . $row['id'] . "' onclick='return confirmDelete(" . $row['id'] . ")'>Delete</a></li>";
                                                echo "</ul>";
                                                echo "</div>";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='13'>No data found.</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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
    <!--**********************************
            Content body end
        ***********************************-->

    <!--**********************************
            Footer start
        ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed by <a href="https://www.mycompany.org.in" target="_blank">MY Company</a>
                2023</p>
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
            var selectedDateOfAction = document.getElementById("filter1").value;
            var selectedCourseName = document.getElementById("filter2").value;
            var selectedTrainerName = document.getElementById("filter3").value;
            var selectedBatchId = document.getElementById("filter4").value;

            // Get all the rows in the table
            var tableRows = document.querySelectorAll("#example tbody tr");

            // Loop through each row and show/hide based on the selected filters
            for (var i = 0; i < tableRows.length; i++) {
                var row = tableRows[i];
                var dateOfActionCell = row.cells[1].innerText; // Assuming Date of Action is the 2nd cell (index 1)
                var courseNameCell = row.cells[6].innerText; // Assuming Course Name is the 7th cell (index 6)
                var trainerNameCell = row.cells[5].innerText; // Assuming Trainer Name is the 6th cell (index 5)
                var batchIdCell = row.cells[3].innerText; // Assuming Batch ID is the 4th cell (index 3)

                var showRow = true;

                // Filter based on "Filter 1" (Date of Action)
                if (selectedDateOfAction !== "all" && dateOfActionCell !== selectedDateOfAction) {
                    showRow = false;
                }

                // Filter based on "Filter 2" (Course Name)
                if (selectedCourseName !== "all" && courseNameCell !== selectedCourseName) {
                    showRow = false;
                }

                // Filter based on "Filter 3" (Trainer Name)
                if (selectedTrainerName !== "all" && trainerNameCell !== selectedTrainerName) {
                    showRow = false;
                }

                // Filter based on "Filter 4" (Batch ID)
                if (selectedBatchId !== "all" && batchIdCell !== selectedBatchId) {
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
            document.getElementById("filter3").value = "all";
            document.getElementById("filter4").value = "all";

            filterPosts(); // Apply the default filter values
        }

        function confirmDelete(id) {
            return confirm("Are you sure you want to delete the record with ID: " + id + "?");
        }
    </script>

</body>

</html>
