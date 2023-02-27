<?php

include 'App/modele/M_Categorie.php';
include 'App/modele/M_Exemplaire.php';
include 'App/modele/M_Console.php';
include 'App/modele/M_compte.php';
include 'App/modele/M_Session.php';


$lalala = '<a href="index.php?uc=inscription"></a>';

switch ($action) {
    case 'insertCompte':
        $Nom = filter_input(INPUT_POST, 'Nom');
        $Prenom = filter_input(INPUT_POST, "Prenom");
        $Mail = filter_input(INPUT_POST, "Mail");
        $ville = filter_input(INPUT_POST, "ville");
        $cp = filter_input(INPUT_POST, "cp");
        $Mdp = filter_input(INPUT_POST, "Mdp");
        $val = M_compte::inscriptionCompte($Nom, $Prenom, $Mail, $Mdp, $ville, $cp);
        if ($val == true) {
            afficheMessage('le compte a bien etait enregistré');
        } else {
            afficheMessage("erreur lord de l'inscription");
        }
        break;
    case 'connexion':
        $mySession = new Session();

        $message = '';
        $connexion = filter_input(INPUT_GET, 'connexion');

        if ($connexion == "Connexion") {
            $Mail = filter_input(INPUT_POST, 'mail');
            $mdp = filter_input(INPUT_POST, 'mdp');

            $_SESSION['id'] = $mySession->checkPassword($Mail, $mdp);
            if ($_SESSION['id']) {
                header('Location: index.php?uc=compte');
            }
        }
    break;

    case 'verifConnexion':
        // trim : supprime les caractères blanc (espaces, entrée etc...)
        $Mail = (filter_input(INPUT_POST, "mail"));
        $mdp = (filter_input(INPUT_POST, "mdp"));

        // if (is_existe($mail) && is_existe($mdp)) {
        if (Session::checkPassword($Mail, $mdp)) {
            $mySession = new Session();
            // $mySession->register($mail,$mdp);

            // TERNAIRE ELLE REMPLACE UN IF 
            // if($mySession->register($mail,$mdp)) {
            //     echo "operation réussie";
            // } else {
            //     echo "erreur";
            // }
            header('Location:index.php?uc=accueil');
        } else {
            header('Location:index.php?uc=connexion');
        }
        break;

    case 'deconnexion':
        session_destroy();
        header('Location:index.php?uc=accueil"');
        exit;
        break;

    case 'compte' :
        $client = Session::getInfos($_SESSION['id']);
        break;

    case 'modifInfos' :

        //UN GET ???
        $nom = filter_input(INPUT_POST, 'nom');
        $prenom = filter_input(INPUT_POST, 'prenom');
        $adresse = filter_input(INPUT_POST, 'adresse');
        $cp = filter_input(INPUT_POST, 'cp');
        $ville = filter_input(INPUT_POST, 'ville');
        $mail = filter_input(INPUT_POST, 'mail');
        $pseudo = filter_input(INPUT_POST, 'pseudo');

        Session::modifInfos ($nom, $prenom, $adresse, $cp, $ville, $mail, $pseudo, $_SESSION['id']);

        header("Location: index.php?uc=administrer&action=compte");
        die();

        break;
    default:
        $lesJeux = [];
        break;
}
