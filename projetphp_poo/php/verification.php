<?php
require './models/Database.php';
require './models/Admin.php';

if (isset($_POST['identifiant']) && isset($_POST['numero'])) {
    $database = new Database();
    $db = $database->connect();

    $admin = new Admin($db);
    $admin->verify($_POST['identifiant'], $_POST['numero']);
} else {
    header('Location: connexion.php?erreur=3'); // champs manquantes
}
mysqli_close($db); // fermer la connexion
