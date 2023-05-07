<?php

session_start();
if (!$_SESSION['login_name']) {
    header('Location: login.php');
}
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
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
    <style>
        button {
            float: right;
        }
    </style>
    <form method="POST">
        <button type="submit" name="logout">Logout</button>
    </form>
    <h1>Dashboard</h1>

    Welcome
    <?php echo $_SESSION['login_name'] ?>
</body>

</html>