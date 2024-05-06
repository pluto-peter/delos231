<?php
include 'config/database.php';

?>

<?php

if(isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];
    $sql = "DELETE from `familyvacations` WHERE id = $id";
    $conn -> query($sql);

}

header('location: tourmanager.php#family');
exit;
?>
