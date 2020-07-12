<?php
/*------  On demarre la session ------*/
session_start();

/*------  Connection ------*/
include("./connex.inc.php");

$idcom = connex("myparam");

if (!empty($_POST["Destinataire"]) && !empty($_POST["Objet"]) && !empty($_POST["Contenu"])) {
    $requete = "SELECT ID FROM Log WHERE ID='" . $_POST["Destinataire"] . "'";
    $result = @mysqli_query($idcom , $requete);
    $nbID = mysqli_num_rows($result);
    if ($nbID == 0) {
        echo "<script>if(confirm('Merci de renseigner un utilisateur valide !')){document.location.href = '../New_Message.php'}</script>";
    } else {
        $requete = "INSERT INTO `messages`(`ID_Expediteur`, `ID_Destinataire`, `Contenu`, `Objet`) VALUES ('" . $_SESSION["ID"] . "','" . $_POST["Destinataire"] . "','" . $_POST["Contenu"] . "','" . $_POST["Objet"] . "')";
        $result = @mysqli_query($idcom , $requete);
        if ($result) {
            echo "<script>alert('Message envoyé !');document.location.href = './My_Account.php'</script>";
        }
    }
}
else{
    echo "<script>if(confirm('Merci de renseigner tout les champs !')){document.location.href = '../New_Message.php'}</script>";
}
