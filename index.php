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
<?php

// $sql='SELECT * FROM users';
// $query=Query($sql);
// confirm($query);
// $row=fetch_data($query);
// echo $row['Firstname']
?>
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
       <a href="login.php"><button class="btn btn-danger mr-2">Login</button></a>
       <a href="register.php"><button class="btn btn-success">Register</button></a>
   </div>
</nav>
<?php //require_once('includes/nav.php')?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card bg-light mt-5">
                <?php //disp_msg();?>
                 <h3 class="text-center">index page</h3>
            </div>
        </div>
    </div>
</div>
<?php
require_once('includes/footer.php');
?>
