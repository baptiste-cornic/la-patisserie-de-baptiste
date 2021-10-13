<?php

    class SQLModel
    {
        public function getDatabase()
        {
            $pdo = new PDO('mysql:host=localhost;dbname=mes recettes;charset=utf8mb4; ','root','');
            return $pdo;
        }

      
    }

?>