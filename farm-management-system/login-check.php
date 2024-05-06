

<?php include 'admin/cropmanager/config/database.php'; ?>



<?php
session_start();

if (isset($_POST['submit'])) {
    # code...
    $username = $_POST['username'];
    $pass = $_POST['password'];
    //$hash = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM userdata WHERE username = '$username' AND password = '$pass'";

    $result = mysqli_query($conn, $sql);
    $usertypes = mysqli_fetch_array($result);

    if($usertypes['usertype'] === 'admin'){

       
        $_SESSION['role'] = $usertypes['usertype'];
        $_SESSION['username'] = $usertypes['username'];
        
        header('location: /delos/farm-management-system/admin/home/homedash.php');
    } elseif ($usertypes['usertype'] === 'staff') {
        # code...
        
        $_SESSION['role'] = $usertypes['usertype'];
        $_SESSION['username'] = $usertypes['username'];

        header('location: /delos/farm-management-system/staff/staffhomedash.php');
    } else {
        
        header('location: /delos/farm-management-system/login.php');        
    }

    //three equals signs
        
}

?>