<?php
class Db 
{
private $host='localhost';
private $username='root';
private $password='';
private $database='ooecom';
public $db;
 public function __construct(){
    try{
        $dsn ="mysql:host={$this->host};dbname={$this->database};";
        $option =array(PDO::ATTR_PERSISTENT);
        $this->db=new PDO($dsn,$this->username,$this->password,$option);
    }
    catch(PDOException $e){
        echo "connection erro ".$e->getMessage();;
    }
 }
}

?>