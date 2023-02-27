<?php
include 'App/modele/M_Categorie.php';
include 'App/modele/M_Exemplaire.php';
include 'App/modele/M_Console.php';



$lesCategories = M_Categorie::trouveLesCategories();
$lesConsoles = M_Console::trouveLesConsole();

switch ($action) {
    case 'insert' :
        $idCategorie = filter_input(INPUT_POST,'categorie_id');
        $descrip = filter_input(INPUT_POST,"descrip");
        $prix = filter_input(INPUT_POST,"prix");
        $img = filter_input(INPUT_POST,"img");
        $etat = filter_input(INPUT_POST,"etat");
        $detail = filter_input(INPUT_POST,"detail");
        $consol = filter_input(INPUT_POST,"console_id");
        M_Exemplaire::insertJeu($idCategorie,$descrip,$prix,$img,$etat,$detail,$consol);
    break;
    default:
        $lesJeux = [];
        break;
}

