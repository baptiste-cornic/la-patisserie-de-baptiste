<?php

require_once('application/models/RecipeModel.php');

$search = $_GET['header_research'];

$model = new recipeModel();
$recipes = $model->getSpecificRecipe($search);

require_once('application/views/recipeSearch.phtml');
        

    
