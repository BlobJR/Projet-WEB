<?php
$serveur = "localhost";
$utilisateur = "root";
$mdp = ""; 
$base_de_donnees = "projet";
$pdo =new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $mdp);

?>