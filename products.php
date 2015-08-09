<?php
session_start();?>
<!DOCTYPE html>
<html>
<a herf="http://localhost/fcart/logout.php>LOGOUT</a>
</html>
<?php

$page_title="Products";
include 'layout_head.php';
include 'logut.php';
// to prevent undefined index notice
$action = isset($_GET['action']) ? $_GET['action'] : "";
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : "1";
$name = isset($_GET['name']) ? $_GET['name'] : "";

if($action=='added'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> was added to your cart!";
    echo "</div>";
}

if($action=='exists'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> already exists in your cart!";
    echo "</div>";
}

$query = "SELECT id, name, price FROM products ORDER BY name";
$stmt = $con->prepare( $query );
$stmt->execute();

$num = $stmt->rowCount();

if($num>0){

    //start table
    echo "<table class='table table-hover table-responsive table-bordered'>";

        // our table heading
        echo "<tr>";
            echo "<th class='textAlignLeft'>Product Name</th>";
            echo "<th>Price (RS.)</th>";
            echo "<th>Action</th>";
        echo "</tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            //creating new table row per record
            echo "<tr>";
                echo "<td>";
                    echo "<div class='product-id' style='display:none;'>{$id}</div>";
                    echo "<div class='product-name'>{$name}</div>";
                echo "</td>";
                echo "<td>&#x20B9;{$price}</td>";
                echo "<td>";
                    echo "<a href='add_to_cart.php?id={$id}&name={$name}' class='btn btn-primary'>";
                        echo "<span class='glyphicon glyphicon-shopping-cart'></span> Add to cart";
                    echo "</a>";
                echo "</td>";
            echo "</tr>";
        }

    echo "</table>";
  //  echo "<a herf="localhost/fcart/cart.php">VIEW YOUR CART</a>"
}

// tell the user if there's no products in the database
else{
    echo "No products found.";
}
//<?php echo "<a herf="localhost/fcart/cart.php">VIEW YOUR CART</a>"

 ?>
<!DOCTYPE html>
<html>
<h4>TO VIEW SPECIFICATIONS OF THE PRODUCTS:</h4>
<form>
<input type="button" value="click Here" onclick="location.href='http://localhost/fcart/discribed.html';" />
</form>
</html>
