<?php
$localserve="localhost";
$username="root";
$password="";
$db="ooecommerce_db";
$conn=mysqli_connect($localserve,$username,$password,$db);
// 
if(!$conn){
    die("connection failed". mysqli_connect_error());
}
else{
    
}