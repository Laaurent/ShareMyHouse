<?php
/*------  On demarre la session ------*/
session_start();
/*------  Connection à la base de données ------*/
include("./Script/connex.inc.php");

/*------  inclusion des scripts ------*/
include("./Script/Script_Note.php");
include("./Script/Script_Compte.php");
include("./Script/Script_Other_Account.php");
include("./Script/Script_Rechercher.php");

$requete = "SELECT * FROM `annonces` WHERE `ID_Proprio`='".$_GET["ID"]."'";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <meta charset="utf-8">

    <!-- ICON DE LA PAGE -->
    <link href="./Img/Icon.png" rel="icon"/>
    <title>ShareMyHouse | Compte</title>

    <!-- PAGES CSS -->
    <link rel="stylesheet" href="./Css/Header.css">
    <link rel="stylesheet" href="./Css/Body.css">
    <link rel="stylesheet" href="./Css/Other_Account.css">
    <link rel="stylesheet" href="./Css/Feet.css">

</head>
<body>

<nav>
    <ul>
        <li class="Menu_Home"><a href="Home.php"><img src="./Img/Icon.png" alt=""></a></li>
        <li class="Menu_Proposer"><a href="./Proposer.php">Proposer</a></li>
        <li class="Menu_Rechercher"><a href="./Rechercher.php?requete=NULL">Chercher</a></li>
        <li class="Menu_Contact"><a href="#"><div class="Img_nav" style="background: url('<?php echo (isset($_SESSION["ID"]))?"./Img/Comptes/".$_SESSION["ID"]."/Profil.jpg" : "./Img/Contact.png";?>') center;background-size: cover"></div></a>
            <ul class="Submenu">
                <?php if (isset($_SESSION["ID"])) {
                    echo "<li><a href='My_Account.php'>Mon Compte  ( " . CompteMessages() . " )</a></li>";
                } ?>
                <?php if (!isset($_SESSION["ID"])) {
                    echo "<li><a href='Login.php'>Se Connecter</a></li>";
                } ?>
                <?php if (!isset($_SESSION["ID"])) {
                    echo "<li class='last'><a href='Logon.php'>S'inscrire</a></li>";
                } ?>
                <?php if (isset($_SESSION["ID"])) {
                    echo "<li class='last'><a href='./Script/Deconnexion.php'>Se déconnecter</a></li>";
                } ?>
            </ul>
        </li>
    </ul>
</nav>

<div class="Main_div">
    <div class="Main_div_back" id="Main_div_back"></div>
    <div class="Pop_up" id="Pop_up">
        <div class="Pop_up_Header">
            <p>Envie d'une nouvelle photo de profil ?</p>
        </div>
        <div class="Pop_up_Main">
            <form action="./Script/Script_Changer_Photo.php" enctype="multipart/form-data" method="post">
                <input type="file" name="Image" accept="image/jpeg">
                <input type="submit" name="submit_img" value="Envoyer">
            </form>
        </div>
    </div>
    <div class="Main_div_Header">
    </div>
    <div class="Gauche_Info">
        <div class="Gauche_Img_Info">
            <div class="Img" style="background: url('./Img/Comptes/<?php echo $_GET["ID"]?>/Profil.jpg')center center no-repeat;background-size: cover;"></div>
            <div class="Info">
                <p><?php echo $Nom." <span> ".$Prenom."</span>"; ?></p>
                <hr>
                    <?php AffNote($Moyenne)?>
            </div>
        </div>

    </div>
    <div class="Droite_Contenu">
        <div class="Droite_Header">
            <button id="Annonce_Button" onclick="#">Annonces</button><button onclick="location='./New_Message.php?ID=<?php echo $_GET["ID"]?>'">Contact</button>
        </div>
        <div class="Droite_main">
            <?php AffAnnoncesRechercher($requete);?>
        </div>

    </div>
</div>

    <!-- FEET -->
    <div class="Feet">
      <link rel="stylesheet" href="./Css/Feet.css">
      <p>ShareMyHouse is optimized for Sharing houses in peer to peer. Comments and ratings are constantly reviewed to avoid troubles, but we cannot warrant full correctness of all content. While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy. Copyright 1999-2019 by Refsnes Data. All Rights Reserved.
        Powered by ShareMyHouse</p>
        <a class="Home" href="Home.php"><img src="./Img/Icon.png" alt="Home"></a>
    </div>
  </body>
</html>
