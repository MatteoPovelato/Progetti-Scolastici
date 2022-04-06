<?php
// read pages.json into $json which is a string
$json = file_get_contents('../include/pages.json');
/*var_dump($json);
echo '<br>';*/
$pageName = basename($_SERVER['PHP_SELF']);
/*echo $pageName;
echo '<br>';*/
// 
$obj = json_decode($json);
/*echo $obj->name;
echo '<br>';
echo $obj->userpages[0];*/
if(in_array($pageName, $obj->userpages)){
    require 'downUserMenu.php';
}elseIf(in_array($pageName, $obj->adminpages)){
    require 'downUserMenu.php';
}elseIf(in_array($pageName, $obj->loginpages)){
    require 'downUserMenu.php';
}