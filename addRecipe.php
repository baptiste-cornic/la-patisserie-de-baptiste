<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if( isset($_SESSION['connected']) == false )
{
    header('Location: login.php');
}

require_once('application/views/addRecipe.phtml');

// retire l'erreur si je retourne sur la page
unset($_SESSION["recipe_mistake"]);



