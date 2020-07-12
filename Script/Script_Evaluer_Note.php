<?php
session_start();
/*------  Connection ------*/
include("./connex.inc.php");

if (!empty($_POST["Note"])){
    $idcom = connex("myparam");
    $requete = "SELECT `ID_Proprio`,`Nb_Notes`,`Note` FROM `annonces` WHERE `ID_Annonce`= ".$_POST['ID_Annonce'];
    $result = @mysqli_query($idcom , $requete);
    if ($result){
        while($row = $result->fetch_array()){
            $Proprio = $row["ID_Proprio"];
            $Note = number_format(($row["Note"] * $row["Nb_Notes"] + $_POST["Note"])/($row["Nb_Notes"]+1), 1, '.', '');
            $requete = "UPDATE `annonces` SET `Nb_Notes`=`Nb_Notes`+1,`Note`=".$Note." WHERE `ID_Annonce`=" . $_POST["ID_Annonce"];
            $result2 = @mysqli_query($idcom , $requete);
            if (!($result2)){
               echo "Erreur Update Note";
            }
        }
        if (!empty($_POST["Avis"])){
            $requete = "INSERT INTO `retour`(`ID_Auteur`, `Avis`) VALUES ('".$_SESSION["ID"]."','".$_POST["Avis"]."')";
            $result2 = @mysqli_query($idcom , $requete);
            if (!($result2)){
                echo "Erreur Update Avis";
            }
        }
        $requete = "UPDATE `log` SET `Moyenne`= (SELECT SUM(`Note`) FROM `annonces` WHERE `ID_Proprio`='".$Proprio."') / (SELECT COUNT(`ID_Annonce`) FROM `annonces` WHERE `ID_Proprio`='".$Proprio."') WHERE ID = '".$Proprio."'";
        $result2 = @mysqli_query($idcom , $requete);
        if ($result2){
            $requete = "UPDATE `reservations` SET Effectue = 1 WHERE `ID_Reservation`=" . $_POST["ID_Reservation"];
            $result2 = @mysqli_query($idcom , $requete);
            if (!($result2)){
                echo "Erreur Update Note";
            }
            echo "<script>alert('Votre avis a été pris en compte !');document.location.href = '../My_Account.php'</script>";
        }
        else{
            echo "Erreur Moyenne";
        }
    }
    else{
        echo "Erreur Select Note";
    }
}
else{
    echo "<script>alert('Vous n\'avez pas saisie de note !');document.location.href = '../Evaluer.php?ID_Annonce=".$_POST["ID_Annonce"]."&amp;Date=".$_POST["Date"]."'</script>";
}
