<?php
    ob_start();
       
    try {
        $connexion = new PDO("mysql:dbname=humatica;host=localhost", "root", "");
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage(); 
    }
?>