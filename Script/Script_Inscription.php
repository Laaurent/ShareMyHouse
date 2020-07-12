<?php

/**
 * @param string $email
 * @return bool
 */
function TestEmail($email)
{
  if (preg_match("/^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i" , $email)) {
    return true;
  } else {
    return false;
  }
}

/**
 * @param string $num
 * @return bool
 */
function TestNum($num)
{
  if (preg_match("/^(\d\d){5}$/" , $num)) {
    return true;
  } else {
    return false;
  }
}

/*------  Connection ------*/
include("./connex.inc.php");
$idcom = connex("myparam");

if (empty($_POST["Identifiant"]) && empty($_POST["Email"]) && empty($_POST["password"]) && empty($_POST["password2"]) && empty($_POST["Nom"]) && empty($_POST["Prenom"]) && empty($_POST["Numero"])) {
  if (empty($_SESSION["ID"])) {
    echo "<script>if(confirm('Aucun champs renseignés !')){document.location.href = '../Logon.php'}</script>";
  }
} else {
  if ($_POST["password"] == $_POST["password2"]) {
    if (TestEmail($_POST["Email"])){
      if (TestNum($_POST["Numero"])){
        $requete = "SELECT ID FROM log WHERE ID='" . $_POST["Identifiant"] . "'";
        $result = @mysqli_query($idcom , $requete);
        $nbID = mysqli_num_rows($result);
        if ($nbID == 1) {
          echo "<script>if(confirm('Vous etes deja inscrit merci de vous connecter !')){document.location.href = '../Logon.php'}</script>";
        } else {
          $requete = "INSERT INTO `log`(`ID`, `Email`, `Password`, `Nom`, `Prenom`, `Numero`) VALUES ('" . $_POST["Identifiant"] . "','" . $_POST["Email"] . "','" . $_POST["password"] . "','" . $_POST["Nom"] . "','" . $_POST["Prenom"] . "','" . $_POST["Numero"] . "')";
          $result = @mysqli_query($idcom , $requete);
          if ($result) {
            echo "<br> Vous etes maintenant inscrit <br>";
            session_start();
            $_SESSION['ID'] = $_POST["Identifiant"];
            $_SESSION['Email'] = $_POST["Email"];
            $_SESSION['Prenom'] = $_POST["Prenom"];
            $_SESSION['Nom'] = $_POST["Nom"];
            $_SESSION['Num'] = $_POST["Numero"];
            $_SESSION["Moyenne"] = 0;
            mkdir("../Img/Comptes/" . $_SESSION["ID"] , 0777);
            copy("../Img/Contact.png" , "../Img/Comptes/" . $_SESSION["ID"] . "/Profil.jpg");
            echo "<script>alert('Vous etes inscrit !');document.location.href = '../My_Account.php'</script>";
          }
        }
      }
      else{
        echo "<script>if(confirm('Votre Numero est non valide !')){document.location.href = '../Logon.php'}</script>";
      }
    }
    else{
      echo "<script>if(confirm('Votre Email est non valide !')){document.location.href = '../Logon.php'}</script>";
    }
  } else {
    echo "<script>if(confirm('Vos Mots de Passe ne coincident pas!')){document.location.href = '../Logon.php'}</script>";
  }
}
