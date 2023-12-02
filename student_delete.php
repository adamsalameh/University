<?php
require_once('StudentModel.php');

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['student_id'])) {
    $student = new StudentModel();
    $student_id = $_GET['student_id'];

    if ($student->deleteStudent($student_id)) {
        echo "Student with ID $student_id has been deleted successfully. <a href='index.php' class='button-link'>Students List</a>";
    } else {
        echo "Failed to delete the student.";
    }
} else {
    echo "Invalid request.";
}
