<?php
include "../server.php";
$edit_id = $_GET['edit_id'];

$sql = "SELECT * FROM student WHERE student_id='$edit_id'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $stu_name = $row['student_name'];
    $stu_class = $row['student_class'];
}
if (isset($_POST['update'])) {
    $student_name = $_POST['student_name'];
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
    $sql_update = "UPDATE student SET student_name='$student_name',
    student_class='$student_class',student_image='$target_file_name' WHERE student_id='$edit_id'";
    if ($conn->query($sql_update) === TRUE) {
        echo "Data has been updated";
        header("Location: read.php");
    } else {
        echo $conn->connect_error;
    }
}

session_start();
print_r($_SESSION);

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
    
    <h1>Update</h1>
    <a href="./read.php">Table</a>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="student_name" placeholder="Name" value="<?php echo $stu_name ?>">
        <input type="number" name="student_class" placeholder="Class" value="<?php echo $stu_class ?>">
        <input type="file" name="student_image" >
        <button type="submit" name="update">update</button>
    </form>
</body>

</html>