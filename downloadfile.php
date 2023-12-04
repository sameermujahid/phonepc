<?php
// Assuming you have established the database connection
include "conn.php";

// Retrieve the selected task_id from the query string
$selected_task_id = $_GET['task_id'];

// Retrieve the file data and extension from the database for the selected task_id
$sql = "SELECT File, File_extension FROM add_task WHERE Task_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $selected_task_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($file_data, $file_extension);
    $stmt->fetch();

    // Set the appropriate headers for file download
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="file.' . $file_extension . '"');

    // Output the file content
    echo $file_data;
    exit;
} else {
    // File not found or error occurred
    echo "File not found.";
}

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();
?>
