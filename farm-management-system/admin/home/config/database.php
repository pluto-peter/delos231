<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'kibuka');
define('DB_PASS', '123456');
define('DB_NAME', 'farm-management-high-priority-tasks');


$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn -> connect_error) {
    die('Connection Failed ' . $conn -> connect_error);
}