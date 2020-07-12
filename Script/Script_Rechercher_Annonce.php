<?php
/**
 * Created by PhpStorm.
 * User: laurent
 * Date: 27/03/2019
 * Time: 14:41
 */

/*------  Variables ------*/
$i = 0;
$Suite="";

/*------  Connection ------*/
include("./connex.inc.php");
$idcom = connex("myparam");


/*------  On Prepare des chaines que l'on concatenera a la requete  ------*/
// MOT CLEF
if (isset($_POST["Mot_Clef"]) && $_POST["Mot_Clef"]!=""){
    $i++;
    ${"Chaine".$i} = "( `Titre` LIKE '%".$_POST["Mot_Clef"]."%' OR `Description` LIKE '%".$_POST["Mot_Clef"]."%' )";
}
// LIEUX
if (isset($_POST["Lieux"]) && $_POST["Lieux"]!=""){
    $i++;
    ${"Chaine".$i} = "`Lieu` LIKE ".$_POST["Lieux"];
}
//PERSONNES
if (isset($_POST["Personnes"]) && $_POST["Personnes"]!=""){
    $i++;
    ${"Chaine".$i} = "`Nb_personnes`=".$_POST["Personnes"];
}
//PRIX
if (isset($_POST["Prix"]) && $_POST["Prix"]!=""){
    $i++;
    ${"Chaine".$i} = "`Prix` ".$_POST["Prix"];
}
//DATES
if (isset($_POST["Date_Debut"]) && isset($_POST["Date_Fin"])){
    $i++;
    ${"Chaine".$i} = "`Date_Debut_Dispo` <= '".$_POST["Date_Debut"]."' AND `Date_Fin_Dispo` >= '".$_POST["Date_Fin"]."'";
}

/*------  On concatene les chaines en y ajoutant " AND " entre deux ------*/
for($j = 1; $j<=$i;$j++)
{
    $Suite .= ${"Chaine".$j};
    if ($j<$i){
        $Suite .= " AND ";
    }
}

/*------  Si tout est vide on prend toutes les annonces sinon on execute la meme requete avec la chaine créée avant ------*/
if (empty($_POST["Mot_Clef"]) && empty($_POST["Lieux"]) && empty($_POST["Personnes"]) && empty($_POST["Date_Debut"]) && empty($_POST["Date_Fin"])  && empty($_POST["Personnes"])  ) {
    $requete = "SELECT `ID_Annonce`,`Titre`,`Lieu`,`Nb_personnes`,`Type`,`Prix`,`Note` FROM `annonces` WHERE Dispo=1";
}
else{
    $requete = "SELECT `ID_Annonce`,`Titre`,`Lieu`,`Nb_personnes`,`Type`,`Prix`,`Note` FROM `annonces` WHERE Dispo=1 AND ".$Suite;
}

header('Location: ../Rechercher.php?requete='.$requete);
