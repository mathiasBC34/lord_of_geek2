<?php
include 'App/modele/M_categorie.php';
include 'App/modele/M_exemplaire.php';
include 'App/modele/M_Console.php';

/**
 * Controleur pour la consultation des exemplaires
 * @author Loic LOG
 */
switch ($action) {
    case 'voirJeux' :
        $categorie = filter_input(INPUT_GET, 'categorie');
        $lesJeux = M_Exemplaire::trouveLesJeuxDeCategorie($categorie);
        break;
    case 'ajouterAuPanier' :
        $idJeu = filter_input(INPUT_GET, 'jeu');
        $categorie = filter_input(INPUT_GET, 'categorie');
        if (!ajouterAuPanier($idJeu)) {
            afficheErreurs(["Ce jeu est déjà dans le panier !!"]);
        } else {
            afficheMessage("Ce jeu a été ajouté");
        }
        $lesJeux = M_Exemplaire::trouveLesJeuxDeCategorie($categorie);
        break;
    case 'voirTout':
        $lesJeux = M_Exemplaire::toutlesjeux();
        break;
    case 'trierParPrix':
        $lesJeux = M_Exemplaire::toutlesjeux();
        function comparerJeuxParPrix($unJeu)
        {
            return $unJeu["prix"];
        }
        usort($lesJeux, "comparerJeuxParPrix");
        break;
    case 'trierParPrix':
        break;
    // case 'rechercheJeux':
    //     $lesJeux = M_Exemplaire::RechercheJeux();
    //     break;
    case 'rechercheConsole':
        $console = filter_input(INPUT_GET, 'keywords');
        $lesJeux = M_Exemplaire::RechercheConsole($console);
        if ( $lesJeux) {
            return;
        }else{
            afficheErreurs(["aucun jeux ou console trouver"]);
        }
        break;
    default:
        $lesJeux = [];
        break;
}

$lesCategories = M_Categorie::trouveLesCategories();
$lesConsoles = M_Console::trouveLesConsole();
$cons = M_Console::afficheConsole();