<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">PHP</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-dark" href="./index.php">Home</a>
      <a class="p-2 text-dark" href="./contact.php">Contact</a>
      <?php 
      if($_COOKIE['user']==""){?>
        <a class="p-2 text-light bg-info rounded" href="./registration.php">Registration</a>
        <a class="p-2 text-light bg-info rounded" href="./sign-in.php">Sign In</a>
      <?php }else{?>
        <a class="p-2 text-light bg-info rounded" href="./exit.php">Exit</a>
        
      <?php 
      }
      ?>
      
    </nav>
</div>