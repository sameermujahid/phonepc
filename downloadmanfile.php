<?php
// Database connection details
include "conn.php";

if (isset($_GET['file_id'])) {
    $fileId = $_GET['file_id'];

    // Retrieve the file data and file extension based on the file_id
    $sql = "SELECT file, file_extension, Doc_name FROM files_adding WHERE Doc_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $fileId);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($fileData, $fileExtension, $fileName);
        $stmt->fetch();

        // Set the appropriate headers for file download
        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream"); // Set a default content type
        header("Content-Disposition: attachment; filename=\"$fileName$fileExtension\"");
        header("Content-Length: " . strlen($fileData));

        // Output the file data
        echo $fileData;
    } else {
        // No file found with the provided file_id
        die("File not found.");
    }
} else {
    // No file_id provided
    die("Invalid request.");
}

$conn->close();
?>