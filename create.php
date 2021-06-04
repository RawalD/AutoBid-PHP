<?php
include('includes/functions.php');

if(isset($_POST['btnInsert'])) : insert($_POST['name'],$_POST['date'],$_POST['price']);
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoDip</title>
    <?php include('style/header_scripts.php'); ?>

</head>
<body>
<?php include('style/header.php'); ?>
    <h1>Insert Into The System</h1>

 <form action="" method="POST" class="form">
 
 <label for="name">Name</label>
 <input type="text" name="name" id="name" value="" class="form-control">
 <br>

 <label for="date">Date</label>
 <input type="date" name="date" id="date" value="" class="form-control">
 <br>

 <label for="price">Price</label>
 <input type="number" name="price" id="price" value="" class="form-control">
 <br>

 <button name="btnInsert" class="btn btn-success">Insert</button>

 </form>

 <?php include('style/footer_scripts.php'); ?>

</body>
</html>