<?php

$mysqli_conn = new mysqli('localhost','root','','autodip','3306');

if($mysqli_conn->connect_error){
    exit('Error Connecting');
}

?>