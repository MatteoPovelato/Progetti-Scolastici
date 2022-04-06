<?php
$nomeUtente = $_POST['nomeUtente'];
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT);
$email = $_POST['email'];
$dob = $_POST['dob'];  
Model::getInstance()->userRegistration(htmlspecialchars($nomeUtente), htmlspecialchars($password), htmlspecialchars($email), htmlspecialchars($dob));
header('Location: ../userpages/loginPage.php')
?>

