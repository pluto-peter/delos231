<?php
include 'inc/header.php';
include 'inc/side-bar.php';
?>


<?php
$sql = 'SELECT * FROM overduetasks';
$result = mysqli_query($conn, $sql);
$overdue_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php

$department = $section = $manager = $instructions = $deadline = '';
$departmentErr = $sectionErr = $managerErr = $instructionsErr = $deadlineErr = '';


if (isset($_POST['submit'])) {
    # code...
    if (empty($_POST['department'])) {
        # code...
        $departmentErr = 'Enter Department Name';
    } else {
        $department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['section'])) {
        $sectionErr = 'Enter Section Name';
    } else {
        $section = filter_input(INPUT_POST, 'section', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['manager'])) {
        # code...
        $managerErr = "Enter Managers Name";
    } else {
        $manager = filter_input(INPUT_POST, 'manager', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['instructions'])) {
        # code...
        $instructionsErr = 'Enter Short Instructions';
    } else {
        $instructions = filter_input(INPUT_POST, 'instructions', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['deadline'])) {
        # code...
        $deadlineErr = 'Enter Deadline';
    } else {
        $deadline = filter_input(INPUT_POST, 'deadline', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($departmentErr) && empty($sectionErr) && empty($managerErr) && empty($instructionsErr) && empty($deadlineErr)) {
        //add data to mysql database
        $sql = "INSERT INTO overduetasks (department, section, manager, instructions, deadline) VALUES ('$department', '$section', '$manager', '$instructions', '$deadline')";

        if (mysqli_query($conn, $sql)) {
            //success
            header('Location: overdue.php#sqltable');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}



?>

<div class="overdue">
    <h1>set deadline for overdue or pending task</h1>
    <form action="" method="post" class="overdueform">
        <div>
        <label for="department">Department:</label>
        <input type="text" name="department" id="department" <?php echo $departmentErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?= $departmentErr ?></div>
        <label for="section">Section Name/No.:</label>
        <input type="text" name="section" id="section" <?php echo $sectionErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?= $sectionErr ?></div>
        </div>
        <div>
        <label for="manager">Manager:</label>
        <input type="text" name="manager" id="manager" <?php echo $managerErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?= $managerErr ?></div>
        <label for="instructions">Instructions:</label>
        <input type="text" name="instructions" id="instructions" <?php echo $instructionsErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?= $instructionsErr ?></div>
        </div>
        <div>
        <label for="deadline">Deadline:</label>
        <input type="date" name="deadline" id="deadline" <?php echo $deadlineErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?= $deadlineErr ?></div>
        <input type="submit" value="set deadline" class="vehiclesubmitbtn  btn7" name="submit">
        </div>
    </form>
</div>


<div class="sqltable" id="sqltable">

    <h1 class="priority_header">pending or overdue tasks</h1>

    <?php if (empty($overdue_data)) : ?>
        <p>No Pending or Overdue Tasks</p>
    <?php endif; ?>

    <?php foreach ($overdue_data as $item) : ?>

        <table>
            <thead>
                <th>department</th>
                <th>section</th>
                <th>manager</th>
                <th>instructions</th>
                <th>deadline</th>
                <th>action</th>
            </thead>
            <tbody>
                <td><?php echo $item['department']; ?></td>
                <td><?php echo $item['section']; ?></td>
                <td><?php echo $item['manager']; ?></td>
                <td><?php echo $item['instructions']; ?></td>
                <td><?php echo $item['deadline']; ?></td>
                <td>
                    <a href="deleteoverdue.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a>
                </td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>



<?php include 'inc/footer.php'; ?>