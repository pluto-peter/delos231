<?php
include 'config/database.php';

?>

<?php

if(isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];
    $sql = "DELETE from `artificialinsemination` WHERE id = $id";
    $conn -> query($sql);

}

header('location: livestockmanager.php#sqltable3');
exit;
?>
