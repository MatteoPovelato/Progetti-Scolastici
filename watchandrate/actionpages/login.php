<?php
session_start();
require_once('../include/DBHandler.php');
$nomeUtente= $_POST['nomeUtente'];
echo $nomeUtente.'<br>';
$password = $_POST['password'];
echo $password.'<br>';
$res= Model::getInstance()->login(htmlspecialchars($nomeUtente), htmlspecialchars($password));
//echo "echo: ".$res.'<br>';
//var_dump($res);

$count= $res->rowCount();
echo "Count= ". $count;
if($count > 0){
   $rows= $res ->fetchAll();
    $_SESSION['idUtente'] =$rows[0]['idUtente'];
    if(password_verify($password,$rows[0]['password'])){
        echo "E' andato! ";
        header('Location:../userpages/homepage.php');
        exit; 
    }else{
        echo "login fallito 1";
        header('Location:../userpages/loginFallito.php');
        exit; 
    }
} else {
   echo "login fallito 2";
    header('Location:../userpages/loginFallito.php');
    exit; 
}
?>