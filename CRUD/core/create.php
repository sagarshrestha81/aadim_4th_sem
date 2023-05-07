<?php

include "../server.php";
session_start();
print_r($_SESSION);
if (isset($_POST['submit'])) {
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    $student_password = md5($_POST['student_password']);
    $student_class = $_POST['student_class'];
    $target_dir = "images/";
    $target_file_name = basename($_FILES['student_image']['name']);
    $target_file_upload = $target_dir . $target_file_name;
    if (
        move_uploaded_file(
            $_FILES['student_image']['tmp_name'],
            $target_file_upload
        )
    ) {
        echo "file uploaded";
    } else {
        echo "file error";

    }

    $sql = "INSERT INTO student (student_class,student_name,student_email,student_password,student_image) 
    VALUES ('$student_class','$student_name','$student_email','$student_password','$target_file_name')";

    if ($conn->query($sql) == TRUE) {
        echo "Data has been inserted";
    } else {
        echo $conn->connect_error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Create</h1>
    <a href="./read.php">Table</a>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="student_name" placeholder="Name">
        <input type="email" name="student_email" placeholder="Email">
        <input type="password" name="student_password" placeholder="Password">
        <input type="number" name="student_class" placeholder="Class">
        <input type="file" name="student_image" accept="image/*">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>