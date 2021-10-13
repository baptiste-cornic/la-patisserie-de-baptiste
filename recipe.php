<?php

require_once('application/models/RecipeModel.php');


if(isset($_GET['id']))
{
    $getid =  $_GET['id'];
    $id = [$getid];
    $model = new RecipeModel();
    $recipe = $model->getOneRecipeValidate($id);
    
    // j'utilise recipe[0] car sinon il arrive a passer
    if(empty($recipe[0]))
    {
        header('Location: index.php');
    }
    require_once('application/views/recipe.phtml');
}
else {
    header('Location: index.php');
}


