<?php

// verifie que la session est pas deja ouverte
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if( isset($_SESSION['connected']) == true )
{
    header('Location: index.php');
}

require_once('application/models/UserModel.php');

if(!empty($_POST))
{
   $email = $_POST['email'];
   $password = $_POST['password']; 
   $model = new UserModel();
   $user = $model->getUser($email, $password);
   
   // verifie que la requete est bonne
   if(!empty($user))
   {
       $_SESSION['connected'] = true;
       $_SESSION['user'] = $user;
       if(empty($_SESSION['basket']))
       {
           header('Location: index.php');
       }
       else{
           header('Location: basket.php');
       }
   }
   else {
       $wrongConnection = "Le nom d'utilisateur ou le mot de passe est incorrect.";
   }
}

require_once('application/views/login.phtml');