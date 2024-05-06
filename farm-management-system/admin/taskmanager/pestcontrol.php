<?php include 'inc/header.php'; ?>
<?php include 'inc/side-bar.php'; ?>



<?php
$crop = $section = $instructions = $manager = '';
$cropErr = $sectionErr = $instructionsErr = $managerErr = '';


//validation
if (isset($_POST['submit'])) {
    if (empty($_POST['crop'])) {
        $cropErr = 'Enter Crop Name';
    } else {
        $crop = filter_input(INPUT_POST, 'crop', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['section'])) {
        $sectionErr = 'Enter Section Name/No,';
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

    if (empty($cropErr) && empty($sectionErr) && empty($instructionsErr) && empty($managerErr)) {
        //add to mysql
        $sql = "INSERT INTO pestcontrol(crop, section, instructions, manager) VALUES('$crop', '$section', '$instructions', '$manager')";

        if (mysqli_query($conn, $sql)) {
            # code...
            header('Location: pestcontrol.php#pestcontrol12');
        } else {
            //error
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}


?>




<?php
$sql = 'SELECT * FROM pestcontrol';
$result = mysqli_query($conn, $sql);
$pest_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>



<div class="pest-control" id="pestcontrol12">
    <h1>schedule pest control task</h1>
    <form action="" class="pestcontrol" method="POST">
        <div class="grid1">

            <div>
            <label for="crop">Crop:</label>
            <input type="text" name="crop" id="crop" <?php echo $cropErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $cropErr; ?></div>
            </div>

            <div>
            <label for="section">Section:</label>
            <input type="text" name="section" id="section" <?php echo $sectionErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $sectionErr; ?></div>
            </div>

        </div> <br>
        <div class="grid1">

        <div>
            <label for="instructions">Instructions:</label>
            <input type="text" name="instructions" id="instructions" <?php echo $instructionsErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $instructionsErr; ?></div>
            </div>

            <div>
            <label for="manager">Manager:</label>
            <input type="text" name="manager" id="manager" <?php echo $managerErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $managerErr; ?></div>
        </div>

        <div>
        <input type="submit" value="Add Task" name="submit" class="btn3">
        </div>
        </div>
</div>
</form>
</div>




<div class="sqltable">

    <h1 class="priority_header">PEST control task manager</h1>

    <?php if (empty($pest_data)) : ?>
        <p>No Tasks scheduled</p>
    <?php endif; ?>

    <?php foreach ($pest_data as $item) : ?>

        <table>
            <thead>
                <th>crop</th>
                <th>section</th>
                <th>instructions</th>
                <th>manager</th>
                <th>date</th>
                <th>action</th>
            </thead>
            <tbody>
                <td><?php echo $item['crop']; ?></td>
                <td><?php echo $item['section']; ?></td>
                <td><?php echo $item['instructions']; ?></td>
                <td><?php echo $item['manager']; ?></td>
                <td><?php echo $item['date']; ?></td>
                <td>
                <a href="deletepestcontrol.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a>
            </td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>

<?php include 'inc/footer.php'; ?>