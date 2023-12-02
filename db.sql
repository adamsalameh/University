-- Create the database
CREATE DATABASE University;

-- Switch to the University database
USE University;

-- Create the Student table
CREATE TABLE `Students` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL UNIQUE, 
  `created_date` datetime NOT NULL DEFAULT current_timestamp,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`student_id`)
);


INSERT INTO `Students` (`first_name`, `last_name`, `date_of_birth`, `phone`, `email`) VALUES ('Ahmed', 'Yassin', '1983-03-19', '+359876293916', 'micro.83@hotmail.com');
INSERT INTO `Students` (`first_name`, `last_name`, `date_of_birth`, `phone`, `email`) VALUES ('Jane', 'Doe', '1990-12-19', '+444555666777', 'jane@email.com');
INSERT INTO `Students` (`first_name`, `last_name`, `date_of_birth`, `phone`, `email`) VALUES ('John', 'Doe', '2009-03-19', '+444666555777', 'john@email.com');
