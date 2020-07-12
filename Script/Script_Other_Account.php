<?php
$idcom=connex("myparam");

$requete = "SELECT `Nom`,`Prenom`,`Numero`,`Moyenne` FROM `log` WHERE ID='".$_GET["ID"]."'";
$result=@mysqli_query($idcom,$requete);
while($row = $result->fetch_array())
{
  $Nom = $row["Nom"];
  $Prenom = $row["Prenom"];
  $Numero = $row["Numero"];
  $Moyenne = $row["Moyenne"];
}
