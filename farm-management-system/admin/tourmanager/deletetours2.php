<?php
include 'config/database.php';

?>

<?php

if(isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];
    $sql = "DELETE from `groups` WHERE id = $id";
    $conn -> query($sql);

}

header('location: tourmanager.php#groups');
exit;
?>
