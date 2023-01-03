<?php include "product2.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <title>Product Add</title>
</head>
<body>
    <h1>Product Add</h1>
     <div class="container">
        <div class="col-sm-6">
            <form id="product_form" name="product_form" action="index.php" method="POST" autocomplete="off">
                <div class="button-box">
                    <input class="boton" type="submit" name="submit" value="CREATE" id="createBtn"> 
                    <button class="boton"><a class="cancelBoton" href="product_list2.php">Cancel</a></button>
                </div>
    <hr id="hr1">
                <div class="form-group">
                    <label for="sku">SKU</label>
                    <input class ="form-control" id="sku" type="text" name="sku" required placeholder=""
                    oninvalid="this.setCustomValidity('Please, submit required data')"
                    oninput="this.setCustomValidity('')">
                </div>

                <div class="form-group">
                    <label for="">Name</label>
                    <input class ="form-control" id="name" type="text"  name="name" required placeholder=""
                    oninvalid="this.setCustomValidity('Please, submit required data')"
                    oninput="this.setCustomValidity('')">
                </div>

                <div class="form-group">
                    <label for="">Price ($)</label>
                    <input class ="form-control" id="price" type=number" name="price" required pattern="\d*" oninvalid="
                    this.setCustomValidity('');
                    if (this.value === '') {
                    this.setCustomValidity('Please, submit required data');
                    } else if (!this.validity.valid) {
                    this.setCustomValidity('Please, provide the data of indicated type');
                    }"                
                    oninput="this.setCustomValidity('')">
                </div>
                <br>

                
                <div class="form-group">
                    <label for="">Type Switcher</label>

                    <select  id="selector" name="selector" >                 
                        <option value="typeSwitcher"
                        name="productType">Type Switcher</option>
                        <option id="DVD" value="DVD">DVD</option>
                        <option id="Book" value="Book">Book</option>
                        <option id="Furniture" value="Furniture">Furniture</option>
                    </select>
                    
                </div>

<BR></BR>
                <div class="form-group size visible" id="sizeDiv">
                    <label for="">Size (MB)</label>
                    <input class ="form-control" id="size" type="text" name="size" required pattern="\d*" oninvalid="
                    this.setCustomValidity('');
                    if (this.value === '') {
                    this.setCustomValidity('Please, submit required data');
                    } else if (!this.validity.valid) {
                    this.setCustomValidity('Please, provide the data of indicated type');
                    }"                
                    oninput="this.setCustomValidity('')">
                    <p>Please, provide size</p><br><br>
                </div>

                <div class= "form-group weight visible" id="weightDiv">
                    <label for="">Weight (KG)</label>
                    <input class ="form-control" id="weight" type="text" name="weight" required pattern="\d*" oninvalid="
                    this.setCustomValidity('');
                    if (this.value === '') {
                    this.setCustomValidity('Please, submit required data');
                    } else if (!this.validity.valid) {
                    this.setCustomValidity('Please, provide the data of indicated type');
                    }"                
                    oninput="this.setCustomValidity('')">
                    <p>Please, provide weight</p><br><br>
                </div>

            <div id="dimensionDiv">
                <div class = "form-group dimensions visible">
                    <label for="">Height (CM)</label>
                    <input class ="form-control" id="height" type="text" name="height" required pattern="\d*" oninvalid="
                    this.setCustomValidity('');
                    if (this.value === '') {
                    this.setCustomValidity('Please, submit required data');
                    } else if (!this.validity.valid) {
                    this.setCustomValidity('Please, provide the data of indicated type');
                    }"                
                    oninput="this.setCustomValidity('')"><br>
                </div>

                <div class = "form-group dimensions visible">
                    <label for="">Width (CM)</label>
                    <input class ="form-control" id="width" type="text" name="width" required pattern="\d*" oninvalid="
                    this.setCustomValidity('');
                    if (this.value === '') {
                    this.setCustomValidity('Please, submit required data');
                    } else if (!this.validity.valid) {
                    this.setCustomValidity('Please, provide the data of indicated type');
                    }"                
                    oninput="this.setCustomValidity('')"><br>
                </div>

                <div class = "form-group dimensions visible">
                    <label for="">Length (CM)</label>
                    <input class ="form-control" id="length" type="text" name="length" required pattern="\d*" oninvalid="
                    this.setCustomValidity('');
                    if (this.value === '') {
                    this.setCustomValidity('Please, submit required data');
                    } else if (!this.validity.valid) {
                    this.setCustomValidity('Please, provide the data of indicated type');
                    }"                
                    oninput="this.setCustomValidity('')">
                    <p>Please, provide dimensions</p>
                </div>
            </div>

            <?php 
            // isset($_POST['submit'])
            // $_SERVER['REQUEST_METHOD'] === 'POST'
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                include "database2.php";
                $obj = new Database();
                $obj->connect();

                $sku = $_POST['sku'];

                $result = mysqli_query($connection, "SELECT * FROM tb_data WHERE sku='$sku'");

                if (mysqli_num_rows($result) > 0) {
                  echo "Error: A product with this SKU already exists. Please choose a different SKU.";
                } else {
                $sku = $_POST['sku'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                // $productType = $_POST['productType'];
                $size = $_POST['size'];
                $weight = $_POST['weight'];
                $height = $_POST['height'];
                $width = $_POST['width'];
                $length = $_POST['length'];

                $obj->saveRecords($sku, $name, $price, $size, $weight, $height, $width, $length);
            }
        }
        ?>
            
            </form>

        </div>
    </div>
    <hr>
    <h5 class="text-center">Scandiweb Test assignment</h5> 
    <script src="script.js"></script>
    <!-- <script src="app.js"></script> -->

    <?php include "includes/footer2.php"?>




<?php
            // if(isset($_POST['submit'])) {
            //     include "database2.php";
            //     $sku = $_POST['sku'];
            //     $name = $_POST['name'];
            //     $price = $_POST['price'];
            //     // $productType = $_POST['productType'];
            //     $size = $_POST['size'];
            //     $weight = $_POST['weight'];
            //     $height = $_POST['height'];
            //     $width = $_POST['width'];
            //     $length = $_POST['length'];
    
            //     $obj = new Database();
            //     $obj->connect();
            //     $obj->saveRecords($sku, $name, $price, $size, $weight, $height, $width, $length);
            // };