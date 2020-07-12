<?php
/**
 * Created by PhpStorm.
 * User: laure
 * Date: 27/03/2019
 * Time: 16:44
 */

$Titre = "";
$ID_Proprio = "";
$Desc = "";
$Lieu = "";
$Nbpers = 0;
$Type = "";
$Prix = 0;
$Date_Debut = "";
$Date_Fin = "";
$Note = 0;
$Vues = 0;

/**
 * @param $ID
 */
function AnnonceVar($ID){

    global $Titre,$ID_Proprio,$Desc,$Lieu,$Nbpers,$Type,$Prix,$Date_Debut,$Date_Fin,$Note,$Vues;

    $idcom=connex("myparam");

    $requete = "SELECT * FROM `annonces` WHERE `ID_Annonce`='".$ID."'";
    $result=@mysqli_query($idcom,$requete);
    if ($result){
        while ($row = $result->fetch_array()){

            $Titre= $row["Titre"];
            $ID_Proprio = $row["ID_Proprio"];
            $Desc = $row["Description"];
            $Lieu = $row["Lieu"];
            $Nbpers = $row["Nb_personnes"];
            $Type = $row["Type"];
            $Prix = $row["Prix"];
            $Date_Debut = date_create($row["Date_Debut_Dispo"]);
            $Date_Debut = date_format($Date_Debut,'Y-m-d');
            $Date_Fin = date_create($row["Date_Fin_Dispo"]);
            $Date_Fin = date_format($Date_Fin,'Y-m-d');
            $Note = $row["Note"];
            $Vues = $row["Vues"] + 1;
        }
        $requete = "UPDATE `annonces` SET `Vues`=".$Vues." WHERE `ID_Annonce`='".$ID."'";
        @mysqli_query($idcom,$requete);
    }
    else{
        echo "Erreur AnnonceVar";
    }
}
