<?php
session_start();
if(!isset($_SESSION['idUtente'])){
    header('Location: ../userpages/registrationPage.php');
    exit;
}else{
    header('Location: ../userpages/viewProfile.php');
    exit;
}

?>