<?php
include 'inc/header.php';
include 'inc/side-bar.php';
?>


<?php

$fullname = $username = $email = $password = '';
$fullnameErr = $usernameErr = $emailErr = $passwordErr = '';

if (isset($_POST['submit'])) {
    # code...
    if (empty($_POST['fullname'])) {
        # code...
        $fullnameErr = 'Enter Full Name';
    } else {
        $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['username'])) {
        # code...
        $usernameErr = 'Enter User Name';
    } else {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['email'])) {
        # code...
        $emailErr = 'Enter Email';
    } else {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    }

    if (empty($_POST['password'])) {
        # code...
        $passwordErr = 'Enter Password';
    } else {
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($fullnameErr) && empty($usernameErr) && empty($emailErr) && empty($passwordErr)) {
        # code...
        $current_user = $_SESSION['username'];
        $sql = "UPDATE userdata SET `fullname` = '$fullname' , `username` = '$username' , `email` = '$email' , `password` = '$password' WHERE `username` = '$current_user'";

        if (mysqli_query($conn, $sql)) {
            header('location: manageprofile.php#newprofile');
        }
    }
}
?>

<?php


$current_user = $_SESSION['username'];

$sql2 = "SELECT * FROM userdata WHERE username = '$current_user'";
$querry2 = mysqli_query($conn, $sql2);
$new_data = mysqli_fetch_all($querry2, MYSQLI_ASSOC);

?>

<?php foreach ($new_data as $item) : ?>
    <div class="newprofile" id="newprofile">
        <h1>my profile</h1>
        <div class="details">
            <h2>fullname:</h2>
            <p><?= $item['fullname'] ?></p>
        </div>
        <div>
            <h2>username:</h2>
            <p><?= $item['username'] ?></p>
        </div>
        <div>
            <h2>email:</h2>
            <p><?= $item['email'] ?></p>
        </div>
        <div>
            <h2>usertype:</h2>
            <p><?= $item['usertype'] ?></p>
        </div>
    </div>
<?php endforeach; ?>








<?php

$current_user = $_SESSION['username'];

$sql = "SELECT * FROM userdata WHERE username = '$current_user'";
$querry = mysqli_query($conn, $sql);
$my_data = mysqli_fetch_all($querry, MYSQLI_ASSOC);

?>


<?php foreach ($my_data as $item) : ?>



    <div class="adduser">
        <form action="" method="post" class="newuser">
            <div>
                <label for="fullname">Full Name:</label>
                <input type="text" name="fullname" id="fullname" value="<?php echo $item['fullname']; ?>" <?= $fullnameErr ? 'errormsg' : null; ?>>
                <div class="errormsg"><?= $fullnameErr ?></div>
            </div>
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?php echo $item['username']; ?>" <?= $usernameErr ? 'errormsg' : null; ?>>
                <div class="errormsg"><?= $usernameErr ?></div>
            </div>
            <div>
                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" value="<?php echo $item['email']; ?>" <?= $emailErr ? 'errormsg' : null; ?>>
                <div class="errormsg"><?= $emailErr ?></div>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" value="<?php echo $item['password']; ?>" <?= $passwordErr ? 'errormsg' : null; ?>>
                <div class="errormsg"><?= $passwordErr ?></div>
            </div>
            <div>
                <input type="submit" value="save changes" name="submit" class="vehiclesubmitbtn btn7">
            </div>
        </form>
        <div style="text-align: center; margin-top:1rem;">
            <p>Log out and sign in again to effect the changes.</p>
        </div>
    </div>
<?php endforeach; ?>



<?php include 'inc/footer.php'; ?>