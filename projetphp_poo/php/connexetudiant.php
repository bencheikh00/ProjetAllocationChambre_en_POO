<?php
$erreurMessage = '';
if (isset($_GET['erreur'])) {
    $err = $_GET['erreur'];
    if ($err == 1 || $err == 2)
        $erreurMessage = "identifiant ou adresse mail incorrect";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONNEXION</title>
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

    <h4 class="ok">CONNEXION</h4>
    <div id="container">


        <form method="POST" action="verifetudiant.php">
            <label><b>Adresse E-mail</b></label>
            <input type="text" placeholder="Entrer votre adresse e-mail" name="email" required><br>
            <label><b>Identifiant</b></label>
            <input type="text" placeholder="Entrer votre identifiant" name="id" required><br>
            <p id="erreur">
                <?php echo $erreurMessage ?>
            </p>

            <?php
            if (isset($_GET['erreur'])) {
                $err = $_GET['erreur'];
                if ($err == 1 || $err == 2)
                    echo "";
            }
            ?>

            <input type="submit" value="Connexion" id="bouton" />

        </form>
    </div>
</body>

</html>