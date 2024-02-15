<?php
include_once('../includes/DBconnection.php');

class Commen_method{

function getproduct()
{
     
     $conn=DBconnection::connect();
   
       if (!isset($_GET['brand'])) {
            $select = "SELECT * from product  order by rand() LIMIT 6";
            $result = mysqli_query($conn, $select);
            while ($rows = mysqli_fetch_assoc($result)) {
                $product_id = $rows['product_id'];
                $product_title = $rows['product_title'];
                $product_desc = $rows['product_description'];
                $product_image1 = $rows['product_image1'];
                $product_price = $rows['product_price'];
                $brand_id = $rows['brand_id'];
                echo "
                    <div class='col-md-4 mb-3'>
                        <div class='card'>
                            <img src='../admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_desc</p>
                                <span class='card-text text-primary'>current price $product_price </span><br>
                                <a href='cart.php ? cart_id=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_detail.php ? product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>
                        ";
            }
        }
}


//get all products
function get_all_product()
{
    $conn=DBconnection::connect();
    //global $con;
    // if (!isset($_GET['category'])) {
       if (!isset($_GET['brand'])) {
            $select = "SELECT * from product order by rand()";
            $result = mysqli_query($conn, $select);
            while ($rows = mysqli_fetch_assoc($result)) {
                $product_id = $rows['product_id'];
                $product_title = $rows['product_title'];
                $product_desc = $rows['product_description'];
                $product_image1 = $rows['product_image1'];
                $product_price = $rows['product_price'];
                
                $brand_id = $rows['brand_id'];
                echo "
                    <div class='col-md-4 mb-3'>
                        <div class='card'>
                        <img src='../admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_desc</p>
                                <span class='card-text text-primary'>current price $product_price </span><br>
                                <a href='cart.php? cart_id=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_detail.php ? product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>      ";
            }
        }
}

// get unique category

//get unique brand
function get_unique_brand()
{
    $conn=DBconnection::connect();
    if (isset($_GET['brand'])) {
        $brad_id = $_GET['brand'];
        
        $select = "SELECT * from product where brand_id='$brad_id'";
        $result = mysqli_query($conn, $select);
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
            echo '<h2 class="text-danger text-center">there is no this kind of brand in store </h2> ';
        }
        while ($rows = mysqli_fetch_assoc($result)) {
            $product_id = $rows['product_id'];
            $product_title = $rows['product_title'];
            $product_desc = $rows['product_description'];
            $product_image1 = $rows['product_image1'];
            $product_price = $rows['product_price'];
            $brand_id = $rows['brand_id'];
            echo "
                    <div class='col-md-4 mb-3'>
                        <div class='card'>
                        <img src='../admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_desc</p>
                                <span class='card-text text-primary'>current price $product_price </span><br>
                                <a href='cart.php? cart_id=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_detail.php ? product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>
                        ";
        }
    }
}
//get brands
function getbrand()
{
    $conn=DBconnection::connect();
    $query = "SELECT * from brand ";
    $result = mysqli_query($conn, $query);
    while ($row_data = mysqli_fetch_assoc($result)) {
        $brand_tit = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];

        echo "<li class='nav-item '>
        <a href='root.php?brand=$brand_id' class='nav-link text-light'> $brand_tit </a>
    </li>";
    }
}
//get category function

// search product
function search_product()
{
    $conn=DBconnection::connect();
    //global $con;
   
    if (isset($_GET['search_product'])) {
        $search_value = $_GET['search_data'];
        if($search_value==''){
            echo '<h2 class="text-danger text text-center">Search product please... </h2>';
            
        }
        else {
        $select = "SELECT * from product where product_keyword like '%$search_value%'";
        $result = mysqli_query($conn, $select);
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
            echo '<h2 class="text-danger text text-center">there is no this kind of brand in store </h2>';
            //echo $search_value;

        }
        while ($rows = mysqli_fetch_assoc($result)) {
            $product_id = $rows['product_id'];
            $product_title = $rows['product_title'];
            $product_desc = $rows['product_description'];
            $product_image1 = $rows['product_image1'];
            $product_price = $rows['product_price'];
           
            echo "
                    <div class='col-md-4 mb-3'>
                        <div class='card'>
                        <img src='../admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_desc</p>
                                <span class='card-text text-primary'>current price $product_price </span><br>
                                <a href='cart.php? cart_id=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_detail.php ? product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>
                        ";
        }
    }}
}
function product_detail()
{   $conn=DBconnection::connect();
    if (isset($_GET['product_id'])) {
       
         if (!isset($_GET['brand'])) {
               $id = $_GET['product_id'];
                $select = "SELECT * from product where product_id='$id' order by rand() ";
                $result = mysqli_query($conn, $select);
                while ($rows = mysqli_fetch_assoc($result)) {
                    $product_id = $rows['product_id'];
                    $product_title = $rows['product_title'];
                    $product_desc = $rows['product_description'];
                    $product_image1 = $rows['product_image1'];
                    $product_image2 = $rows['product_image2'];
                    $product_image3 = $rows['product_image3'];
                    $product_price = $rows['product_price'];

                    $brand_id = $rows['brand_id'];
                    echo "
                    <div class='col-md-4 mb-3'>
                        <div class='card'>
                        <img src='../admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                     
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_desc</p>
                                <span class='card-text text-primary'>current price $product_price </span><br>
                                <a href='cart.php? cart_id=$product_id' class='btn btn-info'>Add to cart</a>
                                
                            </div>
                        </div>
                    </div>
                    <div class=col-md-8>
                        
                        <div class='row'>
                            <div class='col-md-12'>
                                <h4 class='text-center text-info'>products details</h4>
                            </div>
                        <div class='col-md-6'>
                        <img src='../admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                        </div>
                        <div class='col-md-6'>
                        <img src='../admin/product_images/$product_image3' class='card-img-top' alt='$product_title'>  
                        </div>
                    </div>
                </div>   
                ";
                }
            }
        }
}}