<?php

include_once "AccesDonnees.php";

class Session
{

    public static function client_existe(string $mail, string $mdp)
    {

        $sql = 'SELECT 1 FROM client ';
        $sql .= 'WHERE mail = :mail AND mdp = :mdp';

        $statement = AccesDonnees::prepare($sql);
        $statement->bindParam(":mail", $mail);
        $statement->bindParam(":mdp", $mdp);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            $existe = true;
        } else {
            $existe = false;
        }
        var_dump($existe);
        die;
        return (bool) $existe;
    }


    public static function checkPassword(string $mail, string $mdp)
    {
        $existe=false;

        $sql = "SELECT id, mail, mdp FROM client WHERE mail = :mail";

        $statement = AccesDonnees::prepare($sql);
        $statement->bindParam(":mail", $mail);

        $statement->execute();

        if ($statement->rowCount() > 0) {
            $data = $statement->fetch();
            $mdp_bdd = $data['mdp'];
        }
        if ($statement->rowCount() == 0) {
            afficheMessage("mail ou mot de passe inconnu");
            die;
        }

        if (password_verify($mdp, $mdp_bdd)) {
            $id = $data['id'];
            $_SESSION["id"] = $id;
            $_SESSION["mail"] = $data['mail'];
            $existe=true;
            // return $id_utilisateur;
        }
        return $existe;
    }

    public function register(string $mail, string $mdp): bool
    {
        $sql = "INSERT INTO client (identifiant, mot_de_passe) VALUES (:mail,:psw);";
        $statement = AccesDonnees::prepare($sql);
        $mdp = password_hash($mdp, PASSWORD_BCRYPT);

        $statement->bindParam(":mail", $mail);
        $statement->bindParam(":mdp", $mdp);

        $statement->execute();
        return true;
    }

    public static function getInfos($id)
    {
        $pdo = AccesDonnees::getPdo();
        $statement = $pdo->prepare("SELECT * FROM client WHERE id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $client = $statement->fetch(PDO::FETCH_ASSOC);
        return $client;
    }

    public static function modifInfos(string $nom, string $prenom, string $adresse, string $cp, string $ville, string $mail, string $id)
    {
        $sql = "UPDATE client 
        SET nom=:nom, prenom=:prenom, adresse=:adresse, cp=:cp, ville=:ville, mail=:mail, mail=:mail
        WHERE id = :id";

            $statement = AccesDonnees::prepare($sql);
            $statement->bindParam(':id', $id, PDO::PARAM_STR);
            $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
            $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $statement->bindParam(':adresse', $adresse, PDO::PARAM_STR);
            $statement->bindParam(':cp', $cp, PDO::PARAM_STR);
            $statement->bindParam(':ville', $ville, PDO::PARAM_STR);
            $statement->bindParam(':mail', $mail, PDO::PARAM_STR);
            $statement->execute();
    }
}


