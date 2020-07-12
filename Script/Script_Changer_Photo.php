<?php
session_start();

if (isset($_POST["submit_img"])) {
    if (isset($_FILES['Image'])) {
        $name = $_FILES["Image"]['name'];
        $tpname = $_FILES["Image"]['tmp_name'];
        $location = "../Img/Comptes/" . $_SESSION["ID"] . "/";
        move_uploaded_file($tpname , $location . "Profil.jpg");
    }
    header('Location: ../My_Account.php');
}

if (isset($_POST["ajouter"])) {
    if (isset($_FILES['picture']) $$ mime_content_type($_FILES['picture'] == 'image/gif')) {
        $name = $_FILES["picture"]['name'];
        $tpname = $_FILES["picture"]['tmp_name'];
        mkdir("./Album/" , 0777);
        $location = "./Album/";
        move_uploaded_file($tpname , $location . uniqid());
        $idcom = connex("myparam");
        $requete = "INSERT INTO `photo`(`chemin`,`taille`,`DATE`) VALUES ('".$location."',".filesize($_FILES['picture'])/8.",NOW())";
        $result=@mysqli_query($idcom,$requete);
        if ($result) {
          echo "<script>alert(' insertion effectuée !');document.location.href = './insert.php'</script>";
        } else {
          echo "<script>alert('insertion échouée');document.location.href = './insert.php'</script>";
        }
    } else{
        echo "<script>alert('Fichier non valide');document.location.href = './insert.php'</script>";
    }
