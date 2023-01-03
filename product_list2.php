<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


<?php require "connection.php"; 

if(isset($_POST['delete']) && isset($_POST['deleteId'])) {
    foreach($_POST['deleteId'] as $deleteId) {
        $delete = "DELETE FROM tb_data WHERE id = $deleteId";
        mysqli_query($connection, $delete);
    }
    // header('location: product_list2.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1 id="ProductTitle">Product List</h1> 

    <!-- <table cellpadding = 8 cellspacing = 0 > -->
        <form action="" method="post">
        <div class="button-box">
            <a href="index.php"><input class="boton" type="button" name="submit" value="ADD"></a>
            <input class="boton" id="delete-product-btn" type="submit" name="delete" value="MASS DELETE">        
        </div>                
            <!-- <tr>
                <td><button type= 'submit' name='delete'>Delete</button></td>
                <td>#</td>
                <td>SKU</td>
                <td>Name</td>
                <td>Price</td>
            </tr> -->

    <hr id="hr1">
        <div class="product_list">
                <?php 
                $rows = mysqli_query($connection, "SELECT * FROM tb_data"); 
                $i = 1;
                foreach($rows as $row):
                ?>
            <div class="product">       
                <input class="delete-checkbox" type="checkbox" name="deleteId[]" value="<?php echo $row['id'];?>">
            
                <?php                              
                echo '<span>SKU: ' . $row['sku'] . '<br></span>';
                echo '<span>Name: ' . $row['name'] . '<br></span>';
                echo '<span>Price: ' . $row['price'] . ' $<br></span>';
                if ($row['size'] != 0 ) {              
                    echo '<span>Size: ' . $row['size'] . ' MB<br></span>';
                } 
                if ($row['weight'] != 0 ) {              
                echo '<span>Weight: ' . $row['weight'] . 'KG<br></span>'; 
                } 
                if ($row['height'] != 0 ) {              
                echo '<span>Dimension: ' . $row['height'] ."x". $row['width'] ."x". $row['length'] . '<br></span>'; 
                }                         
 ?>
                
            </div>
                <?php endforeach; ?>   
        </div>      
        </form>
    <!-- </table> -->
    <hr>
    <h5 class ="text-center">Scandiweb Test assignment</h5>
</body>
</html>
                