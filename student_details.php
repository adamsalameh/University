<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <h1>Student Details</h1>

    <?php
    require_once('StudentModel.php');

    if (isset($_GET['student_id'])) {
        $student_id = $_GET['student_id'];
        $student = new StudentModel();
        $student_info = $student->getStudent($student_id);

        if ($student_info) {
            echo "Student ID: $student_id<br>";
            echo "First Name: " . $student_info['first_name'] . "<br>";
            echo "Last Name: " . $student_info['last_name'] . "<br>";
            echo "Birthdate: " . $student_info['date_of_birth'] . "<br>";
            echo "Phone: " . $student_info['phone'] . "<br>";
            echo "Email: " . $student_info['email']. "<br>";
        } else {
            echo "Student not found.";
        }
    } else {
        echo "Student ID not provided.";
    }
    ?>
    
    <!-- Add a link as a button to go to the 'index.php' page -->
    <a href="index.php" class="button-link">Students List</a>

</body>
</html>
