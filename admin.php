<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// si l'utilisateur n'est pas connecterr ou admin il retourne a l'index
if($_SESSION['user']['admin'] == false) 
{
    header('Location: index.php');
}

require_once('application/models/UserModel.php');

$model = new UserModel();
$users = $model->getAllUsers();

require_once('application/views/admin.phtml');



