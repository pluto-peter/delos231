<?php
include 'config/database.php';

?>

<?php

if(isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];
    $sql = "DELETE from `requests` WHERE id = $id";
    $conn -> query($sql);

}

header('location: cropmanager.php#sqltable2');
exit;
?>