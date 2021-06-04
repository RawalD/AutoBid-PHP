<?php
include('includes/functions.php');
$car = (isset($_GET['id'])) ? delete($_GET['id']) : exit();

?>