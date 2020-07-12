<?php
/*------  On demarre la session ------*/
session_start();
/*------  Connection à la base de données ------*/
include("./Script/connex.inc.php");

/*------  inclusion des scripts ------*/
include("./Script/Script_Compte.php");
include("./Script/Script_Note.php");
include("./Script/Script_Rechercher.php");

TestDispoAnnonce();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <meta charset="utf-8">

    <!-- ICON DE LA PAGE -->
    <link href="./Img/Icon.png" rel="icon"/>
    <title>ShareMyHouse | Rechercher</title>

    <!-- PAGES CSS -->
    <link rel="stylesheet" href="./Css/Header.css">
    <link rel="stylesheet" href="./Css/Body.css">
    <link rel="stylesheet" href="./Css/Rechercher.css">
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

    <form method="post" action="./Script/Script_Rechercher_Annonce.php">
        <div class="Recherche_Header">
            <p>Que vous cherchiez un week-end à Paris ou un mois de vacances au soleil, nous sommes là pour vous aider.<br>Recherchez parmis des milliers d'annonces le logement qui vous fait rever vous et votre famille aussi grande soit-elle ! </p>
            <div class="Formulaire">

                <h1>Recherchez le logement de vos rêves !</h1>
                <table>
                    <tr>
                        <td colspan="2"><label for="Mot_Clef">Recherche par mots clefs :</label></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" id="Mot_Clef" name="Mot_Clef" placeholder="Mots Clefs"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label for="Lieux">Lieu souhaité de votre sejour :</label></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" id="Lieux" name="Lieux" placeholder="Lieux"></td>
                    </tr>
                    <tr>
                        <td><label for="Date_Debut">Date du debut de votre sejour :</label></td>
                        <td><input id="Date_Debut" type="date" name="Date_Debut"></td>
                    </tr>
                    <tr>
                        <td><label for="Date_Fin">Date de fin de votre sejour :</label></td>
                        <td><input id="Date_Fin" type="date" name="Date_Fin"></td>
                    </tr>
                    <tr>
                        <td><label for="Personnes">Nombre de personnes prevu pour le sejour :</label></td>
                        <td><label for="Prix">Prix à la nuit pour le logement :</label></td>
                    </tr>
                    <tr>
                        <td><input id="Personnes" type="number" name="Personnes" placeholder="Personnes" min="0"></td>
                        <td>
                            <select name="Prix" id="Prix">
                                <option value="">Choisissez un prix</option>
                                <option value="<100">Moins de 100€</option>
                                <option value="between 100 and 150">100€ - 150€</option>
                                <option value="between 150 and 200">150€ - 200€</option>
                                <option value=">200">Plus de 200€</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Rechercher"></td>
                    </tr>
                </table>
                <a href="#Affichage_Annonces"><img src="./Img/Down_Arrow.png" alt="Down_Arrow" width="60px" height="60px"></a>
            </div>
        </div>
    </form>

    <div class="Affichage_Annonces" id="Affichage_Annonces">
    	<?php AffAnnoncesRechercher($_GET["requete"]);?>
    </div>

    <!-- FEET -->
    <div class="Feet">
      <p>ShareMyHouse is optimized for Sharing houses in peer to peer. Comments and ratings are constantly reviewed to avoid troubles, but we cannot warrant full correctness of all content. While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy. Copyright 1999-2019 by Refsnes Data. All Rights Reserved.
        Powered by ShareMyHouse</p>
        <a class="Home" href="Home.php"><img src="./Img/Icon.png" alt="Home"></a>
    </div>
  </body>
</html>
