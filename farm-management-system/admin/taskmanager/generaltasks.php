<?php include 'inc/header.php'; ?>
<?php include 'inc/side-bar.php'; ?>


<?php
$department = $section = $instructions = $manager = '';
$departmentErr = $sectionErr = $instructionsErr = $managerErr = '';


//validation
if (isset($_POST['submit'])) {
    if (empty($_POST['department'])) {
        $departmentErr = 'Enter Department Name';
    } else {
        $department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['section'])) {
        $sectionErr = 'Enter Section Name/No.';
    } else {
        $section = filter_input(INPUT_POST, 'section', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['instructions'])) {
        $instructionsErr = 'Enter Short Instructions';
    } else {
        $instructions = filter_input(INPUT_POST, 'instructions', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['manager'])) {
        $managerErr = 'Enter Managers Name';
    } else {
        $manager = filter_input(INPUT_POST, 'manager', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($departmentErr) && empty($sectionErr) && empty ($instructionsErr) && empty($managerErr)) {
        //add to mysql
        $sql = "INSERT INTO generaltasks (department, section, instructions, manager) VALUES ('$department', '$section', '$instructions', '$manager')";

        if (mysqli_query($conn, $sql)) {
            # code...
            header('Location: generaltasks.php#sqltable');
        } else {
            //error
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}


?>



<?php
$sql = 'SELECT * FROM generaltasks';
$result = mysqli_query($conn, $sql);
$general_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>




<div class="generaltasks">
    <h1>general task manager</h1>
    <form action="" method="post" class="generalform">
        <div>
        <label for="department">Department:</label>
        <input type="text" name="department" id="department" <?php echo $departmentErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $departmentErr; ?></div>
        <label for="section">Section:</label>
        <input type="text" name="section" id="section" <?php echo $sectionErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $sectionErr; ?></div>
        </div>
        <div>
        <label for="instructions">Instructions:</label>
        <input type="text" name="instructions" id="instructions" <?php echo $instructionsErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $instructionsErr; ?></div>
        <label for="manager">Manager:</label>
        <input type="text" name="manager" id="manager" <?php echo $managerErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $managerErr; ?></div>
        </div>
        <div>
        <input type="submit" value="add task" name="submit" class="btn3">
        </div>
        </form>
</div>



<div class="sqltable" id="sqltable">

<h1 class="priority_header">scheduled general tasks</h1>

<?php if (empty($general_data)) : ?>
    <p>No Tasks scheduled</p>
<?php endif; ?>

<?php foreach ($general_data as $item) : ?>

    <table>
        <thead>
            <th>department</th>
            <th>section</th>
            <th>instructions</th>
            <th>manager</th>
            <th>date</th>
            <th>action</th>
        </thead>
        <tbody>
            <td><?php echo $item['department']; ?></td>
            <td><?php echo $item['section']; ?></td>
            <td><?php echo $item['instructions']; ?></td>
            <td><?php echo $item['manager']; ?></td>
            <td><?php echo $item['date']; ?></td>
            <td>
                <a href="deletegeneraltasks.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a>
            </td>
        </tbody>
    </table>

<?php endforeach; ?>

</div>



<?php include 'inc/footer.php'; ?>