<?php

/**
 * Requetes sur les exemplaires  de jeux videos
 *
 * @author Loic LOG
 */
class M_Exemplaire
{

    /**
     * Retourne sous forme d'un tableau associatif tous les jeux de la
     * catégorie passée en argument
     *
     * @param $idCategorie
     * @return un tableau associatif
     */
    public static function trouveLesJeuxDeCategorie($idCategorie)
    {
        $req = "SELECT * FROM exemplaires WHERE categorie_id = '$idCategorie'";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    /**
     * Retourne les jeux concernés par le tableau des idProduits passée en argument
     *
     * @param $desIdJeux tableau d'idProduits
     * @return un tableau associatif
     */
    public static function trouveLesJeuxDuTableau($desIdJeux)
    {
        $nbProduits = count($desIdJeux);
        $lesProduits = array();
        if ($nbProduits != 0) {
            foreach ($desIdJeux as $unIdProduit) {
                $req = "SELECT * FROM exemplaires WHERE id = '$unIdProduit'";
                $res = AccesDonnees::query($req);
                $unProduit = $res->fetch();
                $lesProduits[] = $unProduit;
            }
        }
        return $lesProduits;
    }

    public static function toutlesjeux()
    {
        $req = "SELECT * FROM exemplaires ";
        $res = AccesDonnees::query($req);
        $toutlesjeux = $res->fetchAll();
        return $toutlesjeux;
    }


    //    public static function RechercheJeux()
    //    {
    //        $keywords = $_GET["keywords"];
    //        $tab=[];
    //        if (!empty(trim($keywords))) {
    //            $req = "SELECT * FROM `exemplaires` WHERE description LIKE '%$keywords%'";
    //            $res = AccesDonnees::query($req);
    //            $res->execute();
    //            $tab = $res->fetchAll();
    //        }
    //        return $tab;
    //    }
    /**
     * cette fonction prend en compte la barre de recherche qui vas cherhcer dans la base de donné le mots clè description demandé 
     */
    public static function RechercheConsole()
    {
        $keywords = $_GET["keywords"];
        $tab = [];
        if (!empty(trim($keywords))) {
            $req = "SELECT * FROM `exemplaires` JOIN console ON console_id=console.id WHERE nom LIKE '%$keywords%' OR description LIKE '%$keywords%'";
            $res = AccesDonnees::query($req);
            $res->execute();
            $tab = $res->fetchAll();
        }
        return $tab;
    }

    public static function insertJeu($idCategorie,$descrip,$prix,$img,$etat,$detail,$consol)
    {
        $req = "INSERT INTO exemplaires (`description`,`prix`,`image`,`categorie_id`,`etat`,`detail`,`console_id`) VALUES ('$descrip','$prix','$img','$idCategorie','$etat','$detail','$consol')";
        $res = AccesDonnees::exec($req);
    }


}
