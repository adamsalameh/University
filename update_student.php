<?php
require_once('StudentModel.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $student = new StudentModel();

    if (isset($_POST['student_id'], $_POST['update_student'])) {
        $student_id = $_POST['student_id'];
        $updatedData = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'date_of_birth' => $_POST['date_of_birth'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
        ];

        if ($student->updateStudent($student_id, $updatedData)) {
            echo "Student updated successfully. <a href='index.php' class='button-link'>Students List</a>";
        } else {
            echo "Failed to update student.";
        }
    } else {
        echo "Invalid request: Missing parameters.";
    }
} else {
    echo "Invalid request: Unsupported request method.";
}
?>
