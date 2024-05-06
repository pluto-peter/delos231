<?php include 'inc/header.php'; ?>
<?php include 'inc/side-bar.php'; ?>


<?php
$section = $stalls = $instructions = $manager = '';
$sectionErr = $stallsErr = $instructionsErr = $managerErr = '';


//validation
if (isset($_POST['submit'])) {

    if (empty($_POST['section'])) {
        $sectionErr = 'Enter Section Name/No.';
    } else {
        $section = filter_input(INPUT_POST, 'section', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['stalls'])) {
        $stallsErr = 'Enter Stall No.';
    } else {
        $stalls = filter_input(INPUT_POST, 'stalls', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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

    if (empty($sectionErr) && empty ($stallsErr) && empty($instructionsErr) && empty($managerErr)) {
        //add to mysql
        $sql = "INSERT INTO stallcleaning (section, stalls, instructions, manager) VALUES ('$section', '$stalls', '$instructions', '$manager')";

        if (mysqli_query($conn, $sql)) {
            # code...
            header('Location: stallcleaning.php#sqltable');
        } else {
            //error
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}


?>



<?php
$sql = 'SELECT * FROM stallcleaning';
$result = mysqli_query($conn, $sql);
$stalls_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<div class="stallcleaning">
    <h1>stall cleaning task manager</h1>
    <form action="" method="post" class="stalldetails">
        <div class="grid1">
            <div>
        <label for="section">Section:</label>
        <input type="text" name="section" id="section" <?php echo $sectionErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $sectionErr; ?></div>
        </div>
        <div>
        <label for="stalls">Stall Nos.</label>
        <input type="text" name="stalls" id="stalls" <?php echo $stallsErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $stallsErr; ?></div>
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
        <input type="submit" value="Add task" name="submit" class="btn3">
        </div>
        </div>
    </form>
</div>




<div class="sqltable" id="sqltable">

<h1 class="priority_header">upcoming stall cleaning tasks</h1>

<?php if (empty($stalls_data)) : ?>
    <p>No Tasks scheduled</p>
<?php endif; ?>

<?php foreach ($stalls_data as $item) : ?>

    <table>
        <thead>
            <th>section</th>
            <th>stalls</th>
            <th>instructions</th>
            <th>manager</th>
            <th>date</th>
            <th>action</th>
        </thead>
        <tbody>
            <td><?php echo $item['section']; ?></td>
            <td><?php echo $item['stalls']; ?></td>
            <td><?php echo $item['instructions']; ?></td>
            <td><?php echo $item['manager']; ?></td>
            <td><?php echo $item['date']; ?></td>
            <td>
            <a href="deletestallcleaning.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a>
            </td>
        </tbody>
    </table>

<?php endforeach; ?>

</div>

<?php include 'inc/footer.php'; ?>