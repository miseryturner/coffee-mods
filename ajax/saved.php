<?php

session_start();

if($_POST['ID']) {
    $_SESSION['SAVED'][] = $_POST['ID'];
} elseif($_POST['DELETE_ID']) {
    foreach ($_SESSION['SAVED'] as $key => $value) {
        if($value == $_POST['DELETE_ID']) {
            unset($_SESSION['SAVED'][$key]);
        }
    }
}

print_r(json_encode($_SESSION['SAVED']));
