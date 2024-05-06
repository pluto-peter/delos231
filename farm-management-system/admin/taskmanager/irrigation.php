<?php include 'inc/header.php'; ?>
<?php include 'inc/side-bar.php'; ?>


<?php
$crop = $section = $wateringtime = $duration = $frequency = $manager = '';
$cropErr = $sectionErr = $wateringtimeErr = $durationErr = $frequencyErr = $managerErr = '';


//validation
if (isset($_POST['submitbtn'])) {
    if (empty($_POST['crop'])) {
        $cropErr = 'Enter Crop Name';
    } else {
        $crop = filter_input(INPUT_POST, 'crop', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['section'])) {
        $sectionErr = 'Enter Section Name/No.';
    } else {
        $section = filter_input(INPUT_POST, 'section', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['wateringtime'])) {
        $wateringtimeErr = 'Enter Time';
    } else {
        $wateringtime = filter_input(INPUT_POST, 'wateringtime', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['duration'])) {
        $durationErr = 'Enter Duration';
    } else {
        $duration = filter_input(INPUT_POST, 'duration', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['frequency'])) {
        $frequencyErr = 'Enter Frequency';
    } else {
        $frequency = filter_input(INPUT_POST, 'frequency', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['manager'])) {
        $managerErr = 'Enter Managers Name';
    } else {
        $manager = filter_input(INPUT_POST, 'manager', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($cropErr) && empty($sectionErr) && empty($wateringtimeErr) && empty($durationErr) && empty($frequencyErr) && empty($managerErr)) {
        //add to mysql
        $sql = "INSERT INTO irrigation(crop, section, wateringtime, duration, frequency, manager) VALUES('$crop', '$section', '$wateringtime', '$duration', '$frequency', '$manager')";

        if (mysqli_query($conn, $sql)) {
            # code...
            header('Location: irrigation.php#sqltable');
        } else {
            //error
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}


?>




<?php
$sql = 'SELECT * FROM irrigation';
$result = mysqli_query($conn, $sql);
$irrigation_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>



<div class="irrigation-tasks">
    <h1 class="irrigation-header">irrigation task manager</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="irrigation-details">
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

        <div>
            <label for="plannedwateringtimes">Watering Time:</label>
            <input type="time" name="wateringtime" id="plannedwateringtimes" <?php echo $wateringtimeErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $wateringtimeErr; ?></div>
        </div>
        </div> <br>

        <div class="grid1">
        <div>
            <label for="duration">Duration:</label>
            <input type="text" name="duration" id="duration" <?php echo $durationErr ? 'errormsg' : null; ?>><br>
            <div class="errormsg"><?php echo $durationErr; ?></div>
        </div>

        <div>
            <label for="frequency">Frequency:</label>
            <input type="text" name="frequency" id="frequency" <?php echo $frequencyErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $frequencyErr; ?></div>
        </div>

        <div>
            <label for="manager">Manager:</label>
            <input type="text" name="manager" id="manager" <?php echo $managerErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $managerErr; ?></div>
        </div>

        <div>
            <input type="submit" value="Assign task" class="submitbtn btn2" name="submitbtn">
        </div>
        </div>
    </form>
</div>



<div class="sqltable" id="sqltable">

    <h1 class="priority_header">scheduled IRRIGATION tasks</h1>

    <?php if (empty($irrigation_data)) : ?>
        <p>No Tasks scheduled</p>
    <?php endif; ?>

    <?php foreach ($irrigation_data as $item) : ?>

        <table>
            <thead>
                <th>crop</th>
                <th>section</th>
                <th>watering time</th>
                <th>duration</th>
                <th>frequency</th>
                <th>manager</th>
                <th>date</th>
                <th>action</th>
            </thead>
            <tbody>
                <td><?php echo $item['crop']; ?></td>
                <td><?php echo $item['section']; ?></td>
                <td><?php echo $item['wateringtime']; ?></td>
                <td><?php echo $item['duration']; ?></td>
                <td><?php echo $item['frequency']; ?></td>
                <td><?php echo $item['manager']; ?></td>
                <td><?php echo $item['date']; ?></td>
                <td>
                    <a href="deleteirrigation.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a>
                </td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>
<!-- 
Display the current irrigation schedule, including planned watering times, duration, and frequency for different fields or crop areas. Users can view and adjust schedules as needed -->

<?php include 'inc/footer.php'; ?>