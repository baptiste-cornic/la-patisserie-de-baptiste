<?php

require('SQLModel.php');

class UserModel
{
    protected $pdo;
    
    public function __construct()
    {
        $model = new SQLModel();
        $this->pdo = $model->getDatabase();
    }
    
// pour login.php
    public function getUser($email, $password)
    {
        $sql ='SELECT *
                FROM users
                WHERE email = ?
                ';
        $query = $this->pdo->prepare($sql);
        $query->execute([ $email ]);        
        $user = $query->fetch();
        
        if($user == null) 
        {
            return null;
        }
        
        $hash = $user['password'];

        if( crypt($password, $hash) == $hash )
        {
            return $user;
        }
        return null;
    }
    
// pour la fonction insertUser en dessous
    private function hashPassword($password) 
    {
        $salt = '$2y$11$'. bin2hex(openssl_random_pseudo_bytes(64));
        return crypt($password, $salt);
    }
    
// pour registration.php
    public function insertUser($firstname, $lastname, $address, $city, $zip_code, $country, $phone, $email, $password)
    {
        $sql = 'SELECT email FROM users WHERE email = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute([$email]);
        $user = $query->fetch();
        if( $user != null )
        {
            throw new Exception('Email deja utilisé');
        }
        
        $sql= " INSERT INTO 
            users(firstname, lastname, address, city, zip_code, country, phone,inscription_date, email, password, admin )
            VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, false)
            ";
        
        $hash = $this->hashPassword($password);
        $today = date('Y-m-d H:i');
        
        $query = $this->pdo->prepare($sql);
        $query->execute([ $firstname, $lastname, $address, $city, $zip_code, $country, $phone, $today, $email, $hash ]);
    }
    
//  pour registration.php, verification que l'email n'existe pas deja
    public function getEmail()
    {
        $query = $this->pdo->query('SELECT email FROM users ');
        $users_email = $query->fetchAll(PDO::FETCH_ASSOC);
        return $users_email;
    }
    
// pour admin.php
    public function getAllUsers()
    {
        $query = $this->pdo->query('SELECT * FROM users');
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }    
    
// pour user.php
    public function getUserWithId($id)
    {
        $sql = 'SELECT id , firstname, lastname, address, city, zip_code, country, phone, inscription_date, email, admin FROM users WHERE id = ? ';
        $query = $this->pdo->prepare($sql);
        $query->execute([ $id ]);        
        $user = $query->fetch();
        return $user;
    }
    
// pour userUpdate.php
    public function updateUserAdmin($id)
    {
        $sql = 'UPDATE users SET admin = !admin  WHERE id = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute([ $id ]); 
    }
}