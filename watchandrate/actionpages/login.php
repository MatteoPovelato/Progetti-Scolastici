<?php
require_once('../include/dbHandler.php');
$nomeUtente= $_POST['nomeUtente'];
$password = $_POST['password'];
$res= Model::getInstance()->login(htmlspecialchars($nomeUtente), htmlspecialchars($password));
//echo "echo: ".$res.'<br>';
//var_dump($res);

$count= $res->rowCount();
if($count > 0){
   $rows= $res ->fetchAll();
  $id=  $_SESSION['idUtente'] =$rows[0]['idUtente'];
  
  echo $id;
    if(password_verify($password,$rows[0]['password'])){
        $_SESSION['password']=$password;
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