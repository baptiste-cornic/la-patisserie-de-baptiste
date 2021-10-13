<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if( $_SESSION['user']['admin'] == false )
{
    header('Location: index.php');
    die();
}

if($_FILES['picture']['error'] == true)
{
    $_SESSION['product_mistake'] = "Image invalide";   
    header('Location: addProduct.php');
    die();
}

require_once('application/models/ProductModel.php');

$post = $_POST;
$descriptions = [];

// mets dans un tableau les descriptions
for ($i = 0 ; $i < count($post); $i++)
{
    if(isset($post['description_'.$i.''] ))
    {
        array_push($descriptions,$post['description_'.$i.'']);
    }
    else {
        break;
    }
}

// si le prix n'est pas numérique retour sur le form
if(!is_numeric($_POST['product_price']))
{
    header('Location: addProduct.php');
    die();
}

// si l'utilisateur n'a pas mis de description,  retour sur le form
if(empty($descriptions))
{
    header('Location: addProduct.php');
}
else{
// upload de l'image fourni par l'utilisateur
    $picture = $_FILES['picture'];
    $upload_fail  ;
    $target_dir = "application/views/images/product/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["picture"]["tmp_name"]);
    
    if($check == false)
    {
        $uploadOk = 0;
    }

    if($uploadOk == 0)
    {
        $_SESSION['product_mistake'] = "Image invalide";
        header('Location: addProduct.php');
    }
    else{
        move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);

        // envoir dans la bd
        $model = new ProductModel();
        $product_id =  $model->insertProduct($_POST['product_name'], $_POST['product_price'],$picture['name'] );
        $product_id = $product_id['MAX(id)'];

        // renomme les photos avec leur id
        $picture_name = 'picture_'.$product_id.'.jpg';
        $model->updatePictureName($picture_name, $product_id);
        rename($target_file,$target_dir.$picture_name );
        
        foreach($descriptions as $description)
        {
            $model->insertDescriptions($product_id, $description);
        }
        header('Location: adminShop.php');
    }
    
}


