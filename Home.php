<?php
/*------  On demarre la session ------*/
session_start();
/*------  Connection à la base de données ------*/
include("./Script/connex.inc.php");

/*------  inclusion des scripts ------*/
include("./Script/Script_Compte.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <meta charset="utf-8">

    <!-- ICON DE LA PAGE -->
    <link href="./Img/Icon.png" rel="icon"/>
    <title>ShareMyHouse | Home</title>

    <!-- PAGES CSS -->
    <link rel="stylesheet" href="./Css/Header.css">
    <link rel="stylesheet" href="./Css/Body.css">
    <link rel="stylesheet" href="./Css/Home.css">
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

<div class="Presentation_Body">
    <div class="Logo_Nom"><img src="./Img/Icon.png" alt="">
        <p>SHARE MY<br>HOUSE</p></div>
    <div class="Slogan"><p class="Slogan">RECHERCHER<br>PROPOSER<br>PROFITER</p></div>
    <a href="#Img_Body"><img src="./Img/Down_Arrow.png" alt="Down_Arrow" width="60px" height="60px"></a>
</div>

<!-- IMAGE DE NAVIAGTION-->
<div class="Img_Body" id="Img_Body">
    <div class="Img_Left">
        <div class="White_div">
            <p>Proposer un bien</p>
            <input type="button" value="Proposer" onclick="location.href='./Proposer.php';">
        </div>
    </div><!--
     --><div class="Img_Right">
        <div class="White_div">
            <p>Rechercher un bien</p>
            <input type="button" value="Rechercher" onclick="location.href='./Rechercher.php?requete=NULL';">
        </div>
    </div>
</div>

<hr>

<div class="Chiffres">
    <h1>Faites comme eux, partagez votre maison</h1>
    <span><h2><?php echo CompteTotalLogs() ?></h2>Inscrits sur ShareMyHouse</span><span><h2><?php echo CompteTotalAnnonces() ?></h2>Annonces sur ShareMyHouse</span>
</div>

<hr>

<div class="Info">
    <h1>À propos de ShareMyHouse</h1>
    <span><h2>ShareMyHouse qu'est-ce que c'est ?</h2>ShareMyHouse crée des liens entre les personnes grâce à la posibilité de<br>
        réserver des logements partout dans le monde. Les hôtes<br>constituent le moteur de la communauté et fournissent aux voyageurs<br>
        l'occasion unique de voyager comme s'ils étaient chez eux</span>
    <span><h2>Qu'est-ce que le partage de maison ?</h2>Si vous disposez d'une chambre supplémentaire, d'un logement entier ou<br>
                d'expertise en hébergement, vous pouvez gagner de l'argent en les <br>
                partageant avec des voyageurs du monde entier. Vous pouvez héberger<br>
                des voyageurs dans votre logement, organiser des expériences ou faire<br>
                les deux. Vous décidez à quel moment vous souhaitez héberger des <br>
                voyageurs.</span>
</div>

<div class="Share">
    <h1> Lancez vous !</h1>
    <br><input type="button" value="Commencer" onclick="location.href='./Proposer.php';">
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
