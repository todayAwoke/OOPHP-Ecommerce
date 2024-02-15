<?php
 include('Admin_login.php');
 ?>
// include_once('admin_login.php');
if(isset($_POST['submit'])){
  $admin_name=$_POST['admin_name'];
  $password=$_POST['password'];
$admin= new Admin_login();
$admin->login ($admin_name,$password);
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
  <h1 class="h3 mb-3 font-weight-normal">Login</h1>
  <label for="admin_name" class="sr-only">Admin Name</label>
  <input type="text" id="admin_name" name="admin_name" class="form-control" placeholder="Admin Name" required autofocus>
  <br>
  <label for="password" class="sr-only">Password</label>
  <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
  <br>
  <button class="btn btn-lg btn-primary  " name="submit" type="submit">Login</button>
</form>
  </center>
</body>
</html>