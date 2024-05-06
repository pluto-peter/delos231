<?php include 'inc/header.php'; ?>



<?php

$department = $section = $task = $status = $manager = '';
$departmentErr = $sectionErr = $taskErr = $statusErr = $managerErr = '';


if (isset($_POST['submit'])) {
    # code...
    if (empty($_POST['department'])) {
        # code...
        $departmentErr = 'Enter Department';
    } else {
        $department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['section'])) {
        # code...
        $sectionErr = 'Enter Section Name/No.';
    } else {
        $section = filter_input(INPUT_POST, 'section', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['task'])) {
        # code...
        $taskErr = 'Enter Assigned Task';
    } else {
        $task = filter_input(INPUT_POST, 'task', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['status'])) {
        # code...
        $statusErr = 'Enter Task Status';
    } else {
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['manager'])) {
        # code...
        $managerErr = 'Enter Your Name';
    } else {
        $manager = filter_input(INPUT_POST, 'manager', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($departmentErr) && empty($sectionErr) && empty($taskErr) && empty($statusErr) && empty($managerErr)) {

        $sql1 = "INSERT INTO taskreports (department, section, task, status, manager) VALUES ('$department', '$section', '$task', '$status', '$manager')";


    if (mysqli_query($conn, $sql1)) {
        //success
        header('Location: taskreports.php#sqltable');
    } else {
        echo 'Error: ' . mysqli_error($conn);
        die;
    }

    }
}

?>

<div class="taskreports">
    <h1>report task status</h1>
    <form action="" class="reportform" method="POST">
        <div>
        <label for="department">Department:</label>
        <input type="text" name="department" id="department" <?= $departmentErr ? 'errormsg' : null ; ?>>
        <div class="errormsg"><?= $departmentErr ?></div>
        <label for="section">Section:</label>
        <input type="text" name="section" id="section" <?= $sectionErr ? 'errormsg' : null ; ?>>
        <div class="errormsg"><?= $sectionErr ?></div>
        </div>
        <div>
        <label for="task">Task:</label>
        <input type="text" name="task" id="task" <?= $taskErr ? 'errormsg' : null ; ?>>
        <div class="errormsg"><?= $taskErr ?></div>
        <label for="status">Status:</label>
        <input type="text" name="status" id="status" <?= $statusErr ? 'errormsg' : null ; ?>>
        <div class="errormsg"><?= $statusErr ?></div>
        </div>
        <div>
        <label for="nanager">Manager:</label>
        <input type="text" name="manager" id="manager" <?= $managerErr ? 'errormsg' : null ; ?>>
        <div class="errormsg"><?= $managerErr ?></div>
        <input type="submit" value="submit report" name="submit" class="vehiclesubmitbtn" style="width: 15rem;">
        </div>
    </form>
</div>



<?php
$sql = 'SELECT * FROM taskreports';
$result = mysqli_query($conn, $sql);
$task_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>




<div class="sqltable" id="sqltable">

<h1 class="priority_header">task status reports</h1>

<?php if (empty($task_data)) : ?>
        <p>No Recent Tasks</p>
    <?php endif; ?>

    <?php foreach ($task_data as $item) : ?>

    <table>
        <thead>
            <th>department</th>
            <th>section</th>
            <th>task</th>
            <th>status</th>
            <th>manager</th>
            <th>date</th>
        </thead>

       
        <tbody>
            <td><?= $item['department'] ?></td>
            <td><?php echo $item['section']; ?></td>
            <td><?php echo $item['task']; ?></td>
            <td><?php echo $item['status']; ?></td>
            <td><?php echo $item['manager']; ?></td>
            <td><?php echo $item['date']; ?></td>
        </tbody>
    </table>

<?php endforeach; ?>

</div>



<?php include 'inc/footer.php'; ?>