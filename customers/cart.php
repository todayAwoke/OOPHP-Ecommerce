<?php

use function PHPSTORM_META\type;

include('../includes/DBconnection.php');

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart details</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font  awesome  link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .card{
        width: 50px;
        height: 50px;
    }
    .logo{
        width: 50px;
        height: 50px;
    }
</style>
</head>

<body>
    <!-- navigation -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <p class="navbar-brand"> <img src="../images/logo.jpg" class="logo" alt=""> </p>
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
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"> <i class="fa-solid fa-cart-shopping"><sup>  12</sup></i></a>
                    </li>

                </ul>

            </div>
        </nav>
        <!-- calling function -->
        
        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
            <?php
                //echo $_SESSION['username'];
                if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome Guest</a>
                </li> '";
                }
                else{
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome  ".$_SESSION['username']."</a>
                </li> '"; 
                //$_SESSION['User_email']
                }
                
                //echo $_SESSION['username'];
                if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='User_login.php'>LogIn</a>
                </li> '";
                }
                else{
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='User_logout.php'>Logout</a>
                </li> '"; 
                }
                ?>
                </li>

            </ul>
        </nav>
        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center"> Awoke Store </h3>
            <p class="text-center">We are lucky due to e-commerce </p>
        </div>
        <!-- fourth child -->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-borderd text-center">
                        
                        <tbody>
                            <?php
                            $conn=DBconnection::connect();
                            if(isset($_GET['cart_id'])){
                            $product_id=$_GET['cart_id'];    
                            
                            $select = "SELECT * from product where product_id= '$product_id'";
                            $result = mysqli_query($conn, $select);
                            $count=mysqli_num_rows($result);
                            if($count>0){
                                echo "<thead>
                                <tr>
                                    <th>product Title</th>
                                    <th>Image</th>
                                    <th> price</th>
                                    <th> order</th>
                                     </tr>
                            </thead>";


                            } 
                            while ($product_price_row = mysqli_fetch_array($result)) {
                                
                                $price_table = $product_price_row['product_price'];
                                $product_title = $product_price_row['product_title'];
                                $product_image1 = $product_price_row['product_image1'];
                               
                    
                                ?>
                                <tr>
                                    <td><?php echo $product_title ?></td>
                                    
                                    <td> <?php
                                    echo "<img  src='../admin/product_images/$product_image1' class='card' alt='$product_title'>";
                                    ?> </td>          
                                      <td><?php echo $price_table ?></td>
                                      <td> <a href="payment.php?">payment</a>  </td>
                                </tr>
       
                  <?php 
                            }
                  ?>          
             </div>
        </div>
    </div>
    
    <?php
        
                            }
        ?>
    <!--bootstrap js link-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>