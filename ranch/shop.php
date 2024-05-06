<?php

include 'config/database.php';

if (isset($_POST['submit'])) {
    # code...
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $deliverytime = $_POST['deliverytime'];
    $communication = $_POST['communication'];
    $instructions = $_POST['instructions'];

    $sql = "INSERT INTO deliveries (name, phone, email, address, deliverytime, communication, instructions) VALUES ('$name', '$phone', '$email', '$address', '$deliverytime', '$communication', '$instructions')";
    
    $querry = mysqli_query($conn, $sql);

    header('location: shoppingcart.html');
}

?>


