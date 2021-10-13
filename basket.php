<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once('application/models/ProductModel.php');

$basket = [];

// recupere les infos des produits qui ont etaient ajoutés precedement dans la session si la session basket et vide fais rien
if(!empty($_SESSION['basket']))
{
    foreach($_SESSION['basket'] as $product)
    {
        $id = [$product['product_id']];
        $model = new ProductModel();
        $product = $model->getOneProductWithoutDescription($id);
        array_push($basket, $product);
    }
}

$total = 0 ;

for($i = 0; $i<count($basket); $i++)
{
    $total += $_SESSION['basket'][$i]['quantity'] * $basket[$i]['price'];
}

require_once('application/views/basket.phtml');

