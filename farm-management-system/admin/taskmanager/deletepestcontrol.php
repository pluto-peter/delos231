<?php
include 'config/database.php';

?>

<?php

if(isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];
    $sql = "DELETE from `pestcontrol` WHERE id = $id";
    $conn -> query($sql);

}

header('location: pestcontrol.php#sqltable');
exit;
?>
