'use strict';

document.addEventListener('DOMContentLoaded', function (){

    document.addEventListener('click', displayNav);
    
});

let display = false;
let nav_btn = document.querySelector('.phone_nav_btn');
let nav = document.querySelector('.phone_nav');

// affiche la nav en cliquant sur l'icon, si je clique en dehors de la nav elle disparait
function displayNav()
{
    if(display == false && nav_btn.contains(event.target)  )
    {
        nav.style.display = "block";
        display = true;
        return;
    }
    
    
    if( !nav.contains(event.target))
    {
        nav.style.display = "none";
        display = false;
    }
}


