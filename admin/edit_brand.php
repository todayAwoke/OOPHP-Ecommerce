<?php
// if(!isset($_SESSION['admin_name'])){
//     header('location:admin_login.php');
// }
//display category title
include_once('../includes/DBconnection.php');
$conn=DBconnection::connect();
if(isset($_GET['edit_brand'])){
    $brand_id=$_GET['edit_brand'];
    $get_brand = "SELECT * from brand where brand_id=$brand_id";
        $brand_result = mysqli_query($conn, $get_brand);
        $fetch=mysqli_fetch_array( $brand_result );
        $brand_title=$fetch['brand_title'];
        //$brand_id=$fetch['brand_id'];
        
}
//update brand
if(isset($_POST['update']))
{
    $brand_title=$_POST['brand_title'];
    $update_brand="UPDATE brand set brand_title='$brand_title' where brand_id=$brand_id ";
    $update_result=mysqli_query($conn,$update_brand);
    if($update_result){
        echo " <script> alert('brand updated successfully!!!') </script>";
        echo " <script> window.open('index.php?view_brand','_self') </script>";
    }
}
?>
<form action="" method="post">
<div class="form-outline m-auto w-50 my-4">
            <label for="" class="form-label"> brand title:</label>
            <input type="text" name="brand_title" class=" form-control  mb-3" value="<?php echo $brand_title ?>" required="required">
        </div>
    <div class="form-outline text-center " >
        <input type="submit" name="update" value="Update name" class=" border-0 px-3 py-2 bg-warning mb-4">
    </div>
</form>