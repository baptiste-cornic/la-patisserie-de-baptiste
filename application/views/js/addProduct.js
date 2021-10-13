'use strict';

document.addEventListener('DOMContentLoaded', function (){

   add_description_btn.addEventListener('click', add_description);
   $('.insert_description').on('click',`.fa-times`, remove_description);
   btn_validate.addEventListener('click', check_product);

// retire les bordure rouge au clic
    product_name_input.addEventListener('click', remove_red_border_name);
    product_price_input.addEventListener('click', remove_red_border_price);
    product_description_input.addEventListener('click', remove_red_border_descritpion);
    picture.addEventListener('click', remove_red_border_picture);

    picture_input.addEventListener('change', check_picture);

});

let product_name_input = document.querySelector('#product_name');
let product_price_input = document.querySelector('#product_price');
let product_description_input = document.querySelector('#product_descriptions');
let picture = document.querySelector('.add_picture');
let picture_input = document.querySelector('#picture');

let add_description_btn = document.querySelector('.add_description_btn');

let btn_validate = document.querySelector('.btn_validate');

let descriptions = [];

let check_icon = document.querySelector('.fa-check');

// ajoute la description dans un tableau et l'affiche
function add_description()
{
    if(product_description_input.value!= "")
    {
        let description = product_description_input.value;
        descriptions.push(description);
        display_descriptions();
        product_description_input.value = "";
        product_description_input.classList.remove("red_border");
    }
}

// affiche les descriptions a  l'aide du tableau
function display_descriptions()
{
    let description;
    $('.insert_description').html("");
    
    for(let i = 0; i < descriptions.length; i++)
    {
        description += `<tr>
                    <td class="explanation">`+descriptions[i]+`</td>
                    <td class="table_delete"><i class="fas fa-times" data-index="`+i+`"></i></td>
                </tr>` ;
    }
     $('.insert_description').append(description);
}

// retire une description 
function remove_description()
{
    let data = $(this).data('index');
    for(let i = 0; i < descriptions.length; i++)
     {
         if(data == i)
         {
             descriptions.splice(i, 1);
         }
     }
     display_descriptions();
}



// verifie les entrés des input et enregistre si complétés
function check_product()
{
    let save = true;

    if(product_name_input.value == "")
    {
        event.preventDefault();
        product_name_input.classList.add("red_border");
        scroll(0,0);
        save = false;
    }
    else{
        product_name_input.classList.remove("red_border");
    }

    if(product_price_input.value == "" || isNaN(product_price_input.value) )
    {
        event.preventDefault();
        product_price_input.classList.add("red_border");
        scroll(0,0);
        save = false;
    }
    else{
        product_price_input.classList.remove("red_border");
    }

    if(descriptions.length <= 0)
    {
        save = false;
        product_description_input.classList.add("red_border");
    }
    else{
        product_description_input.classList.remove("red_border");
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

// si tous est rempli on save
     if(save == true)
     {
        save_descriptions();
     }
     
}

function save_descriptions()
{
    // ajoute des inputs avec les descriptions qui etaient stockés dans le tableau "descrptions"
    let description = "" ;
    for(let i = 0; i < descriptions.length; i++)
    {
        description += `<input type="hidden" name="description_`+i+`" value="`+descriptions[i]+`" >`;
    }
    $('.description_recap').append(description);
}

function remove_red_border_name()
{
    product_name_input.classList.remove("red_border");
}

function remove_red_border_price()
{
    product_price_input.classList.remove("red_border");
}

function remove_red_border_descritpion()
{
    product_description_input.classList.remove("red_border");
}

function remove_red_border_picture()
{
    picture.removeAttribute('id');
}

// si l'utilisateur a mis une photo dans l'input files affiche un icon en vert
function check_picture()
{
    if(picture_input.value != "")
    {
        check_icon.style.display = 'inline-block';
    } 
}