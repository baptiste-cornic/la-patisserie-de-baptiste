<?php

require_once('application/models/RecipeModel.php');

$model = new recipeModel();
$recipes = $model->getRecipes();

require_once('application/views/index.phtml');
        

    
