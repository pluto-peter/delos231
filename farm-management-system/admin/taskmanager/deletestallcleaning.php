<?php
include 'config/database.php';

?>

<?php

if(isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];
    $sql = "DELETE from `stallcleaning` WHERE id = $id";
    $conn -> query($sql);

}

header('location: stallcleaning.php#sqltable');
exit;
?>
