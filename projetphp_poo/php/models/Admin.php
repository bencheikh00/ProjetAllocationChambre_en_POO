<?php
class Admin
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function verify(string $identifiant, string $numero)
    {
        $identifiant = mysqli_real_escape_string($this->conn, htmlspecialchars($identifiant));
        $numero = mysqli_real_escape_string($this->conn, htmlspecialchars($numero));

        if ($identifiant !== "" && $numero !== "") {
            $sql = "SELECT count(*) FROM administrateur where  ID_ADMI = ? and TELEPHONE = ? ";
            $stmt = mysqli_prepare($this->conn, $sql);
            mysqli_stmt_bind_param($stmt, "ss", $identifiant, $numero);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            $count = $row['count(*)'];
            if ($count != 0) // nom d'utilisateur et mot de passe correctes
            {
                $_SESSION['identifiant'] = $identifiant;
                header('Location: option.php');
            } else {
                header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe invalide
            }
        } else {
            header('Location: connexion.php?erreur=2'); // utilisateur ou mot de passe vide
        }
    }
}
?>