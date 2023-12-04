<?php
// Assuming you have retrieved the selected Task_id from the previous page
$selected_task_id = $_GET['Task_id'];
$selected_id = $_GET['id'];

// Update the create_status to 2 (rejected) in the database
include "conn.php";

$sql = "UPDATE add_task SET create_status = 2 WHERE Task_id = '$selected_task_id'";

if ($conn->query($sql) === TRUE) {
    header('Location: pendingtask.php');
} else {
    echo "Error rejecting task: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
