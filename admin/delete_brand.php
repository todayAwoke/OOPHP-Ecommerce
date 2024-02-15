
<?php
// if(!isset($_SESSION['admin_name'])){
//     header('location:admin_login.php');
// }
include_once('../includes/DBconnection.php');
$conn=DBconnection::connect();
if(isset($_GET['delete_brand'])){
    $brand_id = $_GET['delete_brand'];
    $delete_brand = "DELETE from brand where brand_id=$brand_id";
    $result = mysqli_query($conn, $delete_brand);
    if ($result) {
        echo "<script> alert('brand deleted successfully!!!')</script>";
        echo "<script> window.open('index.php?view_brand','_self')</script>";
    }}
?>