<?php
include_once('../includes/DBconnection.php');

class Admin_register {
private $admin_name;
private $phone;
private $email;
private $address;
private $password;
private $photo;
private $confirmPassword;

function __construct($admin_name, $phone, $email, $address, $password,$photo,$confirmPassword) {
    $this->admin_name = $admin_name;
    $this->phone = $phone;
    $this->email = $email;
    $this->address = $address;
    $this->password = $password;
    $this->photo=$photo;
    $this->confirmPassword = $confirmPassword;
}

public  function insert_admin() {
    $sql = "INSERT INTO admin_data (admin_name, admin_phone, admin_email, admin_address, admin_password, admin_photo) 
            VALUES ('".$this->admin_name."','".$this->phone."','".$this->email."','".$this->address."','".$this->password."','".$this->photo."')";
   $conn=DBconnection::connect();
   $result=$conn->query($sql);
    if($result) {
        echo "Data inserted successfully";
         header('Location:index.php  ');
    } else {
        echo "Error: " . mysqli_error(DBconnection::connect());
    }
}}
if(isset($_POST['submit'])){
    $admin_name = $_POST['admin_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address=$_POST['address'];
    $password= $_POST['password'];
    $photo = $_FILES['photo']['name'];
    $image_temp_name = $_FILES['photo']['tmp_name'];
    $image_upload = "upload/$photo";
    move_uploaded_file($image_temp_name, $image_upload);
    $connfirmpassword = $_POST['confirmpassword'];
$admin = new Admin_register($admin_name, $phone, $email,$address, $password,$photo,$connfirmpassword);
$admin->insert_admin();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Registration</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 6px;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }

        form label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Admin Registration</h1>
        <form method="post" action="" class="needs-validation" enctype="multipart/form-data" novalidate>
            <div class="form-group ">
                <label for="admin_name">Admin Name:</label>
                 <input type="text" name="admin_name" id="admin_name" class="form-control" required />
                <div class="invalid-feedback">Please enter an admin name.</div>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" class="form-control" required />
                <div class="invalid-feedback">Please enter a phone number.</div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required />
                <div class="invalid-feedback">Please enter a valid email address.</div>
            </div>
            <div class="form-group">
                <label for="address">address:</label>
                <input type="text" name="address" id="address" class="form-control" required />
                <div class="invalid-feedback">Please enter a address number.</div>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required />
                <div class="invalid-feedback">Please enter a password.</div>
            </div>
            <div class="form-group">
                <label for="confirmpassword">Confirm Password:</label>
                <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" required />
                <div class="invalid-feedback">Please confirm your password.</div>
            </div>
            <div class="form-group">
                <label for="photo">profile:</label>
                <input type="file" name="photo" id="photo" class="form-control" required />
                <div class="invalid-feedback">Please upload photo.</div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block my-3">Register</button>
            <span class= "text-primary"> Are you registered? <a href="Admin_login.php" >Login</a></span>
        </form>
    </div>
    <script>
        // Validate form fields on submit
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var form = document.getElementsByClassName('needs-validation')[0];
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            }, false);
        })();
    </script>
</body>
</html>