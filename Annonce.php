<?php
/*------  On demarre la session ------*/
session_start();
/*------  Connection à la base de données ------*/
include("./Script/connex.inc.php");

/*------  inclusion des scripts ------*/
include("./Script/Script_Note.php");
include("./Script/Script_Compte.php");
include("./Script/Script_Annonce.php");

AnnonceVar($_GET["ID_Annonce"]);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <!-- ICON DE LA PAGE*/ -->
    <link rel="icon" href="./img/Icon.png"/>
    <title>ShareMyHouse | Annonce</title>

    <!--Div avec Logo du site et icone de l'utilisateur-->
    <link rel="stylesheet" href="./Css/Header.css">
    <link rel="stylesheet" href="./Css/Body.css">
    <link rel="stylesheet" href="./Css/Annonce.css">
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

<div class="Main_Annonce" style="background: url('./Img/Annonces/<?php echo $_GET["ID_Annonce"]?>/1.jpg') center no-repeat;background-size: cover">
    <div class="Title"><h1><?php echo $Titre?></h1></div>
    <div class="Info_Proprio" id="Info_Proprio">
        <?php AffNote($Note) ?><a href='./Other_Account.php?ID=<?php echo $ID_Proprio ?>' ><div class="Img_proprio" style="background: url('./Img/Comptes/<?php echo $ID_Proprio?>/Profil.jpg') center no-repeat; background-size: cover"></div></a>
    </div>
    <a href="#Info_Annonce"><img src="./Img/Down_Arrow.png" width="60px"></a>
</div>

<div class="Info_Annonce" id="Info_Annonce">
    <h1><?php echo $Titre?></h1>
    <hr>
    <div class="Desc">
        <p><?php echo $Desc ?></p>
    </div><!--
    --><div class ="Carac">
        <table >
            <tr>
                <td class="Prix" colspan="2"><?php echo $Prix?> €/nuit </td>
            </tr>
            <tr>
                <td class="Img"><img src="./Img/<?php echo ($Type=="Maison")? "House":"Appartements"?>.png"></td>
                <td><?php echo $Type?></td>
            </tr>
            <tr>
                <td class="Img"><img src="./Img/Lieu.png"></td>
                <td><?php echo $Lieu?></td>
            </tr>
            <tr>
                <td class="Img"><img src="./Img/Calendrier.png"></td>
                <td><?php echo $Date_Debut?></td>
            </tr>
            <tr>
                <td class="Img"><img src="./Img/Calendrier.png"></td>
                <td><?php echo $Date_Fin?></td>
            </tr>
            <tr>
                <td class="Img"><img src="./Img/Homme.png"></td>
                <td><?php echo $Nbpers?></td>
            </tr>
        </table>
    </div>
    <hr>
    <form action="./Script/Script_Annonce_Reservation.php" method="post">
        <p>Seclectionnez Les dates de debut et de fin de votre sejour faites valises </p>
        <input type="hidden" name="ID_Annonce" value="<?php echo $_GET["ID_Annonce"]?>">
        <input type="hidden" name="Date_Debut_Dispo" value="<?php echo $Date_Debut?>">
        <input type="hidden" name="Date_Fin_Dispo" value="<?php echo $Date_Fin?>">
        <input type="date" name="Date_Debut_Sejour" max="<?php echo $Date_Fin?>" min="<?php echo $Date_Debut?>">
        <input type="date" name="Date_Fin_Sejour" max="<?php echo $Date_Fin?>" min="<?php echo $Date_Debut?>">
        <br>
        <input type="submit" name="submit">
    </form>
</div>


<!-- FEET -->
<div class="Feet">
    <p>ShareMyHouse is optimized for Sharing houses in peer to peer. Comments and ratings are constantly reviewed to avoid troubles, but we cannot warrant full correctness of all content. While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy. Copyright 1999-2019 by Refsnes Data. All Rights Reserved.
        Powered by ShareMyHouse</p>
    <a class="Home" href="Home.php"><img src="./Img/Icon.png" alt="Home"></a>
</div>
</body>
</html>
