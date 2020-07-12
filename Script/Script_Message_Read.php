<?php

$idcom=connex("myparam");

  $requete = "SELECT `ID_Expediteur`,`Objet`,`Contenu` FROM `messages` WHERE `ID_Message`='".$_GET["ID"]."'";
  $result=@mysqli_query($idcom,$requete);
  while($row = $result->fetch_array())
  {
      echo "<div class='Message_info'";
      echo "<p class='Expediteur'> Envoyé par :</p><h2>".$row['ID_Expediteur']."</h1>";
      echo "<p class='Objet'> Objet :</p><h4>".$row['Objet']."</h4>";
      echo "<p class='Contenu'>".$row['Contenu']."</div>";
      echo "</div>";
  }
  $requete = "UPDATE `messages` SET `Vu`= 1 WHERE `ID_Message`='".$_GET["ID"]."'";
  $result=@mysqli_query($idcom,$requete);

