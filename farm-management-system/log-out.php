<?php
//admin logout
session_start();

session_destroy();
header('location: /delos/ranch/home.html');
?>

