<?php

session_start();


// Pour afficher les erreurs PHP
error_reporting(E_ALL);
ini_set("display_errors", 1);
// Attention : A supprimer en production !!!

require("./util/fonctions.inc.php");
require('./util/validateurs.inc.php');
require("./App/modele/AccesDonnees.php");

$SessionClient = [];
if (!empty($_SESSION['id'])) {
    $SessionClient = $_SESSION['id'];
}


$uc = filter_input(INPUT_GET, 'uc'); // Use Case
$action = filter_input(INPUT_GET, 'action'); // Action
initPanier();


if (!$uc) {
    $uc = 'accueil';
}

// Controleur principale
switch ($uc) {
    case 'visite' :
        include 'App/controleur/c_consultation.php';
        break;
    case 'accueil' :
        include 'App/controleur/c_consultation.php';
        break;
    case 'panier' :
        include 'App/controleur/c_gestionPanier.php';
        break;
    case 'commander':
        include 'App/controleur/c_passerCommande.php';
        break;
    case 'administrer' :
        include 'App/controleur/c_monCompte.php';
        break;
    case 'creation' :
        include 'App/controleur/c_creation_jeu.php';
        break;
    default:
        break;
}


include("App/vue/template.php");