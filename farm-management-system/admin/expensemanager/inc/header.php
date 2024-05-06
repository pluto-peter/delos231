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
    <title>farm management</title>
</head>

<body>
    <header>
        <div class="nav0">
            <img src="images/drawinggood6.svg" alt="" class="logo">

            <?php
            session_start();

            if (isset($_SESSION['username'])) {
                # code...

                echo '<h1>Hi' . $_SESSION['username'] . '</h1>';
            } else {
                echo '<h1>welcome guest</h1>';
            }

            ?>
            <div class="icons1">
                <div class="add-users-icon">
                    <img src="images/user-group.svg" alt="">
                    <a href="manage-users.php">Manage Users</a>
                </div>
                <div class="log-out-btn">
                    <img src="images/power-off.svg" alt="">
                    <a href="log-out.php">Log Out</a>
                </div>
            </div>
        </div>



        <nav class="top-nav">
            <img src="images/bars.svg" class="menubtn" style="width: 25px; margin-left: 5%;">
        </nav>
    </header>

    <div class="container">