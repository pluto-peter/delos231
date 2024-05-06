<?php
include 'config/database.php';

?>

<?php

if(isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];
    $sql = "DELETE from `pasture` WHERE id = $id";
    $conn -> query($sql);

}

header('location: livestockmanager.php#sqltable2');
exit;
?>
