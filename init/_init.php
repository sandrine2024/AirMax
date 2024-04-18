<?php
$pdo  = new PDO(
    'mysql:host=localhost; dbname=exercice', //Spécifie le serveur MySQL (localhost) et la base de données (exercice).
    'root', //Nom d’utilisateur MySQL.
    '', // Mot de passe MySQL (vide dans cet exemple).
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, //Configure le mode d’affichage des erreurs (affiche les avertissements).
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //Définit le jeu de caractères à UTF-8.
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO :: FETCH_ASSOC] //Configure le mode de récupération des résultats (tableaux associatifs).
    
);
session_start();
// Démarre une session PHP. Cela permet de stocker des variables de session pour un utilisateur.

