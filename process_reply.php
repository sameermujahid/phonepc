<?php
// Assuming you have retrieved the selected Task_id from the previous page
$selected_task_id = isset($_POST['selected_task_id']) ? $_POST['selected_task_id'] : null;

if (isset($_POST['submitReply'])) {
    // Retrieve the submitted reply and employee details from the form
    $reply = $_POST['replyTask'];
    $employeeId = $_POST['employeeId']; // Replace with the actual name of the input field
    $employeeName = $_POST['employeeName']; // Replace with the actual name of the input field

    // Insert the reply and employee details into the "reply_task" table
    include "conn.php"; // Include the database connection

    $insertSql = "INSERT INTO reply_task (Task_id, Date_of_reply, Employee_id, Employee_name, Created_user_roles, Last_updated_by, last_user_roles, replies, create_status) VALUES (?, NOW(), ?, ?, ?, ?, ?, ?, 1)";
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bind_param("sssssss", $selected_task_id, $employeeId, $employeeName, $createdUserRoles, $lastUpdatedBy, $lastUserRoles, $reply);
    $insertStmt->execute();

    if ($insertStmt->affected_rows > 0) {
        echo "Reply submitted successfully.";
        
        // Redirect to managetask.php or the desired page
        header("Location: managetask.php");
        exit(); // Terminate the current script
    } else {
        echo "Failed to submit the reply.";
    }

    // Close the prepared statement
    $insertStmt->close();

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid form submission.";
}
?>
