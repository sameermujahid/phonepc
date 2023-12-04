<?php
// Your database connection code (assuming you have already included "conn.php")
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["task_id"]) && isset($_POST["user_status"])) {
        $task_id = $_POST["task_id"];
        $user_status = $_POST["user_status"];

        // Perform some validation on $post_id and $user_status if needed

        // Update the user_status in the database based on the post_id
        $update_sql = "UPDATE add_task SET user_status = ? WHERE task_id = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("is", $user_status, $task_id);

        if ($stmt->execute()) {
            // Update successful
            echo "Status updated successfully.";
        } else {
            // Update failed
            echo "Error updating status: " . $stmt->error;
        }

        // Close the statement and database connection
        $stmt->close();
        $conn->close();
    } else {
        // If post_id or user_status is not set
        echo "Invalid parameters.";
    }
} else {
    // If the request method is not POST
    echo "Invalid request method.";
}
?>
