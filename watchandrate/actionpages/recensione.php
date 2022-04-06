<?php
require_once('../include/DBHandler.php');
$film=$_POST['nomeOpera'];
$descrizione=$_POST['recensione'];
$voto= $_POST['rate'];
$idUtente=$_SESSION['idUtente'];
Model::getInstance()->publishReview($film, htmlspecialchars($descrizione),$voto, $idUtente);
header('Location: ../userpages/homepage.php');
?>