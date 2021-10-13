<?php

require_once('application/models/UserModel.php');

// verifie que la session est pas deja ouverte
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if( isset($_SESSION['connected']) == true )
{
    header('Location: index.php');
}

if(!empty($_POST))
{
    $post = $_POST;
    $mistake_form = false;
    $firstname = $post['firstname'];
    $lastname = $post['lastname'];
    $address = $post['address'];
    $city = $post['city'];
    $zip_code = $post['zip_code'];
    $country = $post['country'];
    $phone = $post['phone'];
    $email = $post['email'];
    $password = $post['password'];
    
// verification des champs input
    if (empty($firstname) || empty($lastname) || empty($address) || empty($city) || empty($zip_code) ||
        empty($country) || empty($phone) || empty($email) || empty($password))
    {
    	$mistake_form = true;
    }
    
// verifie que l'email n'existe pas deja
    $model = new UserModel();
    $users_email = $model->getEmail();

    foreach($users_email as $user_email)
    {
        if($user_email['email'] == $email)
        {
            $mistake_form = true;
            $_SESSION['email_unavailable'] = true;
        }
    }
    
    if(strlen($zip_code) != 5){
        $mistake_form = true;
    }
    
    if(strlen($password) < 8){
        $mistake_form = true;
    }
    
// si il n'y a pas d'erreurs, on enregistre dans la bd
    if($mistake_form == false)
    {
        
        $model->insertUser($firstname, $lastname, $address, $city, $zip_code,
                        $country, $phone, $email, $password);
        header('Location: index.php');
    }
    
}

require_once('application/views/registration.phtml');

unset($_SESSION["email_unavailable"]); 

