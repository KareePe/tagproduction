<?php
    require '../config/dbconfig.php';

    if (!empty($_SESSION['user_id'])) {
        header('Location: pages/home');
    }else{
        header('Location: pages/auth');
    }
?>