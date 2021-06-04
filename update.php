<?php
include('includes/functions.php');

if(isset($_POST['btnUpdate'])) : update($_POST['name'],$_POST['date'],$_POST['price'], $_POST['id']);
endif;

$car = (isset($_GET['id'])) ? selectSingle($_GET['id']):false;
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

<?php if ($car!=false): ?>

    <h1>Updates On The System</h1>

 <form action="" method="POST" class="form">

 <input type="hidden" name="id" value="<?php echo $car['id']; ?>">
 
 <label for="name">Name</label>
 <input type="text" name="name" id="name" class="form-control" value="<?php echo $car['name']; ?>">
 <br>

 <label for="date">Date</label>
 <input type="date" name="date" id="date" class="form-control" value="<?php echo $car['date']; ?>">
 <br>

 <label for="price">Price</label>
 <input type="number" name="price" id="price" class="form-control" value="<?php echo $car['price']; ?>">
 <br>

 <button name="btnUpdate" class="btn btn-success">Update</button>

 </form>

<?php else: ?>
<h1>Car Is Not Set</h1>
<?php endif; ?>

<?php include('style/footer_scripts.php'); ?>

</body>
</html>