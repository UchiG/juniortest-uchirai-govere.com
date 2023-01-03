<?php require "connection.php"; ?>

<?php

abstract class Product {
    protected $sku;
    protected $name;
    protected $price;
    
    public function __construct($sku,$name,$price)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }
    public function getSku() {
        return $this->sku;
    }
    public function setSku($sku) {
        $this->sku = $sku;
    }
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function getPrice() {
        return $this->price . " $";
    }
    public function setPrice($price) {
        $this->price = $price;
    }
    abstract public function getProductSpecificAttribute();
}

class DVD extends Product {
    protected $size;

    public function __construct($sku,$name,$price,$size)
    {
        parent::__construct($sku,$name,$price);
        $this->size = $size;
    }
    public function getSize() {
        return "Size: " . $this->size;
    }
    public function setSize($size) {
        $this->size = $size;
    }
    public function getProductSpecificAttribute()
    {
        return $this->getSize() . "MB";
    }
    public function rowcon() {
    }
    
    public function display() { 
            global $connection;
                $rows = mysqli_query($connection, "SELECT * FROM tb_data"); 
                $i = 1;                
            global $rows;              
            foreach($rows as $row):
            echo '<span>SKU: ' . $row['sku'] . '<br></span>';
            echo '<span>Name: ' . $row['name'] . '<br></span>';
            echo '<span>Price: ' . $row['price'] . '$<br></span>';               
            echo '<span>Size: ' . $row['size'] . ' MB<br></span>'; 
            endforeach;
    }
} 
$DVD = new DVD('sku','name','price','size');

class Book extends Product {
    protected $weight;

    public function __construct($sku,$name,$price,$weight) 
    {
        parent::__construct($sku,$name,$price);
        $this->weight = $weight;
    }
    public function getWeight() {
        return "Weight: " . $this->weight;
    }
    public function setWeight($weight) {
        $this->weight = $weight;
    }
    public function getProductSpecificAttribute()
    {
        return $this->getWeight() . "KG";
    }
    public function display() {
                // echo '<span>SKU: ' . $row['sku'] . '<br></span>';
                // echo '<span>Name: ' . $row['name'] . '<br></span>';
                // echo '<span>Price: ' . $row['price'] . '$<br></span>';               
                // echo '<span>Weight: ' . $row['weight'] . 'KG<br></span>'; 
    }
}
$Book = new Book('sku','name','price','weight');
class Furniture extends Product {
    protected $height;
    protected $length;
    protected $width;

    public function __construct($sku,$name,$price,$height,$length,$width)
    {
        parent::__construct($sku,$name,$price);
        $this->height = $height;
        $this->length = $length;
        $this->width = $width;
    }
    public function getHeight() {
        return $this->height;
    }
    public function setHeight($height) {
        $this->height = $height;
    }
    public function getLength() {
        return $this->height;
    }
    public function setLength($length) {
        $this->length = $length;
    }
    public function getWidth() {
        return $this->height;
    }
    public function setWidth($width) {
        $this->width = $width;
    }
    public function getProductSpecificAttribute()
    {
        return "Dimension: " . $this->getHeight() . "x" . $this->getLength() . "x" . $this->getWidth() ;
    }
    public function display() {
                // echo '<span>SKU: ' . $row['sku'] . '<br></span>';
                // echo '<span>Name: ' . $row['name'] . '<br></span>';
                // echo '<span>Price: ' . $row['price'] .'$<br></span>';                           
                // echo '<span>Dimension: ' . $row['height'] . $row['width'] . $row['length'] . '<br></span>'; 
    }
}
$Furniture = new Furniture('sku','name','price','height','width','length');


class ProductCompareController {
    public function show(Product $product) {
        $attribute = $product->getProductSpecificAttribute();
        return $attribute;
    }
}


        