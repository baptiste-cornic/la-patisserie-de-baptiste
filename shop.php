<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once('application/models/ProductModel.php');

$model = new productModel();
$products = $model->getProducts();

require_once('application/views/shop.phtml');