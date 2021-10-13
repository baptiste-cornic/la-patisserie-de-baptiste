<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$getsearch = $_GET['research'];
$search = [$getsearch];

require_once('application/models/ProductModel.php');

$model = new productModel();
$products = $model->getSpecificProducts($search);

if(empty($products))
{
    $noproducts = 'Aucun de nos produits correspond à votre recherche.';
};

require_once('application/views/productSearch.phtml');

