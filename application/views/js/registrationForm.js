'use strict';

document.addEventListener('DOMContentLoaded', function (){
     
    password_toogle.addEventListener('click', toogle_password);
    form.addEventListener('submit', checkRegistration);

// retire la bordure rouge quand je sors de l'input
    firstname.addEventListener('focusout', remove_red_firstname);
    lastname.addEventListener('focusout', remove_red_lastname);
    address.addEventListener('focusout', remove_red_address);
    city.addEventListener('focusout', remove_red_city);
    zip_code.addEventListener('focusout', remove_red_zip_code);
    country.addEventListener('focusout', remove_red_country);
    phone.addEventListener('focusout', remove_red_phone);
    email.addEventListener('focusout', remove_red_email);
    password.addEventListener('focusout', remove_red_password);
    
});

// gere l'affichage du mdp
let password_toogle = document.querySelector('.hide_show');
let show = document.querySelector('.show');
let hide = document.querySelector('.hide');
let input_password = document.querySelector('#password');

// pour mettre en rouge les erreurs
let firstname = document.querySelector('#firstname');
let lastname = document.querySelector('#lastname');
let address = document.querySelector('#address');
let city = document.querySelector('#city');
let zip_code = document.querySelector('#zip_code');
let country = document.querySelector('#country');
let phone = document.querySelector('#phone');
let email = document.querySelector('#email');
let password = document.querySelector('#password');
let form = document.querySelector('#registration_form');


// affiche le mot de passe ou non et change l'element cliquable au dessus de l'input
function toogle_password()
{
    hide.classList.toggle('password_display');
    show.classList.toggle('password_display');
    if (input_password.type === "password")
    {
        input_password.type = "text";
    } 
    else 
    {
        input_password.type = "password";
    }
}

// verifie les input, mets une border red si erreur sinon la retire
function checkRegistration()
{

    if(firstname.value == '')
    {
        event.preventDefault();
        firstname.classList.add("red_border");
        password.value = "";
        scroll(0,0);
    }
    else
    {
        firstname.classList.remove("red_border");
    }
    
    if(lastname.value == '')
    {
        event.preventDefault();
        lastname.classList.add("red_border");
        password.value = "";
        scroll(0,0);
    }
    else
    {
        lastname.classList.remove("red_border");
    }
    
    if(address.value == '')
    {
        event.preventDefault();
        address.classList.add("red_border");
        password.value = "";
        scroll(0,0);
    }
    else
    {
        address.classList.remove("red_border");
    }
    
    if(city.value == '')
    {
        event.preventDefault();
        city.classList.add("red_border");
        password.value = "";
        scroll(0,0);
    }
    else
    {
        city.classList.remove("red_border");
    }
    
    if(zip_code.value == '' || zip_code.value.length != 5)
    {
        event.preventDefault();
        zip_code.classList.add("red_border");
        password.value = "";
        scroll(0,0);
    }
    else
    {
        zip_code.classList.remove("red_border");
    }
    
    if(country.value == '')
    {
        event.preventDefault();
        country.classList.add("red_border");
        password.value = "";
        scroll(0,0);
    }
    else
    {
        country.classList.remove("red_border");
    }
    
    if(phone.value == '')
    {
        event.preventDefault();
        phone.classList.add("red_border");
        password.value = "";
        scroll(0,0);
    }
    else
    {
        phone.classList.remove("red_border");
    }
    
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
    }else
    {
        password.classList.remove("red_border");
    }
}


function remove_red_firstname()
{
    firstname.classList.remove("red_border");
}

function remove_red_lastname()
{
    lastname.classList.remove("red_border");
}

function remove_red_address()
{
    address.classList.remove("red_border");
}

function remove_red_city()
{
    city.classList.remove("red_border");
}

function remove_red_zip_code()
{
    zip_code.classList.remove("red_border");
}

function remove_red_country()
{
    country.classList.remove("red_border");
}

function remove_red_phone()
{
    phone.classList.remove("red_border");
}

function remove_red_email()
{
    email.classList.remove("red_border");
}

function remove_red_password()
{
    password.classList.remove("red_border");
}
