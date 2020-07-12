<?php
/**
 * Created by PhpStorm.
 * User: laurent
 * Date: 28/03/2019
 * Time: 16:52
 */


function TestEvaluer()
{
    if ( strtotime(date("Y-m-d H:i:s")) < strtotime($_GET["Date"])){
        echo "<script>alert('Il est encore trop tot pour evaluer votre hote, revenez plus tard !');document.location.href = './My_Account.php'</script>";
    }
}