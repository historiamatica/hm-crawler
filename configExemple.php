<?php
    ob_start();
       
    try {
        $connexion = new PDO("mysql:dbname=test;host=test;", "root", "root");
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage(); 
    }
?>