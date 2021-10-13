'use strict';

document.addEventListener('DOMContentLoaded', function (){
    
    quantity.addEventListener('focusout', check_quantity);
    btn.addEventListener('click', check_input);
});

let quantity = document.querySelector('#quantity');
let btn = document.querySelector('#add_basket');

// mets l'input en rouge si l'utilisateur rentre autre chose qu'un nombre 
function check_quantity()
{
    if(isNaN(quantity.value) )
    {
        quantity.classList.add("red_border");
    }
    else {
        quantity.classList.remove("red_border");
    }
}


// verifie que l'input soit pas vide
function check_input()
{
    if( quantity.value == "")
    {
        quantity.classList.add("red_border");
        event.preventDefault();
    }
    else {
        quantity.classList.remove("red_border");
    }
}


