<?php
include "server.php";
$err='';
session_start();
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
 $sql = "SELECT * FROM student WHERE student_email='$email' AND student_password = '$password'";
 $result=$conn->query($sql);
if($result->num_rows>0){
    $row=$result->fetch_assoc();
    $_SESSION['login_id']=$row['student_id'];
    $_SESSION['login_name']=$row['student_name'];
    header("Location: dashboard.php");
}else{
$err="Username and password not matched";
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
    <h1>Login</h1>
    <?php echo $err ?>
    <form action="" method="POST"> 
        <label for="email">email</label>
        <input type="email" name="email"> <br>
        <label for="password">password</label>
        <input type="password" name="password"><br>
        <button type="submit" name="submit">Login</button>

    </form>
</body>

</html>