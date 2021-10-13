'use strict';

document.addEventListener('DOMContentLoaded', function (){

    form.addEventListener('submit', checkLogin);
    password_toogle.addEventListener('click', toogle_password);
    email.addEventListener("focusout", remove_red_email);
    password.addEventListener('focusout', remove_red_password);
});


// gere l'affichage du mdp
let password_toogle = document.querySelector('.hide_show');
let show = document.querySelector('.show');
let hide = document.querySelector('.hide');
let input_password = document.querySelector('#password');

// pour mettre en rouge les erreurs
let email = document.querySelector('#email');
let password = document.querySelector('#password');
let form = document.querySelector('#login_form');


// affiche le mot de passe ou non et change l'element cliquable au dessus de l'input
function toogle_password()
{
    hide.classList.toggle('password_display')
    show.classList.toggle('password_display')
    if (input_password.type === "password")
    {
        input_password.type = "text";
    } 
    else 
    {
        input_password.type = "password";
    }
};

// verifie si les input sont bien rempli
function checkLogin()
{
     if(email.value == '')
    {
        event.preventDefault();
        email.classList.add("red_border");
        password.value = "";
        scroll(0,0);
    }
    else
    {
        email.classList.remove("red_border");
    }
    
    
    if(password.value == '' || password.value.length < 8)
    {
        event.preventDefault();
        password.value = "";
        password.classList.add("red_border");
        scroll(0,0);
    }
    else
    {
        password.classList.remove("red_border");
    }
}

// retire le rouge la bordure rouge quand on sort de l'input
function remove_red_email()
{
    email.classList.remove("red_border");
}

function remove_red_password()
{
    password.classList.remove("red_border");
}

