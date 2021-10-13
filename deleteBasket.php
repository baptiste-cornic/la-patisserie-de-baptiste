<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// retire le produit avec $_GET['id'] de la page
$basket= $_SESSION['basket'];
$id = $_GET['id'];


for($i = 0; $i < count($basket); $i++)
{
    if($basket[$i]['product_id'] == $id)
    {
        array_splice($basket, $i, 1);
    }
}

$_SESSION['basket'] = $basket;

header('Location: basket.php');