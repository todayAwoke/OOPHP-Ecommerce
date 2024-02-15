<?php
// Start session
session_start();
require_once ('../includes/DBconnection.php');
class User_login{
  private $username;
  private $password;
 public  function login($username,$password){
    $sql = "SELECT * FROM user_data WHERE user_name='".$username."' AND user_password='".$password."'";
   
    $conn=DBconnection::connect();
    $result=$conn->query($sql);
   if (mysqli_num_rows($result) > 0) {
   $row = mysqli_fetch_assoc($result);
     $_SESSION['user_name']=$row['user_name'];
     header('Location:root.php');  
 } else {
  header('Location:User_login.php');
 }
  } }
  ?>
<?php
// include_once('user_login.php');
if(isset($_POST['submit'])){
  $user_name=$_POST['user_name'];
  $password=$_POST['password'];
$user= new user_login();
$user->login ($user_name,$password);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
</head>
<body>
  
  <?php if(isset($error)): ?>
    <p><?php echo $error; ?></p>
  <?php endif; ?>
  <center>
  <form method="post" class=" w-50 form-signin">
  <h1 class="h3 mb-3 font-weight-normal">User Login</h1>
  <label for="user_name" class="sr-only">user Name</label>
  <input type="text" id="user_name" name="user_name" class="form-control" placeholder="user Name" required autofocus>
  <br>
  <label for="password" class="sr-only">Password</label>
  <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
  <br>
  <button class="btn btn-lg btn-primary  " name="submit" type="submit">Login</button>
  <br>
            <span class= "text-primary"> Haven't  you registered? <a href="User_register.php" >Register</a></span>
</form>
  </center>
</body>
</html>

