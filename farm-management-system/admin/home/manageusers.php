<?php include 'inc/header.php'; ?>
<?php include 'inc/side-bar.php'; ?>





<?php

$fullname = $username = $email = $usertype = $password = '';
$fullnameErr = $usernameErr = $emailErr = $usertypeErr = $passwordErr = '';


if (isset($_POST['submit'])) {
    # code...
    
    if (empty($_POST['fullname'])) {
        # code...
        $fullnameErr = 'Enter Full Name';
    } else {
        $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
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
        //$hash = password_hash($password, PASSWORD_DEFAULT);
    }

    if (empty($picErr) && empty($fullnameErr) && empty($usernameErr) && empty($emailErr) && empty($usertypeErr) && empty($passwordErr)) {

        $sql1 = "INSERT INTO userdata (fullname, username, email, usertype, password) VALUES ('$fullname', '$username', '$email', '$usertype', '$password')";


        if (mysqli_query($conn, $sql1)) {
            //success
            header('Location: manageusers.php#sqltable');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}

?>





<div class="adduser">
    <h1>add new users</h1>
    <form action="" method="post" class="newuser">
        <div>
            <label for="fullname">Full Name:</label>
            <input type="text" name="fullname" id="fullname" <?php echo $fullnameErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?= $fullnameErr ?></div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" <?php echo $usernameErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?= $usernameErr ?></div>
        </div>
        <div>
            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" <?php echo $emailErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?= $emailErr ?></div>
            <label for="usertype">Type:</label>
            <input type="text" name="usertype" id="usertype" <?php echo $usertypeErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?= $usertypeErr ?></div>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" <?php echo $passwordErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?= $passwordErr ?></div>
            <input type="submit" value="add new user" name="submit" class="vehiclesubmitbtn btn7">
        </div>
    </form>
</div>






<?php
$current_user = $_SESSION['username'];

$sql = "SELECT * FROM userdata WHERE NOT id = '$current_user'";
$result = mysqli_query($conn, $sql);
$newUser_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>




<div class="sqltable" id="sqltable">

    <h1 class="priority_header">edit or delete user info</h1>

    <?php foreach ($newUser_data as $item) : ?>

        <table>
            <thead>
                <th>Full name</th>
                <th>user name</th>
                <th>email address</th>
                <th>user type</th>
                <th>password</th>
                <th>created on</th>
                <th>action</th>
            </thead>
            <tbody>
                <td><?= $item['fullname'] ?></td>
                <td><?php echo $item['username']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['usertype']; ?></td>
                <td><?php echo $item['password']; ?></td>
                <td><?php echo $item['date']; ?></td>
                <td>
                    <a href="edituserdata.php?id=<?php echo $item['id']; ?>" class="edit">EDIT</a>
                    <a href="deleteprofile.php?id=<?php echo $item['id']; ?>" class="del">DELETE</a>
                </td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>



<?php include 'inc/footer.php'; ?>