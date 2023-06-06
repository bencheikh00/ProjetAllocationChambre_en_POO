<?php
require './models/Database.php';
require './models/Etudiant.php';

if (isset($_POST['email']) && isset($_POST['id'])) {
    $database = new Database();
    $db = $database->connect();
    $etudiant = new Etudiant($db);
    $etudiant->verify($_POST['email'], $_POST['id']);
} else {
    header('Location: /projetphp_poo/php/connexetudiant.php?erreur=3'); // champs manquantes
}
