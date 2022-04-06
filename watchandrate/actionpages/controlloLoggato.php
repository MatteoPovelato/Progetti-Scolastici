<?php
if(!isset($_SESSION['idUtente'])){
    header('Location: ../userpages/loginPage.php');
    exit;
}
?>