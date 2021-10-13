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

$id = $_GET['id'];
$model = new RecipeModel();
$recipe = $model->getOneRecipe([$id]);

require_once('application/views/adminRecipe.phtml');
