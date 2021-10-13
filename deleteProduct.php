<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// si l'utilisateur n'est pas admin il retourne a l'index
if($_SESSION['user']['admin'] == false) 
{
    header('Location: index.php');
    die();
}

// si l'id n'existe pas 
if(isset($_GET['id']) == false)
{
    header('Location: index.php');
    die();
}

require_once('application/models/ProductModel.php');

$id = $_GET['id'];

$model = new ProductModel();
$model->deleteProduct($id);

// retire l'image
$picture_name = 'picture_'.$id.'.jpg';
$target_dir = "application/views/images/product/";
unlink($target_dir.$picture_name);


header('Location: adminShop.php');