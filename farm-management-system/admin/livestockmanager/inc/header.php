<?php include 'config/database.php'; ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/task-management.css">
    <link rel="stylesheet" href="css/irrigation.css">
    <link rel="stylesheet" href="css/pestcontrol.css">
    <link rel="stylesheet" href="css/planting.css">
    <link rel="stylesheet" href="css/harvesting.css">
    <link rel="stylesheet" href="css/stallcleaning.css">
    <link rel="stylesheet" href="css/milking.css">
    <link rel="stylesheet" href="css/treeplanting.css">
    <link rel="stylesheet" href="css/generaltasks.css">
    <link rel="stylesheet" href="css/livestockmanager.css">
    <title>farm management</title>
</head>

<body>
    <header>
        <div class="nav0">
            <img src="images/drawinggood6.svg" alt="" class="logo">

            <?php
            session_start();

if(isset($_SESSION['username'])){
    echo '<h1>Hello, ' . $_SESSION['username'] . '</h1>';
} else {
    header('location: /delos/farm-management-system/login.php');
}

?>
            <div class="icons1">
                <div class="add-users-icon">
                    <img src="images/user-group.svg" alt="">
                    <a href="/delos/farm-management-system/admin/home/manageusers.php">Manage Users</a>
                </div>
                <div class="log-out-btn">
                    <img src="images/power-off.svg" alt="">
                    <a href="/delos/farm-management-system/log-out.php">Log Out</a>
                </div>
            </div>
        </div>



        <nav class="top-nav">
        <div class="topbtn">
            <img src="images/bars.svg" class="menubtn">

        </div>
            <div class="navmenu">
            <div class="menu"><a href="../home/homedash.php">home</a></div>
            <div class="menu"><a href="../taskmanager/priority_tasks.php">task manager</a></div>
            <div class="menu"><a href="../cropmanager/cropmanager.php">crop manager</a></div>
            <div class="menu"><a href="../livestockmanager/livestockmanager.php">livestock manager</a></div>
            <div class="menu"><a href="../tourmanager/tourmanager.php">tour manager</a></div>
            <div class="menu"><a href="../expensemanager/expensemanager.php">expense manager</a></div>
            </div>
        </nav>
    </header>

    <div class="container">