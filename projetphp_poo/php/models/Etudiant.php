<?php

class Etudiant {

private $db;

public function __construct($db) {
    $this->db = $db;
}

public function authenticate($email, $id) {
    $sql = "SELECT count(*) FROM etudiant where  E_MAIL = ? and ID_ETUDIANT = ? ";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("ss", $email, $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $count = $row['count(*)'];
    if ($count != 0) // nom d'utilisateur et mot de passe correctes
    {
        $_SESSION['email'] = $email;
        header('Location: /projetphp_poo/php/chambretudiant.php');
    } else {
        header('Location: /projetphp_poo/php/connexetudiant.php?erreur=1'); // utilisateur ou mot de passe invalide
    }
}

public function register($identifiant, $nom, $prenom, $adresse_email, $adresse_domicile, $id_chambre) {
    $sql = "SELECT * FROM etudiant WHERE ID_ETUDIANT='$identifiant' OR E_MAIL='$adresse_email' ";
    $result = $this->db->query($sql);
    if (mysqli_num_rows($result) > 0) {
        $erreur = "Cet utilisateur existe déjà.";
    } else {
        // Insertion des données dans la table "etudiant"
        $sql = "INSERT INTO etudiant (ID_ETUDIANT, NOM, PRENOM, E_MAIL, ADRESSE, ID_CHAMBRE) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssssd", $identifiant, $nom, $prenom, $adresse_email, $adresse_domicile, $id_chambre);
        $stmt->execute();
        if ($stmt->error) {
            echo "Erreur: " . $sql . "<br>" . $stmt->error;
        } else {
            $erreur = "Enregistrement effectué avec succès.";
            header('Location: /projetphp_poo/php/connexetudiant.php');
        }
    }
}

public function verify($_email, $_id) {
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $email = mysqli_real_escape_string($this->conn, htmlspecialchars($_email));
    $id = mysqli_real_escape_string($this->conn, htmlspecialchars($_id));
    if ($email !== "" && $id !== "") {
        $requete = "SELECT count(*) FROM etudiant where  E_MAIL = ? and ID_ETUDIANT = ? ";
        $stmt = $this->db->prepare($requete);
        $stmt->bind_param("ss", $email, $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $count = $row['count(*)'];
        $this->conn->close();
        if ($count != 0) // nom d'utilisateur et mot de passe correctes
        {
            $_SESSION['email'] = $email;
            header('Location: /projetphp_poo/php/chambretudiant.php');
        } else {
            header('Location: /projetphp_poo/php/connexetudiant.php?erreur=1'); // utilisateur ou mot de passe invalide
        }
    } else {
        header('Location: /projetphp_poo/php/connexetudiant.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
}

?>
