<?php
require './models/Database.php';
require './models/Etudiant.php';

$erreur = '';
if (isset($_POST['prenom'], $_POST['nom'], $_POST['adresse_email'],  $_POST['confirm_identifiant'])) {
    $prenom = $_POST['prenom'];    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $adresse_domicile = $_POST['adresse_domicile'];
    $id_chambre = $_POST['id_chambre'];
    $adresse_email = $_POST['adresse_email'];
    $identifiant = $_POST['identifiant'];
    $confirm_identifiant = $_POST['confirm_identifiant'];

    // Vérification de la correspondance entre l'identifiant et sa confirmation
    if ($identifiant !== $confirm_identifiant) {
        $erreur = "Les identifiants ne correspondent pas.";
    } else {
        // Connexion à la base de données
        $database = new Database();
        $conn = $database->connect();

        $etudiant = new Etudiant($conn);
        $etudiant->register($identifiant, $nom, $prenom, $adresse_email, $adresse_domicile, $id_chambre);

        $conn->close();
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSCRIPTION</title>
    <link rel="stylesheet" href="./../css/style.css">
    <link rel="icon" href="./../src/home.png">
</head>

<body>
    <h2>IAM CAMPUS</h2>
    <br>
    <P>
        <HR NOSHADE>
    </P>
    <P>
        <HR NOSHADE>
    </P>
    <br><br>

    <h4 class="ok">INSCRIPTION</h4>

    <div id="container">
        <form method="POST" action="">
            <p id="erreur">
                <?php echo $erreur ?>
            </p>
            <label><b>Prénom</b></label><br>
            <input type="text" placeholder="Entrer votre  prénom" name="prenom" required><br>

            <label><b>Nom</b></label><br>
            <input type="text" placeholder="Entrer votre nom" name="nom" required><br>

            <label><b>Adresse E-mail</b></label>
            <input type="text" placeholder="Entrer votre adresse E-mail" name="adresse_email" required><br>

            <label><b>Adresse Domicile</b></label>
            <input type="text" placeholder="Entrer votre adresse Domicile" name="adresse_domicile" required><br>

            <label><b>Identifiant Chambre</b></label><br>
            <input type="text" placeholder="Entrer l'identifiant de la chambre " name="id_chambre" minlength="1" required><br>

            <label><b>Identifiant</b></label><br>
            <input type="password" placeholder="Créer un identifiant de 6 chiffres " name="identifiant" minlength="1" maxlength="6" required><br>

            <label><b>Confirmer votre identifiant</b></label><br>

            <input type="password" placeholder="Confirmer votre identifiant" name="confirm_identifiant" minlength="1" maxlength="6" required><br>

            <br>
            <input type="submit" value="S'inscrire" id="bouton" />

        </form>

</body>

</html>