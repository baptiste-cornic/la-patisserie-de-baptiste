<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once('application/models/ProductModel.php');

if(isset($_GET['id']))
{
    $getid =  $_GET['id'];
    $id = [$getid];
    $model = new ProductModel();
    $product = $model->getOneProduct($id);

     if(empty($product))
    {
        header('Location: shop.php');
    }
    
    require_once('application/views/product.phtml');
}
else {
    header('Location: shop.php');
}
