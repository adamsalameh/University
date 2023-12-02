<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Student List</h1>

    <?php
    require_once('StudentModel.php');    
    $student = new StudentModel();
    $students = $student->getStudents();

    if (!empty($students)) {
        echo '<table class="student-table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Student Name</th>';
        echo '<th>Actions</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($students as $student) {
            $studentID = $student['student_id'];
            $firstName = $student['first_name'];
            $lastName = $student['last_name'];

            echo '<tr>';
            echo "<td>$studentID</td>";
            echo "<td>$firstName $lastName</td>";
            echo '<td>';
            echo "<a href=\"student_details.php?student_id=$studentID\">Details</a>";
            echo ' | ';
            echo "<a href=\"update_view.php?student_id=$studentID\">Update</a>";
            echo ' | ';
            echo "<a href=\"student_delete.php?student_id=$studentID\">Delete</a>";
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "No students found in the database.";
    }
    ?>
    <!-- Add a link as a button to go to the 'add_student.php' page -->
    <a href="add_student.php" class="button-link">Add Student</a>
</body>
</html>
