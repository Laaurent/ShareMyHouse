<?php
/*------  On demarre la session ------*/
session_start();
/*------  Connection à la base de données ------*/
include("./Script/connex.inc.php");

/*------  inclusion des scripts ------*/
include("./Script/Script_Note.php");
include("./Script/Script_Compte.php");
include("./Script/Script_My_Account.php");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <meta charset="utf-8">

    <!-- ICON DE LA PAGE -->
    <link href="./Img/Icon.png" rel="icon"/>
    <title>ShareMyHouse | Mon compte</title>

    <!-- PAGES CSS -->
    <link rel="stylesheet" href="./Css/Header.css">
    <link rel="stylesheet" href="./Css/Body.css">
    <link rel="stylesheet" href="./Css/My_Account.css">
    <link rel="stylesheet" href="./Css/Feet.css">

    <script type="text/javascript">

        /*------  Affiche le tableau Message ------*/
        function AffMessage() {
            document.getElementById("Annonces").style.visibility = 'hidden';
            document.getElementById("Messages").style.visibility = 'visible';
            document.getElementById("Reservations").style.visibility = 'hidden';
            document.getElementById("Message_Button").style.borderBottom="2px solid #FFFFFF";
            document.getElementById("Annonce_Button").style.borderBottom="none";
            document.getElementById("Reservation_Button").style.borderBottom="none";
        }

        /*------  Affiche le tableau Annonce ------*/
        function AffAnnonce() {
            document.getElementById("Annonces").style.visibility = 'visible';
            document.getElementById("Messages").style.visibility = 'hidden';
            document.getElementById("Reservations").style.visibility = 'hidden';
            document.getElementById("Annonce_Button").style.borderBottom="2px solid #FFFFFF";
            document.getElementById("Message_Button").style.borderBottom="none";
            document.getElementById("Reservation_Button").style.borderBottom="none";
        }

        /*------  Affiche le tableau Reservations ------*/
        function AffReservation() {
            document.getElementById("Annonces").style.visibility = 'hidden';
            document.getElementById("Messages").style.visibility = 'hidden';
            document.getElementById("Reservations").style.visibility = 'visible';
            document.getElementById("Annonce_Button").style.borderBottom="none";
            document.getElementById("Message_Button").style.borderBottom="none";
            document.getElementById("Reservation_Button").style.borderBottom="2px solid #FFFFFF";
        }

        /*------  Affiche le PopUp de changement d'image ------*/
        function AffPopUp() {
            document.getElementById("Pop_up").style.display = 'block';
            document.getElementById("Main_div_back").style.display = 'block';
        }

    </script>

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
            <div class="Img" style="background: url('./Img/Comptes/<?php echo $_SESSION["ID"]?>/Profil.jpg')center center no-repeat;background-size: cover;"></div>
            <div class="Ajout_Img">
                <button id="Changer_Img" onclick="AffPopUp();"></button>
            </div>
            <div class="Info">
                <p><?php echo $_SESSION["Nom"]." <span> ".$_SESSION["Prenom"]."</span>"; ?></p>
                <hr>
                <?php AffNote($_SESSION['Moyenne'])?>
            </div>
        </div>
    </div>
    <div class="Droite_Contenu">
        <div class="Droite_Header">
            <button id="Annonce_Button" onclick="AffAnnonce()">Annonces</button><button id="Message_Button" onclick="AffMessage()">Messages</button><button id="Reservation_Button" onclick="AffReservation()">Reservations</button><button onclick="location='./New_Message.php'" style="background: url('./Img/Plus.png') no-repeat; background-size: contain"><br></button>
        </div>
        <div class="Droite_main">
            <?php AffAnnonces() ; AffMessages(); AffReservations()?>
        </div>

    </div>
</div>

    <!-- FEET -->
    <div class="Feet">
      <p>ShareMyHouse is optimized for Sharing houses in peer to peer. Comments and ratings are constantly reviewed to avoid troubles, but we cannot warrant full correctness of all content. While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy. Copyright 1999-2019 by Refsnes Data. All Rights Reserved.
        Powered by ShareMyHouse</p>
        <a class="Home" href="Home.php"><img src="./Img/Icon.png" alt="Home"></a>
    </div>
  </body>
</html>
