<?php
// deletefaq.php
include "conn.php"; 
// Check if the 'id' parameter is provided in the URL
if (isset($_GET['id'])) {
    // Assuming you have a database connection already established
    
    // Escape the 'id' parameter to prevent SQL injection
    $id = $conn->real_escape_string($_GET['id']);

    // Update the 'create_status' to 2 in the database
    $sql = "UPDATE ims_task SET create_status = 2 WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Update successful
        header("Location: manageinterntask.php");

    } else {
        // Update failed
        echo "Error updating record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>