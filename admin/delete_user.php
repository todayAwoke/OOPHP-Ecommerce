
<?php
if(!isset($_SESSION['admin_name'])){
    header('location:admin_login.php');
}
if(isset($_GET['delete_account'])){
    $user_id = $_GET['delete_account'];
    echo $user_id;
    //echo $payment_id;
    $delete_payment = "DELETE from user_data where user_id=$user_id";
   
   $conn=DBconnection::connect();
    $result =$conn->query($delete_payment);
    if ($result) {
        echo "<script> alert('user deleted successfully!!!')</script>";
        echo "<script> window.open('index.php)</script>";
    }}
?>