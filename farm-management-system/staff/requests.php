<?php include 'inc/header.php'; ?>



<?php

$department = $section = $request = $manager = '';
$departmentErr = $sectionErr = $requestErr = $managerErr = '';

if (isset($_POST['submit'])) {
    # code...
    if (empty($_POST['department'])) {
        # code...
        $departmentErr = 'Enter Department Name';
    } else {
        $department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['section'])) {
        # code...
        $sectionErr = 'Enter Section Name';
    } else {
        $section = filter_input(INPUT_POST, 'section', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['request'])) {
        # code...
        $requestErr = 'Enter Request';
    } else {
        $request = filter_input(INPUT_POST, 'request', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['manager'])) {
        # code...
        $managerErr = 'Enter Managers Name';
    } else {
        $manager = filter_input(INPUT_POST, 'manager', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($departmentErr) && empty($sectionErr) && empty($requestErr) && empty($managerErr)) {
        # code...
        $sql = "INSERT INTO inputrequests (department, section, request, manager) VALUES ('$department', '$section', '$request', '$manager')";
        
        if (mysqli_query($conn, $sql)) {
            //success
            header('Location: requests.php#sqltable');
        } else {
            echo 'Error: ' . mysqli_error($conn);
            die;
        }
    }
}

?>

<div class="requests">
    <h1>request for equipment, inputs, or supplies</h1>
    <form action="" method="post" class="requestform">
        <div>
        <label for="department">Department:</label>
        <input type="text" name="department" id="department" <?= $departmentErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?= $departmentErr ?></div>
        <label for="section">Section:</label>
        <input type="text" name="section" id="section" <?= $sectionErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?= $sectionErr ?></div>
        </div>
        <div>
        <label for="request">Request:</label>
        <input type="text" name="request" id="request" <?= $requestErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?= $requestErr ?></div>
        <label for="manager">Manager:</label>
        <input type="text" name="manager" id="manager" <?= $managerErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?= $managerErr ?></div>
        </div>
        <div>
        <input type="submit" value="send request" name="submit" class="vehiclesubmitbtn btn7">
        </div>
    </form>
</div>




<?php
$sql = 'SELECT * FROM inputrequests';
$result = mysqli_query($conn, $sql);
$input_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>




<div class="sqltable" id="sqltable">

<h1 class="priority_header">Supplies and equipment requests</h1>

<?php if (empty($input_data)) : ?>
        <p>No Recent Requests</p>
    <?php endif; ?>

    <?php foreach ($input_data as $item) : ?>

    <table>
        <thead>
            <th>department</th>
            <th>section</th>
            <th>request</th>
            <th>manager</th>
            <th>date</th>
        </thead>

       
        <tbody>
            <td><?= $item['department'] ?></td>
            <td><?php echo $item['section']; ?></td>
            <td><?php echo $item['request']; ?></td>
            <td><?php echo $item['manager']; ?></td>
            <td><?php echo $item['date']; ?></td>
        </tbody>
    </table>

<?php endforeach; ?>

</div>



<?php include 'inc/footer.php'; ?>
