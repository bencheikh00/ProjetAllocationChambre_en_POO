<?php
$erreurMessage = '';
if (isset($_GET['erreur'])) {
    $err = $_GET['erreur'];
    if ($err == 1 || $err == 2)
        $erreurMessage = "identifiant ou numero incorrect";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/figma.css" />
    <title>CONNEXION</title>
    <link rel="icon" href="./../src/home.png">
</head>

<body id="scnd">
    <h1 id="tete"><span class="a">IAM </span> <span class="b">ADMINIS</span><span class="c">TRATION</span> </h1>
    <div class="centre">
        <h2 id="connexion">CONNEXION</h2>
    </div>
    <div id="maya">
        <form method="post" action="verification.php">
            <input type="text" name="identifiant" class="id" placeholder="identifiant" required />
            <input type="text" name="numero" class="numb" placeholder="numero" required />
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
            <input type="submit" value="Connexion" class="con" />
        </form>
    </div>
</body>

</html>