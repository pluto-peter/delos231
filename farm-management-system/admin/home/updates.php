<?php
include 'inc/header.php';
include 'inc/side-bar.php';
?>


<?php
$sql = 'SELECT * FROM updates';
$result = mysqli_query($conn, $sql);
$update_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php

$ref = $message = '';

$refErr = $messageErr = '';


if (isset($_POST['submit'])) {
    if (empty($_POST['ref'])) {
        $refErr = 'Enter Reference';
    } else {
        $ref = filter_input(INPUT_POST,  'ref', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['message'])) {
        $messageErr = 'Enter Message or Update';
    } else {
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    
    if (empty($refErr) && empty($messageErr)) {
        //add data to mysql database
        $sql = "INSERT INTO updates (ref, message) VALUES ('$ref', '$message')";

        if (mysqli_query($conn, $sql)) {
            //success
            header('Location: updates.php#sqltable');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}


?>

<div class="updates">
    <form action="" method="post" class="updateform">
        <label for="ref">Reference:</label>
        <div class="errormsg"><?php echo $refErr; ?></div>
        <input type="text" name="ref" id="ref" <?php echo $refErr ? 'errormsg' : null; ?>>
        
        <textarea name="message" id="message" placeholder="Enter Message or Update" <?php echo $refErr ? 'errormsg' : null; ?>></textarea>
        <div class="errormsg"><?php echo $messageErr; ?></div>
        <input type="submit" value="send message" class="vehiclesubmitbtn" name="submit">
    </form>
</div>

<div class="updatepanel" id="updatepanel">

    <h1 class="priority_header">recent updates</h1>
<div class="updt1">
    <?php if (empty($update_data)) : ?>
        <p>No Updates</p>
    <?php endif; ?>

    <?php foreach ($update_data as $item) : ?>
<div>
        <h1><?php echo $item['ref']; ?></h1>
        <p><?php echo $item['message']; ?></p>
        </div>
    <?php endforeach; ?>

</div>
</div>

<?php include 'inc/footer.php' ;?>

