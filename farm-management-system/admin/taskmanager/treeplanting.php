<?php include 'inc/header.php'; ?>
<?php include 'inc/side-bar.php'; ?>



<?php
$section = $type = $date = $instructions = $manager = '';
$sectionErr = $typeErr = $dateErr = $instructionsErr = $managerErr = '';


//validation
if (isset($_POST['submit'])) {

    if (empty($_POST['section'])) {
        $sectionErr = 'Enter Section Name/No,';
    } else {
        $section = filter_input(INPUT_POST, 'section', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['type'])) {
        $typeErr = 'Enter Tree Name';
    } else {
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['date'])) {
        $dateErr = 'Enter Planting Date';
    } else {
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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

    if (empty($sectionErr) && empty ($typeErr) && empty($dateErr) && empty($instructionsErr) && empty($managerErr)) {
        //add to mysql
        $sql = "INSERT INTO treeplanting (section, type, date, instructions, manager) VALUES ('$section', '$type', '$date', '$instructions', '$manager')";

        if (mysqli_query($conn, $sql)) {
            # code...
            header('Location: treeplanting.php#sqltable');
        } else {
            //error
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}


?>


<?php
$sql = 'SELECT * FROM treeplanting';
$result = mysqli_query($conn, $sql);
$tree_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<div class="treeplanting">
    <form action="" method="post" class="treedetails">
        <div>
        <label for="section">Section:</label>
        <input type="text" name="section" id="section" <?php echo $sectionErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $sectionErr; ?></div> <br>

        <label for="date">Planting Date:</label>
        <input type="date" name="date" id="date" <?php echo $dateErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $dateErr; ?></div>
        
        </div>
        <div>
        <label for="type">Tree Name:</label>
        <input type="text" name="type" id="type" <?php echo $typeErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $typeErr; ?></div> <br>
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

<h1 class="priority_header">scheduled tree planting tasks</h1>

<?php if (empty($tree_data)) : ?>
    <p>No Tasks scheduled</p>
<?php endif; ?>

<?php foreach ($tree_data as $item) : ?>

    <table>
        <thead>
            <th>section</th>
            <th>tree name</th>
            <th>date</th>
            <th>instructions</th>
            <th>manager</th>
            <th>action</th>
        </thead>
        <tbody>
            <td><?php echo $item['section']; ?></td>
            <td><?php echo $item['type']; ?></td>
            <td><?php echo $item['date']; ?></td>
            <td><?php echo $item['instructions']; ?></td>
            <td><?php echo $item['manager']; ?></td>
            <td><a href="deletetreeplanting.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a>
            </td>
        </tbody>
    </table>

<?php endforeach; ?>

</div>

<?php include 'inc/footer.php'; ?>