<?php 

class StudentModel {
    private $db;

    public function __construct() {
        // Initialize the database connection        
        $this->db = new PDO('mysql:host=localhost;dbname=University', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getStudents() {
        $query = $this->db->prepare("SELECT * FROM Students ORDER BY student_id ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStudent($student_id) {
        $query = $this->db->prepare("SELECT * FROM Students WHERE student_id = :student_id");
        $query->bindParam(':student_id', $student_id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function createStudent($data) {
        $query = $this->db->prepare("INSERT INTO Students (first_name, last_name, date_of_birth, phone, email) VALUES (:first_name, :last_name, :date_of_birth, :phone, :email)");
        $query->bindParam(':first_name', $data['first_name']);
        $query->bindParam(':last_name', $data['last_name']);
        $query->bindParam(':date_of_birth', $data['date_of_birth']);
        $query->bindParam(':phone', $data['phone']);
        $query->bindParam(':email', $data['email']);
        return $query->execute();
    }

    public function updateStudent($student_id, $data) {
        $query = $this->db->prepare("UPDATE Students SET first_name = :first_name, last_name = :last_name, date_of_birth = :date_of_birth, phone = :phone, email = :email WHERE student_id = :student_id");
        $query->bindParam(':student_id', $student_id, PDO::PARAM_INT);
        $query->bindParam(':first_name', $data['first_name']);
        $query->bindParam(':last_name', $data['last_name']);
        $query->bindParam(':date_of_birth', $data['date_of_birth']);
        $query->bindParam(':phone', $data['phone']);
        $query->bindParam(':email', $data['email']);
        return $query->execute();
    }

    public function deleteStudent($student_id) {
        $query = $this->db->prepare("DELETE FROM Students WHERE student_id = :student_id");
        $query->bindParam(':student_id', $student_id, PDO::PARAM_INT);
        return $query->execute();
    }

    public function __destruct() {
        // Close the database connection
        $this->db = null;
    }
}
