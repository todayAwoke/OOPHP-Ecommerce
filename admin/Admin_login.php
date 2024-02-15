
<?php
session_start();
require_once ('../includes/DBconnection.php');

class Admin_login{
private $admin_name;
private $password;
// Prepare and execute SQL query to get admin_ with given admin_name and password

public function login($admin_name,$password){
$sql = "SELECT * FROM admin_data WHERE admin_name='".$admin_name."' AND admin_password='".$password."'";

$conn=DBconnection::connect();
$result=$conn->query($sql);
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
$_SESSION['admin_name']=$row['admin_name'];
header('Location:index.php');

} else {
header('location: admin_login.php');
}
} }
?>

<?php // include_once('admin_login.php'); 
if(isset($_POST['submit'])){ 
  $admin_name=$_POST['admin_name'];
   $password=$_POST['password'];
    $admin= new Admin_login(); 
    $admin->login ($admin_name,$password); 
    } ?> 

    

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-signin {
           width: 430px;
            padding: 20px;
            margin: 0 auto;
            margin-top: 9px;
            background-color: #a8f9fa;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

    </style>
</head>
<body >
    <?php if(isset($error)): ?>
    <p><?php echo $error; ?></p>
  <?php endif; ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="post" class="form-signin">
                    <h1 class="h3 mb-3 font-weight-normal text-center">Admin Login</h1>
                    <label for="admin_name" class="sr-only">Admin Name</label>
                    <input type="text" id="admin_name" name="admin_name" class="form-control" placeholder="Admin Name" required autofocus>
                    <br>
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    <button class="btn btn-lg btn-primary btn-block mt-3" name="submit" type="submit">Login</button>
                    <div class="mt-3 text-center">
                        <span class="text-primary">Haven't registered yet?</span>
                        <a href="Admin_register.php">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>