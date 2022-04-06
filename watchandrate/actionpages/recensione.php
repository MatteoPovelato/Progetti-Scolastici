<?php
session_start();
require_once('../include/DBHandler.php');
$film=$_POST['nomeOpera'];
$descrizione=$_POST['recensione'];
$rate= $_POST['rate'];
$idUtente=$_SESSION['idUtente'];
Model::getInstance()->publishReview(htmlspecialchars($film), htmlspecialchars($descrizione), htmlspecialchars($rate), htmlspecialchars($idUtente));
header('Location: ../userpages/homepage.php');
?>