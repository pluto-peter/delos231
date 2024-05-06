<?php
include 'config/database.php';

?>

<?php

if(isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];
    $sql = "DELETE from `cropprotection` WHERE id = $id";
    $conn -> query($sql);

}

header('location: priority_tasks.php#sqltable1');
exit;
?>
