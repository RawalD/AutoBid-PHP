<?php
include('includes/functions.php');

if(isset($_POST['btnLogin'])):
    $username = $_POST['username'];
    $password = $_POST['password'];
    login($username, $password);
endif;
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

<?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['message']['type']; ?>" role="alert">
            <?php echo $_SESSION['message']['msg']; ?>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?> 

    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <h1>Hey There! You're At AutoDip!</h1>
                <h3>Login Please</h3>

                <form action="" method="post" class="login">
                <label for="username">Username</label>
                <input type="text" name="username" id='username' class="form-control">
                

                <label for="username">Password</label>
                <input type="password" name="password" id='password' class="form-control">
                
                <button name="btnLogin" class="btn btn-success">Login</button>

                
                </form>



            </div>
        </div>
    </div>

    <?php include('style/footer_scripts.php'); ?>
</body>

</html>