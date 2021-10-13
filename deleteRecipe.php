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

require_once('application/models/RecipeModel.php');

$id = $_GET['id'];

$model = new RecipeModel();
$model->deleteRecipe($id);

// retire l'image
$picture_name = 'picture_'.$id.'.jpg';
$target_dir = "application/views/images/recipe/";
unlink($target_dir.$picture_name);

header('Location: adminRecipes.php');