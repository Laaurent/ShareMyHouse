<?php
/*------  On demarre la session ------*/

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <meta charset="utf-8">

    <!-- ICON DE LA PAGE -->
    <link href="./Img/Icon.png" rel="icon"/>
    <title>ShareMyHouse | Se connecter</title>

    <!-- PAGES CSS -->
    <link rel="stylesheet" href="./Css/Header.css">
    <link rel="stylesheet" href="./Css/Body.css">
    <link rel="stylesheet" href="./Css/Login.css">
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

<!-- Div du titre la page  -->
    <div class="Title">
      <h1>Se connecter a Share My House</h1>
      <p class="Desc">Rejoingez la plus grande plateforme d'échange de maison en ligne</p>
    </div>

    <!-- Div contenant deux divs -->
    <div class="Main_div">
      <div class="Left">
        <div class="Left_form">
          <h1>Connectez-vous avec votre compte Share My House</h1>
          <form action="./Script/Script_Connection.php" class="Form_login" method="post">
            <input type="text" name="Identifiant" placeholder="Identifiant"><br>
            <input type="password" name="password" placeholder="Mot de Passe"><br>
            <input class="submit" type="submit" value="Se Connecter">
          </form>
        </div>
      </div> <!--
      --><div class="Right">
            <div class="Right_form">
              <h1>Vous n'êtes pas encore inscrit ?</h1>
              <p>Rejoignez notre communautée de partage de maison. Grâce à cette adhésion vous allez pouvoir économiser tout en profitant.</p>
              <a href="Logon.php"><input class="submit" type="button" value="S'inscrire"></a>
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
