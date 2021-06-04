<?php
include('includes/functions.php');
$allCars = selectAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('style/header_scripts.php'); ?>
    <title>AutoDip</title>
</head>

<body>
<?php include('style/header.php'); ?>

    <div class="container-fluid">
        <h1>Hey There! You're At AutoDip!</h1>

        <table class="table datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            
        </table>

    </div>
    <?php include('style/footer_scripts.php'); ?>
</body>

</html>