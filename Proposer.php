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
    <title>ShareMyHouse | Proposer</title>

    <!-- PAGES CSS -->
    <link rel="stylesheet" href="./Css/Body.css">
    <link rel="stylesheet" href="./Css/Proposer.css">
    <link rel="stylesheet" href="./Css/Header.css">
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


<div class="Intro">
    <h1>Laissez-vous guider pour la création de votre annonce</h1>
    <hr>
    <table>
        <tr class="Image">
            <td class="Etape" style="background: url('./Img/Etapes/1.png') center no-repeat;background-size: contain"
                onclick="location='#Titre'"></td>
            <td class="Transition"></td>
            <td class="Etape" style="background: url('./Img/Etapes/2.png') center no-repeat;background-size: contain"
                onclick="location='#Desc'"></td>
            <td class="Transition"></td>
            <td class="Etape" style="background: url('./Img/Etapes/3.png') center no-repeat;background-size: contain"
                onclick="location='#Lieu'"></td>
            <td class="Transition"></td>
            <td class="Etape" style="background: url('./Img/Etapes/4.png') center no-repeat;background-size: contain"
                onclick="location='#Nbpers'"></td>
        </tr>
        <tr>
            <td>Le Titre</td>
            <td></td>
            <td>La Description</td>
            <td></td>
            <td>Le Lieu</td>
            <td></td>
            <td>Le Nombre de Personnes</td>
        </tr>
        <tr class="Image">
            <td></td>
            <td class="Etape" style="background: url('./Img/Etapes/5.png') center no-repeat;background-size: contain"
                onclick="location='#Type"></td>
            <td class="Transition"></td>
            <td class="Etape" style="background: url('./Img/Etapes/6.png') center no-repeat;background-size: contain"
                onclick="location='#Date'"></td>
            <td class="Transition"></td>
            <td class="Etape" style="background: url('./Img/Etapes/7.png') center no-repeat;background-size: contain"
                onclick="location='#Prix'"></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Le Type</td>
            <td></td>
            <td>La Date</td>
            <td></td>
            <td>Le Prix</td>
            <td></td>
        </tr>
    </table>
    <a href="#Titre"><img src="./Img/Down_Arrow.png" alt="Down_Arrow" width="60px" height="60px"></a>
</div>

<form action="./Script/Script_Proposer.php" method="post" enctype="multipart/form-data">
    <div class="Etape_Titre" id="Titre">
        <h1>Commencez par choisir le titre de votre annonce</h1>
        <p>Il sera la première chose que les utilisateurs verront alors veuillez a bien le choisir.</p>
        <input type="text" name="Titre" placeholder="Titre de votre annonce">
    </div>
    <hr>
    <div class="Etape_Desc" id="Desc">
        <h1>Comment decrirez-vous votre bien ?</h1>
        <p>N'hesitez pas a renseigner le plus d'information posible pour renseigner au mieux les utilisateurs.</p>
        <textarea name="Desc" placeholder="Description de votre annonce" rows="6"></textarea>
    </div>
    <hr>
    <div class="Etape_Lieu" id="Lieu">
        <h1>Renseignez L'adresse de votre annonce</h1>
        <p>Le lieu est un critere important pour les utilisateur, veillez a etre precis mais pas trop.</p>
        <input type="text" name="Lieu" placeholder="Lieu de votre annonce ( Ville )">
    </div>
    <hr>
    <div class="Etape_Nbpers" id="Nbpers">
        <h1>Combien de personnes votre annonce va-t-elle acceuillir ?</h1>
        <p>Reserver un appartement de 20m² pour 4 personnes n'est pas l'ideal ... C'est pourquoi vous devez renseigner
            le nombre de personnes maximum que votre bien peut acceuillir.</p>
        <input type="number" name="Nbpers" placeholder="Nombre de personnes maximum" min="0">
    </div>
    <hr>
    <div class="Etape_Type" id="Type">
        <h1>Precisez le type de votre logement</h1>
        <p>un appartement ? une maison ? ou un chateau ? Quelque soit le type de votre logement vous devez le renseigner.</p>
        <input type="text" name="Type" placeholder="Type du logement">
    </div>
    <hr>
    <div class="Etape_Date" id="Date">
        <h1>Pendant quelle periode l'annonce est-elle disonible ?</h1>
        <p>Vous souhaitez partager votre logement pour les vacances ou tout simplement un week-end ?</p>
        <input type="Date" name="Date_Debut"><input type="Date" name="Date_Fin">
    </div>
    <hr>
    <div class="Etape_prix" id="Prix">
        <h1>Vous y etes presque il ne reste que le prix !</h1>
        <p>Veillez à etre coherant avec le type de logement que vous proposez.</p>
        <input type="Number" name="Prix" placeholder="Prix a la nuit du logement">
    </div>
    <hr>
    <div class="Etape_photo">
        <h1>Vous avez oublié les photos !</h1>
        <p></p>
        <input type="file" name="Image" accept="image/jpeg">
    </div>
    <div class="Etape_valide">
        <h1>Felicitation vous avez terminez !</h1>
        <input type="submit" name="Submit" value="Valider">
    </div>
</form>

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
