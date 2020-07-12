<?php
/*------  On demarre la session ------*/
session_start();

/*------  Connection ------*/
include("./connex.inc.php");

if (isset($_SESSION["ID"])){
    if ((isset($_POST["Date_Debut_Sejour"]) && isset($_POST["Date_Fin_Sejour"]))){

        $idcom = connex("myparam");

        $requete = "SELECT * FROM reservations WHERE `ID_Annonce`=1 AND (`Date_Debut` > '".$_POST["Date_Fin_Sejour"]."' AND `Date_Fin` > '".$_POST["Date_Debut_Sejour"]."') OR (`Date_Debut` < '".$_POST["Date_Fin_Sejour"]."' AND `Date_Fin` < '".$_POST["Date_Debut_Sejour"]."')";
        $result = @mysqli_query($idcom , $requete);
        if ($result){
            $nbID = mysqli_num_rows($result);
            if ($nbID == 0){
                echo "<script>if(confirm('Nous sommes navré mais ces dates ne sont pas disponibles ...')){document.location.href = '../Annonce.php?ID_Annonce=".$_POST["ID_Annonce"]."'}</script>";
            }
            else{
                $requete = "INSERT INTO `reservations`(`ID_Annonce`, `ID_Locataire`, `Date_Debut`, `Date_Fin`) VALUES ('".$_POST["ID_Annonce"]."','".$_SESSION["ID"]."','".$_POST["Date_Debut_Sejour"]."','".$_POST["Date_Fin_Sejour"]."')";
                $result = @mysqli_query($idcom , $requete);
                if ($result){
                    echo "<script>if(confirm('Votre reservation a étée prise en charge ! Vous pouvez directement consulter vos reservations dans l\'onglet réservation de votre profil ! Nous vous conseillons de prendre contact avec l\'utilisateur ayant posté l\'annonce grace a l\'outil Message ! ')){document.location.href = '../My_Account.php?'}</script>";
                }
                else{
                    echo "Erreur Reservation INSERT";
                }
            }
        }
        else{
            echo "Erreur Reservation";
        }
    }
    else{
        echo "<script>if(confirm('Merci de completer les deux dates !')){document.location.href = '../Annonce.php?ID_Annonce=".$_POST["ID_Annonce"]."'}</script>";
    }
}
else{
    echo "<script>if(confirm('Merci de vous connecter pour effectuer une reservation !')){document.location.href = '../Login.php'}</script>";
}

