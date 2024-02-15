<?php
include_once('../includes/DBconnection.php');

class User_register
{
    private $user_name;
    private $phone;
    private $email;
    private $password;
    private $address;
    private $confirmPassword;

    function __construct($user_name, $phone, $email, $address, $password, $confirmPassword)
    {
        $this->user_name = $user_name;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }

    public  function insert_user()
    {
        $sql = "INSERT INTO user_data (user_name, user_phone, user_email, user_password,  user_address) 
                VALUES ('" . $this->user_name . "','" . $this->phone . "','" . $this->email . "','" . $this->password . "','" . $this->address . "')";
        $conn = DBconnection::connect();
        $result = $conn->query($sql);
        if ($result) {
            echo " <script> Data inserted successfully </script>";
            header('location:User_login.php'); 
        } else {
            echo "Error: " . mysqli_error(DBconnection::connect());
        }
    }
}
if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $connfirmpassword = $_POST['confirmpassword'];
    $address = $_POST['address'];

    $user = new User_register($user_name, $phone, $email, $password, $connfirmpassword,$address);
    $user->insert_user();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }

        form label {
            font-weight: bold;
        }

        .text-primary a {
            color: #007bff;
            text-decoration: none;
        }

        .text-primary a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">User Registration</h1>
        <form method="post" action="" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="user_name">User Name:</label>
                <input type="text" name="user_name" id="user_name" class="form-control" required />
                <div class="invalid-feedback">Please enter a user name.</div>
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
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" class="form-control" required />
                <div class="invalid-feedback">Please enter an address.</div>
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
            <button type="submit" name="submit" class="btn btn-primary btn-block my-3">Register</button>
            <span class="text-primary">Already registered? <a href="User_login.php">Login</a></span>
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