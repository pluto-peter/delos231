<?php include 'config/database.php'; 


if (isset($_POST['submit'])) {
    # code...
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $activities = $_POST['activities'];
    $arrival = $_POST['arrival'];
    $departure = $_POST['departure'];
    $campinglocation = $_POST['campinglocation'];
    $accomodation = $_POST['accomodation'];
    $rentals = $_POST['rentals'];
    $medicalissues = $_POST['medicalissues'];

    $sql = "INSERT INTO camping (firstname, lastname, phone, email, activities, arrival, departure, campinglocation, accomodation, rentals, medicalissues) VALUES ('$firstname', '$lastname', '$phone', '$email', '$activities', '$arrival', '$departure', '$campinglocation', '$accomodation', '$rentals', '$medicalissues')";
    $querry = mysqli_query($conn, $sql);

    header('location: camping.html');


}

?>
