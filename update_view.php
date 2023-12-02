<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Update Student</h1>
    <div class="update-form-container">
        <?php
        require_once('StudentModel.php');
        $model = new StudentModel();

        if (isset($_GET['student_id'])) {
            $student_id = $_GET['student_id'];
            $student = $model->getStudent($student_id);

            if ($student) {
                echo '<form action="update_student.php" method="post">
                    <input type="hidden" name="student_id" value="' . $student['student_id'] . '">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" value="' . $student['first_name'] . '" required>
                    <br>
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" value="' . $student['last_name'] . '" required>
                    <br>
                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="date" name="date_of_birth" value="' . $student['date_of_birth'] . '" required>
                    <br>
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" value="' . $student['phone'] . '" required>
                    <br>
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="' . $student['email'] . '" required>
                    <br>
                    <button type="submit" name="update_student">Update</button>
                </form>';
            } else {
                echo "Student not found.";
            }
        } else {
            echo "Invalid request: Missing student ID.";
        }
        ?>
    </div>
</body>
</html>
