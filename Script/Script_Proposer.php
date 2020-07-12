<?php
session_start();
include("./connex.inc.php");
$idcom = connex("myparam");

if (isset($_SESSION["ID"])) {
    if (!empty($_POST["Titre"]) && !empty($_POST["Desc"]) && !empty($_POST["Lieu"]) && !empty($_POST["Nbpers"]) && !empty($_POST["Type"]) && !empty($_POST["Date_Debut"]) && !empty($_POST["Date_Fin"]) && !empty($_POST["Prix"])) {
        $requete = "INSERT INTO `annonces`(`ID_Proprio`, `Titre`, `Description`, `Lieu`, `Nb_personnes`, `Type`, `Date_Debut_Dispo`, `Date_Fin_Dispo`, `Prix`) 
VALUES ('" . $_SESSION["ID"] . "','" . $_POST["Titre"] . "','" . $_POST["Desc"] . "','" . $_POST["Lieu"] . "'," . $_POST["Nbpers"] . ",'" . $_POST["Type"] . "','" . $_POST["Date_Debut"] . "','" . $_POST["Date_Fin"] . "'," . $_POST["Prix"] . ")";
        $result = @mysqli_query($idcom , $requete);
        if ($result) {
            $requete = "SELECT MAX(`ID_Annonce`) FROM `annonces`WHERE `ID_Proprio`='" . $_SESSION["ID"] . "'";
            $result = @mysqli_query($idcom , $requete);
            while ($row = $result->fetch_array()) {
                mkdir("../Img/Annonces/" . $row[0] , 0777);
                if (isset($_FILES['Image'])) {
                    $name = $_FILES["Image"]['name'];
                    $tpname = $_FILES["Image"]['tmp_name'];
                    $location = "../Img/Annonces/".$row[0]."/";
                    move_uploaded_file($tpname, $location."1.jpg");
                }
            }
            echo "<script>alert('Votre annonce a bien été publié !');document.location.href = '../Rechercher.php?requete=NULL'</script>";
        }
    } else {
        echo "<script>if(confirm('Merci de renseigner tout les champs !')){document.location.href = '../Proposer.php'}</script>";
    }
}
else {
    echo "<script>if(confirm('Merci de vous inscrire !')){document.location.href = '../Logon.php'}</script>";
}