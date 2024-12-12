<?php
// Include the database connection file
include('admin/dbcon.php');

// Start the session
session_start();

// Get the username and password from the POST request
$username = $_POST['username'];
$password = $_POST['password'];

// Hash the password for secure storage
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Prepare the SQL queries
$stmtStudent = $conn->prepare("SELECT * FROM student WHERE username = ?");
$stmtTeacher = $conn->prepare("SELECT * FROM teacher WHERE username = ?");

// Bind the parameters
$stmtStudent->bind_param("s", $username);
$stmtTeacher->bind_param("s", $username);

// Execute the queries
$stmtStudent->execute();
$stmtTeacher->execute();

// Get the results
$resultStudent = $stmtStudent->get_result();
$resultTeacher = $stmtTeacher->get_result();

// Check if the student exists
if ($resultStudent->num_rows > 0) {
    $row = $resultStudent->fetch_assoc();
    // Verify the password
    if (password_verify($password, $row['password'])) {
        $_SESSION['id'] = $row['student_id'];
        echo 'true_student';
    } else {
        echo 'false';
    }
} elseif ($resultTeacher->num_rows > 0) {
    $row = $resultTeacher->fetch_assoc();
    // Verify the password
    if (password_verify($password, $row['password'])) {
        $_SESSION['id'] = $row['teacher_id'];
        echo 'true';
    } else {
        echo 'false';
    }
} else {
    echo 'false';
}

// Close the statements
$stmtStudent->close();
$stmtTeacher->close();
?>