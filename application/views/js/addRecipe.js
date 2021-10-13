'use strict';

document.addEventListener('DOMContentLoaded', function (){
    // empeche de valider le form avec la touche entrée, pose de probleme car on a tendance a appuyer dessus 
    // pour ajouter un ingredient ou step 
    $("form").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
    
    add_ingredients_btn.addEventListener('click', addIngredient);
    add_step_btn.addEventListener('click', addStep);
    
    $('.insert_ingredients').on('click',`.fa-times`, remove_ingredient);
    $('.insert_steps').on('click',`.fa-times`, remove_step);
    
    btn_validate.addEventListener('click', check_recipe);
    
    recipe_name_input.addEventListener("focusin", remove_red_border_name);
    picture.addEventListener('click', remove_red_border_picture);
    recipe_step_input.addEventListener('click', remove_red_border_step);
    quantity_input.addEventListener('click', remove_red_border_ingredients);
    unit_input.addEventListener('click', remove_red_border_ingredients);
    ingredient_input.addEventListener('click', remove_red_border_ingredients);

    picture_input.addEventListener('change', check_picture);

    
});

let recipe_name_input = document.querySelector('#recipe_name');

let quantity_input = document.querySelector('#add_recipe_quantity');
let unit_input = document.querySelector('#unit');
let ingredient_input = document.querySelector('#ingredient_name');
let add_ingredients_btn = document.querySelector(".add_ingredients_btn");

let recipe_step_input = document.querySelector("#recipe_step");
let add_step_btn = document.querySelector(".add_step_btn");

let picture = document.querySelector(".add_picture");
let picture_input = document.querySelector('#picture');
let ingredients = [];
let direction = [];

let btn_validate = document.querySelector('.btn_validate');

let check_icon = document.querySelector('.fa-check');

// ajoute l'ingredient dans un tableau et l'affiche si l input name est pas vide
function addIngredient()
{
    // je verifie l'input avec le nom de l'ingredient car les autres pourrait etre vide
    // ( pas de d'unité pour les oeufs, pas toujours de quantité preciser...)
    if(ingredient_input.value != "")
    {
        let ingredient = { 
            quantity :quantity_input.value,
            unit : unit_input.value,
            ingredient_name : ingredient_input.value
        };
        
        ingredients.push(ingredient);
    
        display_ingredients();
        // vide les inputs
        quantity_input.value = "";
        unit_input.value = "";
        ingredient_input.value = "";
    }
}

// affiche l'ingredient et reset l'input
function display_ingredients()
{
    $('.insert_ingredients').html("");
    let ingredient;
   
    for(let i = 0; i < ingredients.length; i++)
    {
         ingredient += `<tr>
                            <td class="table_unit">`+ingredients[i]['quantity']+`</td>
                            <td class="table_unit">`+ingredients[i]['unit']+`</td>
                            <td class="table_ingredient">`+ingredients[i]['ingredient_name']+`</td>
                            <td class="table_delete"><i class="fas fa-times" data-index="`+i+`"></i></td>
                        </tr>`;
    }

    $('.insert_ingredients').append(ingredient);
}

// retire un ingredient
function remove_ingredient()
{
    let data = $(this).data('index');
    
     for(let i = 0; i < ingredients.length; i++)
     {
         if(data == i)
         {
             ingredients.splice(i, 1);
         }
     }
     display_ingredients();
}

// ajoute les etapes de la recettte dans un tableau et l'affiche si l input est pas vide
function addStep()
{
    if(recipe_step_input.value!= "")
    {
        let steps = recipe_step_input.value;
        direction.push(steps);
        display_step();
        recipe_step_input.value = "";
        recipe_step_input.classList.remove("red_border");
    }
}

// affiche les etapes de la recette
function display_step()
{
    let steps;
    $('.insert_steps').html("");
    
    for(let i = 0; i < direction.length; i++)
    {
        steps += `<tr>
                    <td class="explanation">`+direction[i]+`</td>
                    <td class="table_delete"><i class="fas fa-times" data-index="`+i+`"></i></td>
                </tr>` ;
    }
     $('.insert_steps').append(steps);
     
}

// retire une etape de la recette 
function remove_step()
{
    let data = $(this).data('index');
    for(let i = 0; i < direction.length; i++)
     {
         if(data == i)
         {
             direction.splice(i, 1);
         }
     }
     display_step();
}

function save_recipe()
{ 
    // ajoute des inputs avec les ingredients qui etaient stockés dans le tableau "ingredients"
      let ingredient = "" ;
      for(let i = 0; i < ingredients.length; i++)
      {
          ingredient += `<input type="hidden" name="ingredient_`+i+`" value="`+ingredients[i]['quantity']+ `, `+ingredients[i]['unit']+ `, `+ingredients[i]['ingredient_name']+ `" >`;  
      }
      $('.ingredients_recap').append(ingredient);

        let steps  = "";
        for(let i = 0; i < direction.length; i++)
        {
            steps += `<input type="hidden" name="step_`+i+`" value="`+direction[i]+`" >`;
        }
        $('.step_recap').append(steps);
}

// verifie les inputs nom et file, les entoure de rouge si vide
function check_recipe()
{
    let save = true;
    
    if(recipe_name_input.value == "")
    {
        event.preventDefault();
        recipe_name_input.classList.add("red_border");
        scroll(0,0);
        save = false;
    }
    else
    {
        recipe_name_input.classList.remove("red_border");
    }
    
    if(picture_input.value == "")
     {
        event.preventDefault();
        picture.setAttribute('id', 'red_border');
        scroll(0,0);
        save = false;
     }
     else {
         picture.removeAttribute('id');
     }

    // si il n'y a pas d'ingredients enregistreés dans le tableau ingredients ne save pas
    if(ingredients.length <= 0)
    {
        save = false;
        quantity_input.classList.add("red_border");
        unit_input.classList.add("red_border");
        ingredient_input.classList.add("red_border");
    }
    else{
        quantity_input.classList.remove("red_border");
        unit_input.classList.remove("red_border");
        ingredient_input.classList.remove("red_border");
    }
    
    if(direction.length <= 0)
    {
        save = false;
        recipe_step_input.classList.add("red_border");
    }
    else{
        recipe_step_input.classList.remove("red_border");
    }
    
    //  save si tout est rempli
    if(save == true)
    {
        save_recipe();
    }
}

// retire la bordure rouge quand l'utilisateur click sur l'input 
function remove_red_border_name()
{
    recipe_name_input.classList.remove("red_border");
}

function remove_red_border_picture()
{
    picture.removeAttribute('id');
}

function remove_red_border_step()
{
    recipe_step_input.classList.remove("red_border");
}

function remove_red_border_ingredients()
{
    quantity_input.classList.remove("red_border");
    unit_input.classList.remove("red_border");
    ingredient_input.classList.remove("red_border");
}

// si l'utilisateur a mis une photo dans l'input files affiche un icon en vert
function check_picture()
{
    if(picture_input.value != "")
    {
        check_icon.style.display = 'inline-block';
    } 
}

