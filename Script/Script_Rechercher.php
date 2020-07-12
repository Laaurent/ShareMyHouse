<?php
/**
 * Created by PhpStorm.
 * User: laurent
 * Date: 27/03/2019
 * Time: 14:59
*/

/**
 * @param string $requete
 */
function AffAnnoncesRechercher(string $requete)
{
    if ($requete == 'NULL'){
        $requete = "SELECT `ID_Annonce`,`Titre`,`Lieu`,`Nb_personnes`,`Type`,`Prix`,`Note` FROM `annonces` WHERE Dispo=1";
    }
    $idcom = connex("myparam");
    $result = @mysqli_query($idcom , $requete);
    if ($result) {
        while ($row = $result->fetch_array()) {
            echo "<table id='Annonces'>
				    <tr>
				        <td rowspan='4' class='Image' onclick=\"location='./Annonce.php?ID_Annonce=" . $row["ID_Annonce"] . "'\" style=\"background:url('./Img/Annonces/" . $row["ID_Annonce"] . "/1.jpg') center;background-size:cover\"></td>
					    <td colspan='2' class='Titre'><h1>" . $row["Titre"] . "</h1></td>
					</tr>
					<tr>
					    <td class='Lieu'><img src='./Img/Lieu.png' alt='Lieu' width='3%'>" . $row["Lieu"] . "</td>
					    <td class='Note'>";
            AffNote($row["Note"]);
                echo "</td>
					</tr>
					<tr>
					    <td rowspan='2' class='Personnes'><img src='./Img/Homme.png' alt='Homme' width='4%'>" . $row["Nb_personnes"] . "</td>
					    <td class='Type'>" . $row["Type"] . "<img src='./Img/";
            if ($row["Type"] == "Maison") {
                echo "House.png";
            } else {
                echo "Appartements.png";
            }
            echo "' alt='type' width='6%'></td>
					</tr>
					<tr>
					    <td class='Prix'>" . $row["Prix"] . " €</td>
					</tr>
				</table>";
        }
        if (mysqli_num_rows($result) == 0) {
            echo "<p style='text-align: center'>Aucune annonces </p>";
        }
    }
    else{
        echo $requete;
        echo "Erreur Base";
    }
}

function TestDispoAnnonce(){

    $idcom = connex("myparam");

    $requete = "SELECT `ID_Annonce`,`Date_Fin_Dispo` FROM `annonces` WHERE `Dispo` = 1";
    $result = @mysqli_query($idcom , $requete);
    if ($result){
        while ($row = $result->fetch_array()) {
            if (strtotime($row["Date_Fin_Dispo"]) < strtotime(date("Y-m-d H:i:s"))) {
               $requete =  "UPDATE `annonces` SET `Dispo`= 0 WHERE ID_Annonce='".$row["ID_Annonce"]."'";
               $result = @mysqli_query($idcom , $requete);
               if (!$result){
                   echo "Erreur test annonce";
               }
            }
        }
    }else{
        echo "Erreur test annonce";
    }
}
