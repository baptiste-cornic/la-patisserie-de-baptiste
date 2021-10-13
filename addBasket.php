<?php

// Ajoute un produit au $_session basket et retourne a shop.php, l'utilisateur ne verra pas cette page

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// verifie que l input quantity est bien rempli
if(!is_numeric ($_POST['quantity']) || empty($_POST['quantity']))
{
    header('Location: product.php?id='.$_POST['product_id']);
    die();
}

$basket = [];
// si il y a deja des produits dans le basket de la session je l'ajoute a l'array
if(isset($_SESSION['basket']))
{
    foreach($_SESSION['basket'] as $item)
    {
        array_push($basket, $item);
    }
}
// si il y a quelque chose dans le post (que je viens d'ajouter un produit au panier) je l'ajoute au tableau $basket, si deja present je l'ajoute 
if(!empty($_POST))
{
    $identical = false;
    for($i = 0; $i < count($basket); $i ++)
    {
        if($_POST['product_id'] == $basket[$i]['product_id'])
        {
            $basket[$i]['quantity'] += $_POST['quantity'];
            $identical = true;
        }      
    }
    if($identical == false)
    {
        array_push($basket, $_POST);
    }
}

// si il le tableau $basket n'est pas vide je redefini la session de basket
if(!empty($basket))
{
    $_SESSION['basket'] = $basket;
}

header('Location: shop.php');
