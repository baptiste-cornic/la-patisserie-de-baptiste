<?php

require('SQLModel.php');

class RecipeModel 
{
    
    protected $pdo;
    
    public function __construct()
    {
        $model = new SQLModel();
        $this->pdo = $model->getDatabase();
    }
    
// pour index.php
    public function getRecipes()
    {
        $query = $this->pdo->query('SELECT recipe_name, picture, id FROM recipes WHERE validate = true ORDER BY recipe_name ASC');
        $recipes = $query->fetchAll(PDO::FETCH_ASSOC);
        return $recipes;
    }

// pour recipe.php
    public function getOneRecipeValidate($id)
    {
        $sql = 'SELECT recipes.id, recipes.recipe_name, recipes.picture, recipes.validate, recipes.user_id,
                        users.id, users.lastname, users.firstname
                FROM recipes 
                INNER JOIN users
                ON users.id = recipes.user_id
                WHERE validate = true AND recipes.id = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute($id);
        $info = $query->fetch(PDO::FETCH_ASSOC);
        
        //recupere les ingredients
        $model = new RecipeModel();
        $ingredients = $model->getIngredientsFor($id);
        
        // recupere les consignes
        $model = new RecipeModel();
        $directions = $model->getDirectionsFor($id);
        // rassemble tous mes requetes
        $recipe= [];
        array_push($recipe, $info, $ingredients, $directions);
        
        return $recipe;
    }
    
// pour la fonction "getOneRecipeValidate" et "getOneRecipe"
    public function getIngredientsFor($id)
    {
        $sql = 'SELECT ingredient_name, quantity, unit, recipe_id
                FROM ingredients
                WHERE recipe_id = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute($id);
        $ingredients = $query->fetchAll(PDO::FETCH_ASSOC);
        return $ingredients;
    }
    
// pour la fonction "getOneRecipeValidate" et "getOneRecipe"
    public function getDirectionsFor($id)
    {
        $sql = 'SELECT recipe_id, step
                FROM directions
                WHERE recipe_id = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute($id);
        $directions = $query->fetchAll(PDO::FETCH_ASSOC);
        return $directions;
    }
    
// pour confirmrecipe.php    
    public function insertRecipe($recipe_name, $picture, $user_id)
    {
        $sql ='INSERT INTO recipes( id, recipe_name, picture, validate, user_id ) 
                VALUES (NULL, ?, ?, false, ?)';
                
        $query = $this->pdo->prepare($sql);
        $query->execute([$recipe_name, $picture, $user_id ]);
        
        // recuperer le dernier Id ajouter dans recipes
        $query = $this->pdo->query('SELECT MAX(id) FROM recipes  ');

        $recipe_id = $query->fetch(PDO::FETCH_ASSOC);
        return $recipe_id;
    }
    // modifie le nom de la photo direct apres l'avoir enregistrer, pour confirmrecipe.php    
    public function updatePictureName($picture_name, $id)
    {
        $sql = ' UPDATE recipes SET picture = ?  WHERE id = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute([$picture_name,  $id ]);
    }

// pour confirmrecipe.php    
    public function insertDirections($recipe_id, $step)
    {
         $sql ='INSERT INTO directions( step_order, recipe_id, step ) 
                VALUES (NULL, ?, ?)';
        $query = $this->pdo->prepare($sql);
        $query->execute([$recipe_id, $step]);
    }

// pour confirmrecipe.php        
    public function insertIngredients($ingredient_name, $quantity, $unit, $recipe_id)
    {
        $sql ='INSERT INTO ingredients( ingredient_name, quantity, unit, recipe_id )
                VALUES (?, ?, ?, ?)';
        $query = $this->pdo->prepare($sql);
        $query->execute([$ingredient_name, $quantity, $unit, $recipe_id]);
    }

// pour adminrecipes.php
    public function getAllRecipes()
    {
        $query = $this->pdo->query('SELECT recipe_name, picture, id, validate FROM recipes  ORDER BY validate ,recipe_name ASC');
        $recipes = $query->fetchAll(PDO::FETCH_ASSOC);
        return $recipes;
    }

// pour adminrecipe.php    
    public function getOneRecipe($id)
    {
        $sql = 'SELECT recipes.id, recipes.recipe_name, recipes.picture, recipes.validate, recipes.user_id,
                        users.id, users.lastname, users.firstname
                FROM recipes 
                INNER JOIN users
                ON users.id = recipes.user_id
                WHERE recipes.id = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute($id);
        $info = $query->fetch(PDO::FETCH_ASSOC);
         //recupere les ingredients
        $model = new RecipeModel();
        $ingredients = $model->getIngredientsFor($id);
        // recupere les consignes
        $model = new RecipeModel();
        $directions = $model->getDirectionsFor($id);
        // rassemble tous mes requetes
        $recipe= [];
        array_push($recipe, $info, $ingredients, $directions);
        
        return $recipe;
    }
    
// pour recipesearch.php
    public function getSpecificRecipe($search)
    {
        $sql = "SELECT * FROM recipes WHERE recipe_name LIKE CONCAT('%', ?, '%') AND validate = true ORDER BY recipe_name ASC  ";
        $query = $this->pdo->prepare($sql);
        $query->execute([$search]);
        $recipes = $query->fetchAll(PDO::FETCH_ASSOC);
        return $recipes;
    }
    
// pour recipeupdate.php
    public function updateRecipe($id)
    {
        $sql = 'UPDATE recipes SET validate = !validate  WHERE id = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute([ $id ]); 
    }

// pour deleterecipe.php
    public function deleteRecipe($id)
    {
        $sql = 'DELETE FROM directions WHERE recipe_id = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute([ $id ]); 
        
        $sql = 'DELETE FROM ingredients WHERE recipe_id = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute([ $id ]);
        
        $sql = 'DELETE FROM recipes WHERE id = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute([ $id ]);
    }
}



