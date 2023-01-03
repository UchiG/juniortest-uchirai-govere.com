<?php

class Database {
    var $host = 'localhost';
    var $username = 'root';
    var $password = '';
    var $dbname = 'data';
    var $tbname = 'tb_data';

    public function connect() {
        // $conn = new mysqli($this->host,$this->username,$this->password,$this->dbname);
        // return $conn;
        $connection = mysqli_connect("localhost","root","","data");
        return $connection;

    }
    public function saveRecords($sku,$name,$price,$size,$weight,$height,$width,$length) {
        $conn = $this->connect();

        mysqli_query($conn,"INSERT INTO " .$this->tbname . "(sku,name,price,size,weight,height,width,length) VALUES ('$sku','$name','$price','$size','$weight','$height','$width','$length')") or die(mysqli_error($conn));

        echo "SUCCESS";
        header('location: product_list2.php');
        // exit;
    }
}
