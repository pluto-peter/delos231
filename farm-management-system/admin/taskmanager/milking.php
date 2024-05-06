<?php include 'inc/header.php'; ?>
<?php include 'inc/side-bar.php'; ?>



<?php
$date = $time = $section = $instructions = $manager = '';
$dateErr = $timeErr = $sectionErr = $instructionsErr = $managerErr = '';


//validation
if (isset($_POST['submit'])) {
    if (empty($_POST['date'])) {
        $dateErr = 'Enter Date';
    } else {
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['time'])) {
        $timeErr = 'Enter Time';
    } else {
        $section = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['section'])) {
        $sectionErr = 'Enter Assigned Stalls';
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

    if (empty($dateErr) && empty($timeErr) && empty($sectionErr) && empty($instructionsErr) && empty($managerErr)) {
        //add to mysql
        $sql = "INSERT INTO milking (date, time, section, instructions, manager) VALUES ('$date', '$time', '$section', '$instructions', '$manager')";

        if (mysqli_query($conn, $sql)) {
            # code...
            header('Location: milking.php#sqltable');
        } else {
            //error
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}


?>

<?php
$sql = 'SELECT * FROM milking';
$result = mysqli_query($conn, $sql);
$milking_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<div class="milking">
    <h1>milking task manager</h1>
    <form action="" method="post" class="milkingform">
        <div>
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" <?php echo $dateErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $dateErr; ?></div> <br>
            <label for="time">Time:</label>
            <input type="time" name="time" id="time" <?php echo $timeErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $timeErr; ?></div>
        </div>
        <div>
            <label for="section">Assigned Stalls:</label>
            <input type="text" name="section" id="section" <?php echo $sectionErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $sectionErr; ?></div> <br>
            <label for="instructions">Instructions:</label>
            <input type="text" name="instructions" id="instructions" <?php echo $instructionsErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $instructionsErr; ?></div>
        </div>
        <div>
            <label for="manager">Manager:</label>
            <input type="text" name="manager" id="manager" <?php echo $managerErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $managerErr; ?></div> <br>
            <input type="submit" value="add task" name="submit" class="btn3">
        </div>
    </form>
</div>




<div class="sqltable" id="sqltable">

    <h1 class="priority_header">scheduled milking tasks</h1>

    <?php if (empty($milking_data)) : ?>
        <p>No Tasks scheduled</p>
    <?php endif; ?>

    <?php foreach ($milking_data as $item) : ?>

        <table>
            <thead>
                <th>date</th>
                <th>time</th>
                <th>stalls</th>
                <th>instructions</th>
                <th>manager</th>
                <th>action</th>
            </thead>
            <tbody>
                <td><?php echo $item['date']; ?></td>
                <td><?php echo $item['time']; ?></td>
                <td><?php echo $item['section']; ?></td>
                <td><?php echo $item['instructions']; ?></td>
                <td><?php echo $item['manager']; ?></td>
                <td>
                <a href="deletemilking.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a>
            </td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>

<?php include 'inc/footer.php'; ?>