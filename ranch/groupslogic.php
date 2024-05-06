<?php include 'config/database.php'; 

if (isset($_POST['submit'])) {
    # code...
    $groupname = $_POST['groupname'];
    $teammanager = $_POST['teammanager'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $activities = $_POST['activities'];
    $arrival = $_POST['arrival'];
    $departure = $_POST['departure'];
    $grpinfo = $_POST['grpinfo'];

    $sql = "INSERT INTO groups (groupname, teammanager, phone, email, activities, arrival, departure, grpinfo) VALUES ('$groupname', '$teammanager', '$phone', '$email', '$activities', '$arrival', '$departure', '$grpinfo')";

    //$querry = mysqli_query($conn, $sql);

    if (mysqli_query($conn, $sql)) {
        # code...
        $_SESSION['success'] = 'data submitted succesfully';
        header('location: groups.html');
    } else {
        //error
        echo 'Error: ' . mysqli_error($conn);
    }

    
}

?>