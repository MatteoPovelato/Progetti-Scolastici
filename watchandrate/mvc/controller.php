<?php
$req= $_GET['req'];
    switch ($req) {
        case 'registrationPage':
            header('Location: ../userpages/registrationPage.php');
            exit;
            break;
            case'recensionepage':
                header('Location: ../userpages/recensionepage.php');
                exit;
                break;
        case 'insertShop':
            break;
    }


