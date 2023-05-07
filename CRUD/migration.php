<?php
include "server.php";

$sql="CREATE DATABASE college";

if($conn->query($sql)== TRUE){
    echo "database has been created";
}




?>