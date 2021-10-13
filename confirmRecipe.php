<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if( isset($_SESSION['connected']) == false )
{
    header('Location: login.php');
}

require_once('application/models/RecipeModel.php');

$ingredients = [];
$steps = [];
$post = $_POST;


// empeche l'utilisateur de mettre un nom de recette trop long
if(strlen($post['recipe_name']) >= 35)
{
    $_SESSION['recipe_mistake'] = "Nom de la recette trop longue";   
    header('Location: addRecipe.php');
    die();
}

if($_FILES['picture']['error'] == true)
{
    $_SESSION['recipe_mistake'] = "Image invalide";   
    header('Location: addRecipe.php');
    die();
}

// mets dans un tableau les ingredients (quantité, unité et nom) puis les etapes de confection
for ($i = 0 ; $i < count($post); $i++)
{
    if(isset($post['ingredient_'.$i.''] ))
    {
        array_push($ingredients,explode("," , $post['ingredient_'.$i.'']));
    }
    else {
        break;
    }
}

for ($i = 0 ; $i < count($post); $i++)
{
    if(isset($post['step_'.$i.''] ))
    {
        array_push($steps,$post['step_'.$i.'']);
    }
    else {
        break;
    }
}

// si l'utilisateur n'a pas donner d'ingredients ou d'etapes de confection de la recette il retourne sur le formulaire
if(empty($ingredients) || empty($steps))
{
    header('Location: addRecipe.php');
}
else
{
    // upload de l'image fourni par l'utilisateur
    $picture = $_FILES['picture'];
    $upload_fail  ;
    $target_dir = "application/views/images/recipe/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["picture"]["tmp_name"]);
 
    if($check == false)
    {
        $_SESSION['recipe_mistake'] = "Image invalide";
        $uploadOk = 0;
    }

    if($check[0] <= $check[1])
    {
        $uploadOk = 0;
        $_SESSION['recipe_mistake'] = "L'image doit etre au format paysage";
    }
    
    if($uploadOk == 0)
    {
        header('Location: addRecipe.php');
    }
    
    else 
    {
        move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
        // envoir dans la BD
        $model = new recipeModel();
        $recipe_id =  $model->insertRecipe(strtolower($_POST['recipe_name']), $picture['name'], $_SESSION['user']['id']);
        $recipe_id = $recipe_id['MAX(id)'];
        
        // renomme les photos avec leur id
        $picture_name = 'picture_'.$recipe_id.'.jpg';
        $model->updatePictureName($picture_name, $recipe_id);
        rename($target_file,$target_dir.$picture_name );
        
        foreach($steps as $step)
        {
            $model->insertDirections($recipe_id, strtolower($step));
        }
        
        foreach($ingredients as $ingredient)
        {  
            $model->insertIngredients(strtolower($ingredient[2]), strtolower($ingredient[0]), strtolower($ingredient[1]), $recipe_id);
        }
    }
}


require_once('application/views/confirmRecipe.phtml');
