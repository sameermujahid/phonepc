<?php
// Database connection
include "conn.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the submitted form data
    $author_id = $_POST['author_id'];
    $author_name = $_POST['author_name'];
    $batch_id = $_POST['batch_id'];
    $trainer_id = $_POST['trainer_id'];
    $trainer_name = $_POST['trainer_name'];
    $type = $_POST['type'];
    $intern_id = $_POST['intern_id'];
    $intern_name = $_POST['intern_name'];
    $course_name = $_POST['course_name'];
    $task_id = $_POST['task_id'];
    $task = $_POST['task'];
    $task_start_date = $_POST['task_start_date'];
    $task_end_date = $_POST['task_end_date'];
    $attachment = $_FILES['attachment'];
    $additional_information = $_POST['additional_information'];
    // Set the default timezone
    date_default_timezone_set('Asia/Kolkata');

    // Get the current date
    $date = date('Ymd');

    // Generate a random 4-digit number
    $randomDigits = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);

    // Create the unique ID by combining the date and random digits
    $uniqueId = $date . $randomDigits;
    
   $targetDir = "uploads/";
   $fileName = basename($attachment["name"]);
   $targetPath = $targetDir . $fileName;
   move_uploaded_file($attachment["tmp_name"], $targetPath);

    // Insert the notification details into the ims-recordings table
    $sql = "INSERT INTO `ims_task` (`unique_id`,`author_id`,`author_name`,`batch_id`,`trainer_id`, `trainer_name`, `type`,`intern_id`, `intern_name`, `course_name`, `task_id`, `task`, `task_start_date`, `task_end_date`, `attachment`, `additional_information` ) VALUES ('$uniqueId', '$author_id','$author_name','$batch_id','$trainer_id', '$trainer_name','$type','$intern_id', '$intern_name', '$course_name', '$task_id','$task', '$task_start_date', '$task_end_date', '$fileName', '$additional_information' )";

    if ($conn->query($sql) === TRUE) {
        // Notification added successfully
        echo "Notification added successfully.";
        header("Location: manageinterntask.php");
    } else {
        // Error occurred while adding notification
        if ($conn->errno == 1062) {
            echo "Error: Duplicate entry. Please try again.";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

// Closing the database connection
$conn->close();
?>
