<?php

require('SQLModel.php');

class productModel
{
    protected $pdo;
    
    public function __construct()
    {
        $model = new SQLModel();
        $this->pdo = $model->getDatabase();
    }
    
// pour shop.php 
    public function GetProducts()
    {
        $query = $this->pdo->query('SELECT * FROM products WHERE validate = true  ORDER BY  name ASC ');   
        $products = $query->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    
// pour adminshop.php
    public function getAllProducts()
    {
        $query = $this->pdo->query('SELECT * FROM products ORDER BY validate, name ASC ');
        $products = $query->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    
//  pour productSearch.php
    public function getSpecificProducts($search)
    {
        $sql = "SELECT * FROM products WHERE name LIKE CONCAT('%', ?, '%') AND validate = true  ORDER BY name ASC  ";
        $query = $this->pdo->prepare($sql);
        $query->execute($search);
        $products = $query->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    
// pour product.php
    public function getOneProduct($id)
    {
        $sql = 'SELECT products.id, products.name, products.image, products.price, products.validate,
                product_description.id, product_description.description, product_description.product_id
                FROM products 
                INNER JOIN product_description
                ON products.id = product_description.product_id
                WHERE products.id = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute($id);
        $product = $query->fetchAll(PDO::FETCH_ASSOC);
        return $product;
    }
    
// pour basket.php
    public function getOneProductWithoutDescription($id)
    {
        $sql = 'SELECT id, name, image, price
                FROM products 
                WHERE id = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute($id);
        $product = $query->fetch(PDO::FETCH_ASSOC);
        return $product;
    }

// pour productupdate.php
    public function updateProduct($id)
    {
        $sql = 'UPDATE products SET validate = !validate WHERE id = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute([ $id ]); 
    }

// pour deleteproduct.php
    public function deleteProduct($id)
    {
        $sql = 'DELETE FROM product_description WHERE product_id = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute([ $id ]);

        $sql = 'DELETE FROM products WHERE id = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute([ $id ]);
    }

// pour insertproduct.php
    public function insertProduct($name, $price, $image)
    {
        $sql ='INSERT INTO products( id, name, price, image, validate ) 
                VALUES (NULL, ?, ?, ?, false)';
        $query = $this->pdo->prepare($sql);
        $query->execute([$name, $price, $image ]);

        // recuperer le dernier Id 
        $query = $this->pdo->query('SELECT MAX(id) FROM products ');

        $product_id = $query->fetch(PDO::FETCH_ASSOC);
        return $product_id;

    }

// modifie le nom de la photo direct apres l'avoir enregistrer, pour insertproduct.php
    public function updatePictureName($picture_name, $id)
    {
        $sql = ' UPDATE products SET image = ?  WHERE id = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute([$picture_name,  $id ]);
    }

// pour insertproduct.php
    public function insertDescriptions($product_id, $description)
    {
        $sql ='INSERT INTO product_description( product_id, description ) 
        VALUES ( ?, ?)';
        $query = $this->pdo->prepare($sql);
        $query->execute([$product_id, $description]);
    }
}



