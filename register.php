<?php
require_once('includes/header.php');
?>
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
<!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
<!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
<!--    <title>Document</title>-->
<!--</head>-->
<!--<body style="background: #dddddd">-->
<!--   <h1 class="display-4">-->
<!--       we are working-->
<!--   </h1>-->

<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container">
        <a href="index.php" class="navbar-brand"><h3>L&T</h3></a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="#" class="nav-link">Home</a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">Services</a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">About</a>
            </li>
        </ul>
    </div>
</nav>

<?php
//    require_once('includes/nav.php')
?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card bg-light mt-5 py-2">
<!--                <p class="text-center text-white bg-danger">--><?php //myfun();?><!--</p>-->
                <div class="card-title">
                    <h3 class="text-center">Register</h3>
                    <hr>
                </div>
                <div class="card-body">
                    <?php user_validation(); ?>
                    <form action="" method="post">
                        <input type="text" class="form-control py-2 mb-2" name="firstname" placeholder="Firstname" required>
                        <input type="text" class="form-control py-2 mb-2" name="lastname" placeholder="Lastname" required>
                        <input type="text" class="form-control py-2 mb-2" name="username" placeholder="Username" required>
                        <input type="email" class="form-control py-2 mb-2" name="email" placeholder="Email" required>
                        <input type="password" class="form-control py-2 mb-2" name="pass" placeholder="password" required>
                        <input type="password" class="form-control py-2 mb-2" name="cpass" placeholder="confirm password" required>
                        <button class="btn btn-success float-right">Register now</button>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once('includes/footer.php');
?>