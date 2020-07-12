<?php
/*------  On demarre la session ------*/
session_start();
/*------  Connection à la base de données ------*/
include("./Script/connex.inc.php");

/*------  inclusion des scripts ------*/
include("./Script/Script_Compte.php");
include("./Script/Script_Evaluer.php");
TestEvaluer();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <meta charset="utf-8">

    <!-- ICON DE LA PAGE -->
    <link href="./Img/Icon.png" rel="icon"/>
    <title>ShareMyHouse | Evaluer</title>

    <!-- PAGES CSS -->
    <link rel="stylesheet" href="./Css/Header.css">
    <link rel="stylesheet" href="./Css/Body.css">
    <link rel="stylesheet" href="./Css/Evaluer.css">
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
    <div class="Img" style="background: url('./Img/Annonces/<?php echo $_GET["ID_Annonce"]?>/1.jpg') center no-repeat;background-size: cover"></div>
    <p>Que votre sejour ait été Radieux ou catastrophique, les équipes de ShareMyHouse feront de leur mieux pour que la prochaine fois il soit encore meilleur !</p>
    <div class="Formulaire">
        <img src="./Img/Note.png" alt="Note" width="40%">
        <h1>Comment avez-vous trouvé votre Sejour ?</h1>
        <p> Noter votre sejour sur 5</p>
        <form action="./Script/Script_Evaluer_Note.php" method="post">
            <input type="hidden" name="ID_Annonce" value="<?php echo $_GET["ID_Annonce"]?>">
            <input type="hidden" name="Date" value="<?php echo $_GET["Date"]?>">
            <input type="hidden" name="ID_Reservation" value="<?php echo $_GET["ID_reservation"]?>">
            <input type="number" name="Note" step="0.1" min="0" placeholder="Note ">
            <p>Les informations que vous saisirez ne seront lu que par nos equipes et permettent d'ameliorer notre service</p>
            <textarea name="Avis" placeholder="Avis sur les services ShareMyHouse"></textarea>
            <input type="submit" name="submit" value="ENVOYER">
        </form>
    </div>

</div>

<!-- FEET -->
<div class="Feet">
    <p>ShareMyHouse is optimized for Sharing houses in peer to peer. Comments and ratings are constantly reviewed to
        avoid troubles, but we cannot warrant full correctness of all content. While using this site, you agree to have
        read and accepted our terms of use, cookie and privacy policy. Copyright 1999-2019 by Refsnes Data. All Rights
        Reserved.
        Powered by ShareMyHouse</p>
    <a class="Home" href="Home.php"><img src="./Img/Icon.png" alt="Home"></a>
</div>

</body>
</html>
