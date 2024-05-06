<?php include 'inc/header.php'; ?>
<?php include 'inc/side-bar.php'; ?>



<?php
$section = $instructions = $manager = '';
$sectionErr = $instructionsErr = $managerErr = '';


//validation
if (isset($_POST['submit'])) {
    
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
        $managerErr = 'Enter Managers name';
    } else {
        $manager = filter_input(INPUT_POST, 'manager', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($sectionErr) && empty($instructionsErr) && empty($managerErr)) {
        //add to mysql
        $sql = "INSERT INTO preparation(section, instructions, manager) VALUES('$section', '$instructions', '$manager')";

        if (mysqli_query($conn, $sql)) {
            # code...
            header('Location: planting.php#sqltable1');
        } else {
            //error
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}


?>




<?php
$sql = 'SELECT * FROM preparation';
$result = mysqli_query($conn, $sql);
$prep_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php
$sql = 'SELECT * FROM planting';
$result = mysqli_query($conn, $sql);
$planting_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>




<?php
$section2 = $crop = $date = $instructions2 = $manager2 = '';
$sectionErr_2 = $cropErr = $dateErr = $instructionsErr_2 = $managerErr_2 = '';


//validation
if (isset($_POST['submit2'])) {
    
    if (empty($_POST['section2'])) {
        $sectionErr_2 = 'Enter Section Name/No.';
    } else {
        $section2 = filter_input(INPUT_POST, 'section2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['crop'])) {
        $cropErr = 'Enter Crop Name';
    } else {
        $crop = filter_input(INPUT_POST, 'crop', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['plantingdate'])) {
        $dateErr = 'Enter Planting Date';
    } else {
        $date = filter_input(INPUT_POST, 'plantingdate', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

   

    if (empty($_POST['instructions2'])) {
        $instructionsErr_2 = 'Enter Short Instructions';
    } else {
        $instructions2 = filter_input(INPUT_POST, 'instructions2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['manager2'])) {
        $managerErr_2 = 'Enter Managers name';
    } else {
        $manager2 = filter_input(INPUT_POST, 'manager2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($sectionErr_2) && empty($cropErr) && empty($dateErr) && empty($instructionsErr_2) && empty($managerErr_2)) {
        //add to mysql
        $sql = "INSERT INTO planting(section, crop, plantingdate, instructions, manager) VALUES('$section2', '$crop', '$date', '$instructions2', '$manager2')";

        if (mysqli_query($conn, $sql)) {
            # code...
            header('Location: planting.php#sqltable2');
        } else {
            //error
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}


?>




<div class="preparationsec">
    <h1>farm preparation</h1>
    <form action="" method="post" class="prepform">
        <div>
        <label for="section">Section:</label>
        <input type="text" name="section" id="section"<?php echo $sectionErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $sectionErr; ?></div> <br>
        <label for="instructions">Instructions:</label>
        <input type="text" name="instructions" id="instructions"<?php echo $instructionsErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $instructionsErr; ?></div>
        </div>
        <div>
        <label for="manager">Manager:</label>
        <input type="text" name="manager" id="manager"<?php echo $managerErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $managerErr; ?></div>
        </div>
        <div>
        <input type="submit" value="add task" name="submit" class="btn3">
        </div>
    </form>
</div>


<div class="sqltable" id="sqltable1">

<h1 class="priority_header">Preparations task manager</h1>

<?php if (empty($prep_data)) : ?>
    <p>No Tasks scheduled</p>
<?php endif; ?>

<?php foreach ($prep_data as $item) : ?>

    <table>
        <thead>
            <th>section</th>
            <th>instructions</th>
            <th>manager</th>
            <th>date</th>
            <th>action</th>
        </thead>
        <tbody>
            <td><?php echo $item['section']; ?></td>
            <td><?php echo $item['instructions']; ?></td>
            <td><?php echo $item['manager']; ?></td>
            <td><?php echo $item['date']; ?></td>
            <td>
            <a href="deleteplanting1.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a>
            </td>
        </tbody>
    </table>

<?php endforeach; ?>

</div>


<div class="planting">
    <h1>planting tasks</h1>
    <form action="" method="post" class="plantingdetails">
    <div>
        <label for="section">Section:</label>
        <input type="text" name="section2" id="section"<?php echo $sectionErr_2 ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $sectionErr_2; ?></div> <br>
        <label for="crop">Crop:</label>
        <input type="text" name="crop" id="crop"<?php echo $cropErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $cropErr; ?></div>
        </div>
        <div>
        <label for="plantingdate">Planting Date:</label>
        <input type="date" name="plantingdate" id="plantingdate"<?php echo $dateErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $dateErr; ?></div> <br>
        <label for="instructions">Instructions:</label>
        <input type="text" name="instructions2" id="instructions"<?php echo $instructionsErr_2 ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $instructionsErr_2; ?></div>
        </div>
        <div>
        <label for="manager">Manager:</label>
        <input type="text" name="manager2" id="manager"<?php echo $managerErr_2 ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $managerErr_2; ?></div> <br>
        <input type="submit" value="add task" name="submit2" class="btn3">
        </div>
    </form>
</div>

<div class="sqltable" id="sqltable2">

<h1 class="priority_header">planting task manager</h1>

<?php if (empty($planting_data)) : ?>
    <p>No Tasks scheduled</p>
<?php endif; ?>

<?php foreach ($planting_data as $item) : ?>

    <table>
        <thead>
            <th>section</th>
            <th>crop</th>
            <th>planting date</th>
            <th>instructions</th>
            <th>manager</th>
            <th>date</th>
            <th>action</th>
        </thead>
        <tbody>
            <td><?php echo $item['section']; ?></td>
            <td><?php echo $item['crop']; ?></td>
            <td><?php echo $item['plantingdate']; ?></td>
            <td><?php echo $item['instructions']; ?></td>
            <td><?php echo $item['manager']; ?></td>
            <td><?php echo $item['date']; ?></td>
            <td><a href="deleteplanting.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a></td>
        </tbody>
    </table>

<?php endforeach; ?>

</div>


<?php include 'inc/footer.php'; ?>