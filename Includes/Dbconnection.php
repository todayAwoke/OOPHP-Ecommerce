<?php
class DBconnection{
    private static $servername='localhost';
    private static $username='root';
    private static $password='';
    private static $dbname='ooecommerce_db';

 static function connect(){
  $conn=mysqli_connect(self::$servername,self::$username,self::$password,self::$dbname);
 if(!$conn){
    die("connection failed".mysqli_connect_error());
 } 
 else {
    return $conn;
 } }
  
}
?>