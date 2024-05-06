<?php
include 'config/database.php';

?>

<style>

body{
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

label{
    line-height: 1.7;
}

input{
    outline: none;
    border-radius: 10px;
    border: none;
    padding: 10px;
    margin-bottom: 1rem;
}

div.adduser{
    padding: 2%;
    width: 96%;
    margin: 0 auto;
    background-color: #aaffaa;
    border-radius: 10px;
    margin-top: 2rem;
}

.adduser h1{
    text-align: center;
    text-transform: uppercase;
    margin-bottom: 2rem;
}

.newuser{
    display: flex;
    flex-direction: column;
}

.btn7{
    padding: 16px 20px;
    align-items: center;
    border-radius: 20px;
    background-color: #323232;
    color: aliceblue;
    border: none;
    text-transform: uppercase;
    width: 15rem;
   
}

.btn7:hover{
    background-color: #006400;
    color: white;
}

</style>

<?php
//$name = $email = $type = $password = '';
//$nameErr = $emailErr = $passwordErr = $typeErr = '';

?>

<?php
if (isset($_GET['id'])){
    # code...
    $id = $_GET['id'];

    $sql = "SELECT * FROM userdata WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $newUser_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

<?php foreach ($newUser_data as $item) : ?>




    <div class="adduser">
        <h1>Edit profile</h1>
        <form action="" method="post" class="newuser">
            <label for="fullname">Full Name:</label>
            <input type="text" name="fullname" id="fullname" value="<?php echo $item['fullname']; ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo $item['username']; ?>">
            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" value="<?php echo $item['email']; ?>">
            <label for="usertype">Type:</label>
            <input type="text" name="usertype" id="usertype" value="<?php echo $item['usertype']; ?>">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="<?php echo $item['password']; ?>">
            <input type="submit" value="submit" name="submit" class="vehiclesubmitbtn btn7">
        </form>
    </div>

    <?php endforeach; ?>


<?php

$fullname = $username = $email = $usertype = $password = '';
$fullnameErr = $usernameErr = $emailErr = $usertypeErr = $passwordErr = '';


if (isset($_POST['submit'])) {
    # code...
    if (empty($_POST['fullname'])) {
        # code...
        $fullnameErr = 'Enter Full Name';
    } else {
        $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if (empty($_POST['username'])) {
        $usernameErr = 'Enter User Name';
    } else {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['email'])) {
        # code...
        $emailErr = "Enter Email Address";
    } else {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['usertype'])) {
        # code...
        $usertypeErr = 'Enter usertype';
    } else {
        $usertype = filter_input(INPUT_POST, 'usertype', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['password'])) {
        # code...
        $passwordErr = 'Enter Password';
    } else {
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        //$hashed = password_hash($password, PASSWORD_DEFAULT);
    }

    if (empty($fullnameErr) && empty($usernameErr) && empty($emailErr) && empty($usertypeErr) && empty($passwordErr)) {

    $sql2 = "UPDATE `userdata`  SET `fullname` = '$fullname' , `username` = '$username' , `email` = '$email' , `usertype` = '$usertype' , `password` = '$password' WHERE `id` = '$id'";

    if (mysqli_query($conn, $sql2)) {
        //success
        header('Location: manageusers.php');
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }

    }
}

    ?>