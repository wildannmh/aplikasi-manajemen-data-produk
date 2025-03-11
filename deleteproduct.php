<?php
require_once 'product.php';

if (isset($_GET['id'])) {
    $product = new Product();
    $product->delete($_GET['id']);
}
header("Location: listproduct.php");
?>
