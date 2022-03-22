<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>



  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="all-item.php">All medicine</a>
        </li>
      </ul>
      <?php
      
      ?>
      
      
      <!-- <a href="login.php"><button class="btn btn-sm btn-outline-success">Login</button></a> -->
      <?php
      if (isset($_SESSION['id'])) {
        $count = 0;
      if (isset($_SESSION['cart'])) {
        $count = count($_SESSION['cart']);
      }
        // echo '<button type="button" class="btn btn-sm btn-outline-success">'.$_SESSION['name'].'</button>';
        echo '<a href="my_cart.php"><button class="btn btn-outline-success my-2 my-sm-0">Cart item ( '. $count .' )</button></a>';
        echo '<a href="logout.php"><button class="btn  btn-outline-success">Logout</button></a>';
      } else {
        echo '<button type="button" class="btn  btn-outline-success" data-toggle="modal" data-target="#myModal">login</button>';
        echo '<a href=""><button class="btn  btn-outline-success">Register</button></a>';
      }
      ?>


    </div>
  </nav>