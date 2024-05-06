<?php
include 'config/database.php';

?>

<?php

if(isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];
    $sql = "DELETE from `vehiclemaintenance` WHERE id = $id";
    $conn -> query($sql);

}

header('location: priority_tasks.php#sqltable');
exit;
?>
