<?php
/**
 * Created by PhpStorm.
 * User: laurent
 * Date: 27/03/2019
 * Time: 13:48
 */

/*------  On compte le nombre de membres inscrits ------*/
/**
 * @return int
 */
function CompteTotalLogs()
{
    $idcom = connex("myparam");

    $requete = "SELECT * FROM `log`";
    $result = @mysqli_query($idcom , $requete);
    if ($result) {
        $nb = mysqli_num_rows($result);
    } else {
        $nb = -1;
    }
    return $nb;
}

/*------  On compte le nombre d'annonces totales ------*/
/**
 * @return int
 */
function CompteTotalAnnonces(){


    $idcom = connex("myparam");

    $requete = "SELECT * FROM `annonces`";
    $result=@mysqli_query($idcom,$requete);
    if ($result){
        $nb=mysqli_num_rows($result);
    }
    else{
        $nb = -1;
    }
    return $nb;

}

/*------  On compte le nombre de message non lu par l'utilisateur ------*/
/**
 * @return int
 */
function CompteMessages(){
    $nb = -1;
    if(isset($_SESSION["ID"]))
    {
        $idcom = connex("myparam");

        $requete = "SELECT `Vu` FROM `messages` WHERE `Vu`=0 AND `ID_Destinataire`='".$_SESSION["ID"]."'";
        $result=@mysqli_query($idcom,$requete);
        if ($result){
            $nb =mysqli_num_rows($result);
        }
        else{
            $nb = -1;
        }
    }
    else{
        echo "Erreur Session";
    }
    return $nb;
}

