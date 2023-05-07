<?php
$host="localhost";
$user="root";
$pass="";
$db="college";

$conn = new mysqli($host,$user,$pass,$db);

$sql = "CREATE TABLE student 
(student_id INT(8) AUTO_INCREMENT PRIMARY KEY,
student_name VARCHAR(32) NOT NULL,
student_email VARCHAR(32) NOT NULL,
student_password VARCHAR(32) NOT NULL,
student_class VARCHAR(32) NOT NULL,
student_image VARCHAR(255) NOT NULL,
)";
if($conn->query($sql) ==TRUE){
echo "Table has been created";
}

?>