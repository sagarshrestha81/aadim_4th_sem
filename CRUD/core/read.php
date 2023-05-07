<?php

include "../server.php";
$sql = "SELECT * FROM student";

$result = $conn->query($sql);
// print_r($result);
if(isset($_POST['delete_item'])){
    $id = $_POST['delete_item'];

    $sql_delete="DELETE FROM student 
    WHERE student_id='$id'";
    if($conn->query($sql_delete) === TRUE)
    {
        echo "data has been deleted";
        header("Location: read.php");
    }else{
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
   <style>
    td img{
        width: 100px;
    height: 100px;
    object-fit: cover;
    }
   </style>
       <h1>Read and Delete</h1>
    <a href="./create.php">Create</a>
    <h1>Students list</h1>
    <table border="1">
        <tr>
            <th>sn</th>
            <th>name</th>
            <th>class</th>
            <th>image</th>
            <th>Action</th>
        </tr>
        <?php
                 if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) 
                {
                     
                echo "<tr>" .
                    "<td>" . $row['student_id'] . "</td>" .
                    "<td>" . $row['student_name'] . "</td>" .
                    "<td>" . $row['student_class'] . "</td>" .
                    "<td><img src='images/" . $row['student_image'] . "'></td>" .
                    "<td>
                  <a href='update.php?edit_id=".$row['student_id']."'>edit</a>
                    <form action='' method='POST'>
                    <button type='submit' name='delete_item'
                     value=".$row['student_id'].">DELETE</button>
                    </form>
                    </td>".
                    "</tr>";
            }
        }

        ?>
    </table>

</body>

</html>