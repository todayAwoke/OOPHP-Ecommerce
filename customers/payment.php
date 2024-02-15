<?php
include_once('../includes/DBconnection.php');
include_once('../function/Commen_method.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commerce website</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font  awesome  link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <!-- navigation -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <p class="navbar-brand"> <img src="./images/logo.png" class="logo" alt=""> </p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="root.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="User_register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacts.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> <i class="fa-solid fa-cart-shopping"><sup>45</sup></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total price: 645</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0" action="search_product.php" method="get">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <input type="submit" class="btn btn-outline-light" name="search_product" value="Search">
                </form>
            </div>
        </nav>
        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <?php
                //$_SESSION['username']="awoke";
                //echo $_SESSION['username'];
                
                if (!isset($_SESSION['user_name'])) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome Guest</a>
                </li> '";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome  " . $_SESSION['user_name'] . "</a>
                </li> '";
                    //$_SESSION['user_email']
                }
                ?>
                </li>

                <li>
                    <?php
                    //echo $_SESSION['username'];
                    if (!isset($_SESSION['user_name'])) {
                        echo "<li class='nav-item'>
                    <a class='nav-link' href='user_login.php'>LogIn</a>
                </li> '";
                    } else {
                        echo "<li class='nav-item'>
                    <a class='nav-link' href='user_logout.php'>Logout</a>
                </li> '";
                    }
                    ?>
                </li>

            </ul>
        </nav>
        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center"> ALA Store </h3>
            <p class="text-center">We are lucky due to e-commerce </p>
        </div>
        <!-- fourth child -->
        <div class="row">
        <div class="col-md-6  p-0">
                <!--products-->
                
                 <h4> offline  payment option </h4>
                 <ul style="list-style: none;" >
  <li class="text-primary" >Cash</li>
  <li class="text-primary" >Check</li>
 <button class="btn btn-success">  <li class="text-light" > <a class="text-light"  href="account.php"> Bank transfer </a> </li></button>
  <li class="text-primary" >Direct debit</li>
                 </ul>
            </div>
            <div class="col-md-6  p-0">
                <!-- brand to be displayed -->
                <h4> online  payment option </h4>
                <ul style="list-style: none;" >
 <button class="btn btn-success" ><li class="text-light" >  <a href="https://www.paypal.com/" class="text-light" >PayPal</a></li></button>
  <li class="text-primary" >Google Wallet</li>
  <li class="text-primary" >Amazon Pay</li>
  <li class="text-primary" >Apple Pay</li>
  <li class="text-primary" >Visa Checkout</li>
  
</ul>
           
    </div>
    </div>
     

    </div>

    <!--bootstrap js link-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>