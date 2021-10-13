<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// si l'utilisateur n'est pas admin il retourne a l'index
if($_SESSION['user']['admin'] == false) 
{
    header('Location: index.php');
}

require_once('application/models/RecipeModel.php');

$model = new RecipeModel();
$recipes = $model->getAllRecipes();

require_once('application/views/adminRecipes.phtml');
