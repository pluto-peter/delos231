<?php
include 'config/database.php';

?>

<?php

if(isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];
    $sql = "DELETE from `yields` WHERE id = $id";
    $conn -> query($sql);

}

header('location: cropmanager.php#sqltable3');
exit;
?>
