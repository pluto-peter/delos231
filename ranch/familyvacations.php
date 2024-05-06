<?php include 'config/database.php';


if (isset($_POST['submit'])) {
    # code...
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $familyinfo = $_POST['familyinfo'];
    $activities = $_POST['activities'];
    $arrival = $_POST['arrival'];
    $departure = $_POST['departure'];

    $sql = "INSERT INTO familyvacations (firstname, lastname, email, phone, familyinfo, activities, arrival, departure) VALUES ('$firstname', '$lastname', '$email', '$phone', '$familyinfo', '$activities', '$arrival', '$departure')";

    $querry = mysqli_query($conn, $sql);

    header('location: familyvacations.html');

}

?>