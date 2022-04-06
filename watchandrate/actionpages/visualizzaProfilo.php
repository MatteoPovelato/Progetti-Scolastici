<?php
    require_once('../include/DBHandler.php');
    require_once('../include/DBHandler.php');
    $res= Model::getInstance()->viewProfile(($_SESSION['idUtente']));
    $rows = $res->fetchAll();
    header('Location: ../userpages/viewProfile.php?username='.$rows[0]["username"]);
?>
