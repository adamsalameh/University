<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <h1>Add Student</h1>

    <form action="add_student.php" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" required><br>

        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" name="date_of_birth" id="date_of_birth" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <input type="submit" name="add_student" value="Add Student">
    </form>
    <br>
    <?php
    // Handle the form submission
    if (isset($_POST['add_student'])) {
        require_once('StudentModel.php');
        $student = new StudentModel();
        $data = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'date_of_birth' => $_POST['date_of_birth'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
        ];

        $result = $student->createStudent($data);

        if ($result) {
            echo "Student added successfully! <br>";
        } else {
            echo "Error adding the student.";
        }
    }
    ?>

    <!-- Add a link as a button to go to the 'index.php' page -->
    <a href="index.php" class="button-link">Students List</a>

</body>
</html>
