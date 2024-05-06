<?php
include 'config/database.php';

?>

<?php

if(isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];
    $sql = "DELETE from `planting` WHERE id = $id";
    $conn -> query($sql);

}

header('location: planting.php#sqltable2');
exit;
?>
