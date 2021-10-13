<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if( isset($_SESSION['connected']) == false )
{
    header('Location: login.php');
    die();
}

if(empty($_SESSION['basket']))
{
    header('Location: shop.php');
}

require_once('application/views/validateBasket.phtml');
unset($_SESSION["basket"]); 