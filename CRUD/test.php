<?php

$pass1="hello";
$pass2="hell";
$enc_pass1=md5($pass1);

echo $pass1 ."--".$enc_pass1;
if(md5($pass2) == $enc_pass1){
    echo "same";
}else{
    echo "wrong";

}




?>