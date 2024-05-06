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
    <link rel="stylesheet" href="css/updates.css">
    <link rel="stylesheet" href="css/departments.css">
    <link rel="stylesheet" href="css/taskreports.css">
    <link rel="stylesheet" href="css/inputrequests.css">
    <link rel="stylesheet" href="css/manageprofile.css">
    <link rel="stylesheet" href="css/staffhome.css">
    <title>farm management</title>
</head>

<body>
    <header>
        <div class="nav0">
            <img src="images/drawinggood6.svg" alt="" class="logo">
            <?php
            session_start();

            if (isset($_SESSION['username'])) {
                echo '<h1>Hello, ' . $_SESSION['username'] . '</h1>';
            } else {
                header('location: /farm-management-system/login.php');
            }

            ?>
            <div class="icons1">
                <div class="log-out-btn">
                    <img src="images/power-off.svg" alt="">
                    <a href="log-out.php">Log Out</a>
                </div>
            </div>
        </div>



        <nav class="top-nav">
            <!-- <div class="topbtn">
            <img src="images/bars.svg" class="menubtn">
        </div> -->
            <div class="navmenu">
                <div class="menu"><a href="staffhomedash.php">home</a></div>
                <div class="menu"><a href="tasks.php">pending tasks</a></div>
                <div class="menu"><a href="taskreports.php">task completion status</a></div>
                <div class="menu"><a href="requests.php">requests</a></div>
                <div class="menu"><a href="updates.php">updates and notifications</a></div>
                <div class="menu"><a href="departments.php">departments</a></div>
                <div class="menu"><a href="editprofile.php">my profile</a></div>
            </div>
        </nav>
    </header>

    <div class="container">