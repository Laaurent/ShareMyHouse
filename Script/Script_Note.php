<?php
/**
 * @param int $note
 */
function AffNote($note){
    $max = 5;
    $nbvide = $max - $note;
    $nbpleine = floor($note/1); //div euclidienne

    for ($i = 0; $i < $nbvide - 1; $i++) {
        echo "<img src='./Img/Etoile_Vide.png' alt='Etoile_Vide'>";
    }
    if (fmod($note, 1)>0){
        echo "<img src='./Img/Etoile_Moitier.png' alt='Etoile_Moitier'>";
    }
    else{
        echo "<img src='./Img/Etoile_Vide.png' alt='Etoile_vide'>";
    }
    for($i=0;$i<$nbpleine;$i++){
        echo "<img src='./Img/Etoile_Pleine.png' alt='Etoile_pleine'>";
    }
}