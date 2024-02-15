<?php
if(!isset($_SESSION['admin_name'])){
    header('location:admin_login.php');
}
// else{
// header('location:index.php');
// }
include_once('../includes/DBconnection.php');
$conn=DBconnection::connect();
if (isset($_POST['brand_name'])) {
    $br_title = $_POST['brand_title'];
    $select = "SELECT * FROM brand where brand_title='$br_title'";
    $resu = mysqli_query($conn, $select);
    if (mysqli_num_rows($resu) > 0) {
        echo '<script>
        alert("Category already  exist in database store")
        window.location="index.php";
        </script>
        ';
        
    } else {
        $insert_query = "INSERT into brand (brand_title) values ('$br_title')";
        $result = mysqli_query($conn, $insert_query);
        if ($result) {
            echo '<script>
        alert("Brand have been inserted successfully!!!")
        window.location="index.php?view_brand";
        </script>
        ';
        }
    }
}
?>
<h2 class="text-center">Insert Brands</h2>


<form action="" method="post" class="mb-2">
    <div class="input-group  m-auto mb-3 m-auto">
        <span class="input-group-text text-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i> </span>
        <input type="text" class="form-control " name="brand_title" placeholder="Insert Brands" aria-label="brand" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-3 w-50 m-auto">
        <button type="submit " class="bg-info p-2 my-3 border-0" name="brand_name">Insert Brands</button>
        <!-- <button class="form-control bg-info p-2 m-3 w-10 border-0">Insert cat</button> -->
    </div>

</form>