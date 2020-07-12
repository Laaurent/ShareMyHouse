<?php

/*------  Connection ------*/
include("./connex.inc.php");
$idcom = connex("myparam");


/*------  Pas de champs ------*/
if (empty($_POST["Identifiant"]) && empty($_POST["password"])) {
  echo "<script>if(confirm('Aucun champs renseignés !')){document.location.href = '../Login.php'}</script>";
} else {
  $requete = "SELECT ID FROM log WHERE ID='" . $_POST["Identifiant"] . "'";
  $result = @mysqli_query($idcom , $requete);
  $nbID = mysqli_num_rows($result);
  /*------  N'existe pas dans la base ------*/
  if ($nbID == 0) {
    echo "<script>if(confirm('Vos identifiants ne coincident pas merci de vous inscrire sur le lien suivant !')){document.location.href = '../Logon.php'} </script>";
  } else {
    $requete = "SELECT ID FROM log WHERE ID='" . $_POST["Identifiant"] . "'AND Password='" . $_POST["password"] . "'";
    $result = @mysqli_query($idcom , $requete);
    $nbart = mysqli_num_rows($result);
    /*------  Existe dans la base mais mauvais mot de passe ------*/
    if ($nbart == 0) {
      echo "<script>if(confirm('Vos identifiants ne coincident pas merci de verifier votre mot de passe !')){document.location.href = '../Login.php'}</script>";
    } else {
      $requete = "SELECT Nom,Prenom,Moyenne FROM log WHERE ID='" . $_POST["Identifiant"] . "'";
      $result = @mysqli_query($idcom , $requete);
      while ($row = $result->fetch_array()) {
          session_start();
          $_SESSION['ID'] = $_POST["Identifiant"];
          $_SESSION['Prenom'] = $row["Prenom"];
          $_SESSION['Nom'] = $row["Nom"];
          $_SESSION['Moyenne'] = $row["Moyenne"];
      }
      echo "<script>alert('Vous etes connecté !');document.location.href = '../My_Account.php'</script>";
    }
  }
}
