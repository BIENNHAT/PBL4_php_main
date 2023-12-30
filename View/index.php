<?php
    session_start();
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        header('Location: ../View/listBot.php');
    } else {
        include_once('../View/noLogin.php');
    }
?>
