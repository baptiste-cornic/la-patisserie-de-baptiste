<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// si l'utilisateur n'est pas admin il retourne a l'index
if($_SESSION['user']['admin'] == false) 
{
    header('Location: index.php');
}

// si l'id n'existe pas 
if(isset($_GET['id']) == false)
{
    header('Location: index.php');
}

require_once('application/models/UserModel.php');

$id = $_GET['id'];

$model = new UserModel();
$user = $model->getUserWithId($id);

// Mets la date en version francaise
$date = $user['inscription_date'];  
$new_date = date("d-m-Y", strtotime($date));  
$user['inscription_date'] = $new_date;

require_once('application/views/user.phtml');