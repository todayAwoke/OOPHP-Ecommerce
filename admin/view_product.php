
<?php
if(!isset($_SESSION['admin_name'])){
    header('location:admin_login.php');
}
include_once('../includes/DBconnection.php');
$conn=DBconnection::connect();
?>
<head>
    <style>
        .product_image {
            width: 30%;
            height: 30%;
            object-fit: contain;
        }
    </style>
</head>
<h1 class="text-center  text-success">All Products</h1>
<table class="table table-bordered bg-info mt-4">
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product price</th>
            <th>Edit product </th>
            <th>Delete product </th>
    <tbody class="bg-secondary text-light">
        <?php
        
        $get_product = "SELECT * from product";
        $product_result = mysqli_query($conn, $get_product);
        $number = 1;
        while ($row = mysqli_fetch_assoc($product_result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image = $row['product_image1'];
            $product_price = $row['product_price'];
           
        ?>
            <tr class='text-center'>
                <td> <?php echo $number ?></td>
                <td><?php echo $product_title ?></td>
                <td> <img src='./product_images/<?php echo $product_image ?>' class='product_image'> </td>
                <td><?php echo $product_price ?></td>
        
                <td> <a href='index.php?edit_product=<?php echo $product_id ?>' class='text-light'> <i class='fa-solid fa-pen-to-square'></i></a> </td>
                <td> <a href='index.php?delete_product=<?php echo $product_id ?>'   class=" text-light ">  <i class='fa-solid fa-trash'></i></a> </td>



            </tr>
        <?php
            $number++;
        }

        ?>


    </tbody>
</table>

</div>