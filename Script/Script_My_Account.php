<?php
/**
 * Created by PhpStorm.
 * User: laurent
 * Date: 27/03/2019
 * Time: 13:56
 */


/*------  On Affiche les Annonces de l'utilisteur connecté ------*/
function AffAnnonces(){

    $idcom = connex("myparam");

    echo " <table id='Annonces'><tr><th>Titre</th><th class='Milieu'>Date</th><th class='Droite'>Vues</th></tr>";
    $requete = "SELECT `ID_Annonce`,`Titre`,`Date_Publication`,`Vues` FROM `annonces` WHERE `ID_Proprio`='".$_SESSION["ID"]."'";
    $result=@mysqli_query($idcom,$requete);
    if ($result){
        while($row = $result->fetch_array())
        {
            echo "<tr><td><a href='./Annonce.php?ID_Annonce=".$row["ID_Annonce"]."'>".$row["Titre"]."</a></td><td class='Milieu'>".$row["Date_Publication"]."</td><td class='Droite'>".$row["Vues"]."</td></tr>";
        }
    }
    else{
        echo "Erreur AffAnnonces";
    }
    echo "</table>";
}

/*------  On Affiche les Messages de l'utilisteur connecté ------*/
function AffMessages(){

    $idcom = connex("myparam");

    echo " <table  id='Messages'><tr><th>Expediteur</th><th class='Milieu'>Objet</th><th class='Droite'>Date</th></tr>";
    $requete = "SELECT `ID_Expediteur`,`Objet`,`Date`,`Vu`,`ID_Message` FROM `messages` WHERE `ID_Destinataire`='".$_SESSION["ID"]."'ORDER BY `ID_Message` DESC";
    $result=@mysqli_query($idcom,$requete);
    if ($result){
        while($row = $result->fetch_array())
        {
            if ($row["Vu"]==0) {
                echo "<tr class='Messages_NonLu'><td><a href='./Other_Account.php?ID=".$row["ID_Expediteur"]."'>".$row["ID_Expediteur"]."</a></td><td class='Milieu'><a href='./Message.php?ID=".$row["ID_Message"]."'>".$row["Objet"]."</a></td><td class='Droite'>".$row["Date"]."</td></tr>";
            }
            else {
                echo "<tr class='Messages_Lu'><td><a href='./Other_Account.php?ID=".$row["ID_Expediteur"]."'>".$row["ID_Expediteur"]."</a></td><td class='Milieu'><a href='./Message.php?ID=".$row["ID_Message"]."'>".$row["Objet"]."</a></td><td class='Droite'>".$row["Date"]."</td></tr>";
            }        }
    }
    else{
        echo "Erreur AffMessages";
    }
    echo "</table>";
}

/*------  On Affiche les Reservations de l'utilisteur connecté ------*/
function AffReservations(){

    $idcom = connex("myparam");

    echo " <form method='post'><table id='Reservations'><tr><th>ID Annonce</th><th class='Milieu'>Debut du Sejour</th><th class='Milieu'>Fin du Sejour</th><th id='Fin'></th><th id='FIN'></th></tr>";
    $requete = "SELECT r.ID_Reservation,r.ID_Annonce,r.Date_Debut, r.Date_Fin, a.Titre, a.ID_Proprio,r.Effectue FROM `reservations` r, `annonces` a WHERE r.`ID_Locataire` = '".$_SESSION["ID"]."' AND r.`ID_Annonce` = a.`ID_Annonce`";
    $result=@mysqli_query($idcom,$requete);
    if ($result){
        while($row = $result->fetch_array()){
            echo "<tr><td><a href='./Annonce.php?ID_Annonce=".$row["ID_Annonce"]."'>".$row["Titre"]."</a></td><td class='Milieu'>".$row["Date_Debut"]."</td><td class='Milieu'>".$row["Date_Fin"]."</td><td class='Milieu' id='Fin'><a style='color: #0DBAB0' href='./New_Message.php?ID=".$row["ID_Proprio"]."'>Contacter</a></td><td class='Droite' id='Fin'>";
            if ($row["Effectue"]== 0){
                echo "<a style='color: #0DBAB0' href='./Evaluer.php?ID_Annonce=".$row["ID_Annonce"]."&amp;Date=".$row["Date_Fin"]."&amp;ID_reservation=".$row["ID_Reservation"]."'>Evaluer</a>";
            }
            else{
                echo "<p style='color: #0DBAB0'>Evalutation faite</p>";
            }
            echo "</td></tr>";
        }
    }
    else{
        echo "Erreur AffReservations";
    }
    echo "</table></form>";
}