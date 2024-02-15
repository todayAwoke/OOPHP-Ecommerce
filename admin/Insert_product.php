<?php
// if(!isset($_SESSION['admin_name'])){
//     header('location:admin_login.php');
// }
include_once('../includes/DBconnection.php');
$conn=DBconnection::connect();
if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keyword = $_POST['product_keyword'];
    $brand_id = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';
    $product_image1 = $_FILES['product_image1']['name'];
    
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    //access tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];
    //check input as empty
    if (empty($product_title) || empty($description) || empty($product_keyword)  || empty($brand_id) || empty($product_price) || empty($product_image1) || empty($product_image2) || empty($product_image3)) {
        echo '<script> alert("please fill all field!!") 
    
    </script> ';

        exit();
    } else {
        //$up= "upload $product_image1";
        $upload1="product_images/".$product_image1;

        //move_uploaded_file($temp_image1, 'sample_upload/'.$product_image1);
        move_uploaded_file($temp_image1, $upload1);
        $upload2 ="product_images/".$product_image2;
        move_uploaded_file($temp_image2, $upload2);
        $upload3="product_images/".$product_image3;
        move_uploaded_file($temp_image3, $upload3);
        //insert product
        $insert_product = "INSERT into `product` (product_title,product_description,product_keyword,brand_id, product_image1, product_image2, product_image3, product_price,register_date) 
        values ('$product_title','$description','$product_keyword','$brand_id','$product_image1','$product_image2','$product_image3','$product_price',NOW())";
        $result = mysqli_query($conn, $insert_product);
        if ($result) {
            echo "<script> alert('product inserted successfully!!!')
            window.location='index.php?view_product';
                </script> ";
        }
    }}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products admin Dashboard</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font  awesome  link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .label {
            font-style: italic;
        }
    </style>
</head>

<body >
    <div class="container">
        <div class="text-center  mt-2">

            <h1 class="text-primary">Insert Products</h1>
        </div>
        <!-- form -->
        <form action="insert_product.php" method="post" enctype="multipart/form-data">
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_title" class="form label">product title</label>
                <input type="text" class="form-control " name="product_title" id="product_title" placeholder="Enter product title" autocomplete="off" required>
            </div>
            <!-- product description -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="description" class="form label">product description</label>
                <input type="text" class="form-control " name="description" id="description" placeholder="Enter product description" autocomplete="off">
            </div>
            <!-- products key word -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label">product keyword</label>
                <input type="text" class="form-control " name="product_keyword" id="product_keyword" placeholder="Enter product keyword" autocomplete="off" required><br>

            </div>
            <!-- category -->
            
            <!-- brand  -->
            <div class="form outline w-56 mb-4 m-auto">
                <select name="product_brand" id="" class="form-select">
                    <option value="">Select Brands</option>
                    <?php
                    $query = "SELECT * FROM brand";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                       
                        echo "<option value='$brand_id'> $brand_title</option>";
                    }
                    ?>

                </select>
            </div>
            <!-- product image1 -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_image1" class="form label">product image1:</label>
                <input type="file" class="form-control " name="product_image1" id="product_image1" required="required">
            </div>
            <!-- product image2-->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_image2" class="form label">product image2:</label>
                <input type="file" class="form-control " name="product_image2" id="product_image2" required="required">
            </div>
            <!-- product image3 -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_image3" class="form label">product image3:</label>
                <input type="file" class="form-control " name="product_image3" id="product_image3">
            </div>
            <!-- product price -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_price" class="form label"> product price</label>
                <input type="text" class="form-control " name="product_price" id="product_price" placeholder="Enter product price" autocomplete="off">
            </div>

            <div class="form outline w-56  text-center m-auto">
                <input type="submit" class="btn btn-info mt-2 px-3 " name="insert_product" value="Insert product">
                <button class="btn btn-secondary mt-2 text-center" > <a href="index.php" class="btn btn-secondary"> Back</a></button>
                <button class="btn btn-secondary mt-2 text-center" > <a href="../customers/root.php" class="btn btn-success"> Check  </a></button>
            </div>
        </form>
    </div>
</body>

</html>