<?php
session_start();

if (isset($_SESSION['admin'])){

    $_SESSION['admin'] = array();

    session_destroy();

    header("Location: ../index.php");
}

?>