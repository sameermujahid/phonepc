<?php
include "conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['taskId'])) {
    $taskId = $_POST['taskId'];

    // Update the task_pending_status to 1 in the add_task table
    $query = "UPDATE add_task SET task_pending_status = 1 WHERE Task_id = '$taskId'";
    $result = $conn->query($query);

    if ($result) {
      echo "Task status updated successfully.";
    } else {
      echo "Error updating task status: " . $conn->error;
    }
  } else {
    echo "Invalid request.";
  }
} else {
  echo "Invalid request method.";
}

// Close the database connection
$conn->close();
?>
