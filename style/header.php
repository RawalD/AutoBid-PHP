<?php  
    if(!isset($_SESSION['user'])):
        header('Location: login.php');
        exit();
    endif;
?>

<?php
// $loggedInUser = selectSingleUser($_SESSION['user']['id']);

?>

<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="create.php">Create New</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>