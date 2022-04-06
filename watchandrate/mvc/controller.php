<?php
$req= $_GET['req'];
    switch ($req) {
        case 'products':
            header('Location: ../userpages/products.php');
            exit;
            break;
        case'shops':
            header('Location: ../userpages/shops.php');
            exit;
            break;
        case 'registrationPage':
            header('Location: ../userpages/registrationPage.php');
            exit;
            break;
        case 'insertShop':
            break;
    }


