<?php include 'inc/header.php'; ?>
<?php include 'inc/side-bar.php'; ?>


<?php
$sql = 'SELECT * FROM plantingdata';
$result = mysqli_query($conn, $sql);
$plant_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php
$sql1 = 'SELECT * FROM requests';
$result1 = mysqli_query($conn, $sql1);
$field_data = mysqli_fetch_all($result1, MYSQLI_ASSOC);
?>

<?php
$sql2 = 'SELECT * FROM yields';
$result2 = mysqli_query($conn, $sql2);
$yield_data = mysqli_fetch_all($result2, MYSQLI_ASSOC);
?>


<?php



$section = $crop  = $plantdate = $harvestdate = $yields = $comments = '';

$sectionErr = $cropErr  = $plantdateErr = $harvestdateErr = $yieldsErr = $commentsErr = '';

//form stuff 

if (isset($_POST['submit'])) {
    if (empty($_POST['section'])) {
        $sectionErr = 'Enter Section Name/No.;';
    } else {
        $section = filter_input(INPUT_POST,  'section', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['crop'])) {
        $cropErr = 'Enter Crop Name';
    } else {
        $crop = filter_input(INPUT_POST, 'crop', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['plantdate'])) {
        $plantdateErr = 'Enter Planting Date';
    } else {
        $plantdate = filter_input(INPUT_POST, 'plantdate', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['harvestdate'])) {
        $harvestdateErr = 'Enter Expected Harvest Date';
    } else {
        $harvestdate = filter_input(INPUT_POST, 'harvestdate', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['yields'])) {
        $yieldsErr = 'Enter Expected Yields';
    } else {
        $yields = filter_input(INPUT_POST, 'yields', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['comments'])) {
        $commentsErr = 'Enter Short Comment';
    } else {
        $comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($sectionErr) && empty($cropErr) && empty($plantdateErr) && empty($harvestdateErr) && empty($yieldsErr) && empty($commentsErr)) {
        //add data to mysql database
        $sql = "INSERT INTO plantingdata (section, crop, plantdate, harvestdate, yields, comments) VALUES ('$section', '$crop', '$plantdate', '$harvestdate', '$yields', '$comments')";

        if (mysqli_query($conn, $sql)) {
            //success
            header('Location: cropmanager.php#sqltable');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}

?>


<?php



$section_2 = $crop_2  = $instructions_2 = $manager_2 = '';

$sectionErr_2 = $cropErr_2  = $instructionsErr_2 = $managerErr_2 = '';

//form stuff 

if (isset($_POST['submit2'])) {
    if (empty($_POST['section2'])) {
        $sectionErr_2 = 'Enter Section Name/No.';
    } else {
        $section_2 = filter_input(INPUT_POST,  'section2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['crop2'])) {
        $cropErr_2 = 'Enter Crop Name';
    } else {
        $crop_2 = filter_input(INPUT_POST, 'crop2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['instructions2'])) {
        $instructionsErr_2 = 'Enter Short Instructions';
    } else {
        $instructions_2 = filter_input(INPUT_POST, 'instructions2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['manager2'])) {
        $managerErr_2 = 'Enter Managers Name';
    } else {
        $manager_2 = filter_input(INPUT_POST, 'manager2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }



    if (empty($sectionErr_2) && empty($cropErr_2) && empty($instructionsErr_2) && empty($managerErr_2)) {
        //add data to mysql database
        $sql = "INSERT INTO requests (section2, crop2, instructions2, manager2) VALUES ('$section_2', '$crop_2', '$instructions_2', '$manager_2')";

        if (mysqli_query($conn, $sql)) {
            //success
            header('Location: cropmanager.php#sqltable2');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}

?>



<?php



$section_3 = $crop_3  = $harvestdate_3 = $yield_3 = $comments_3 = '';

$sectionErr_3 = $cropErr_3 = $harvestdateErr_3 = $yieldErr_3 = $commentsErr_3 = '';

//form stuff 

if (isset($_POST['submit3'])) {
    if (empty($_POST['section3'])) {
        $sectionErr_3 = 'Enter Section Name/No.';
    } else {
        $section_3 = filter_input(INPUT_POST,  'section3', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['crop3'])) {
        $cropErr_3 = 'Enter Crop Name';
    } else {
        $crop_3 = filter_input(INPUT_POST, 'crop3', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['harvestdate3'])) {
        $harvestdateErr_3 = 'Enter Expected Harvest Date';
    } else {
        $harvestdate_3 = filter_input(INPUT_POST, 'harvestdate3', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['yield3'])) {
        $yieldErr_3 = 'Enter Expected Yields';
    } else {
        $yield_3 = filter_input(INPUT_POST, 'yield3', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['comments3'])) {
        $commentsErr_3 = 'Enter Short Comment';
    } else {
        $comments_3 = filter_input(INPUT_POST, 'comments3', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($sectionErr_3) && empty($cropErr_3) && empty($harvestdateErr_3) && empty($yieldErr_3) && empty($commentsErr_3)) {
        //add data to mysql database
        $sql = "INSERT INTO yields (section3, crop3, harvestdate3, yield3, comments3) VALUES ('$section_3', '$crop_3', '$harvestdate_3', '$yield_3', '$comments_3')";

        if (mysqli_query($conn, $sql)) {
            //success
            header('Location: cropmanager.php#sqltable3');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}

?>


<div class="cropdata1" id="cropdata1">
    <h1>planting details</h1>
    <form action="" method="post" class="cropform1">
        <div>
        <label for="section">Section:</label>
        <input type="text" name="section" id="section" <?php echo $sectionErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $sectionErr; ?></div>
        <label for="crop">Crop:</label>
        <input type="text" name="crop" id="crop" <?php echo $cropErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $cropErr; ?></div>
        </div>
        <div>
        <label for="plantdate">Date Planted:</label>
        <input type="date" name="plantdate" id="plantdate" <?php echo $plantdateErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $plantdateErr; ?></div>
        <label for="harvestdate">Harvest Date:</label>
        <input type="date" name="harvestdate" id="harvestdate" <?php echo $harvestdateErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $harvestdateErr; ?></div>
        </div>
        <div>
        <label for="yields">Expected Yields:</label>
        <input type="text" name="yields" id="yields" <?php echo $yieldsErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $yieldsErr; ?></div>
        <label for="comments">Comments:</label>
        <input type="text" name="comments" id="comments" <?php echo $commentsErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $commentsErr; ?></div>
        </div>
        <input type="submit" value="add crop" name="submit" class="btn3">
        
    </form>

</div>


<div class="sqltable" id="sqltable">

    <h1 class="priority_header">recent planting activities</h1>

    <?php if (empty($plant_data)) : ?>
        <p>No Recent Activities</p>
    <?php endif; ?>

    <?php foreach ($plant_data as $item) : ?>

        <table>
            <thead>
                <th>section</th>
                <th>crop</th>
                <th>date planted</th>
                <th>harvest date</th>
                <th>expected yields</th>
                <th>comments</th>
                <th>action</th>
            </thead>
            <tbody>
                <td><?php echo $item['section']; ?></td>
                <td><?php echo $item['crop']; ?></td>
                <td><?php echo $item['plantdate']; ?></td>
                <td><?php echo $item['harvestdate']; ?></td>
                <td><?php echo $item['yields']; ?></td>
                <td><?php echo $item['comments']; ?></td>
                <td>
                <a href="deletecropmanager.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a>
                </td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>

<div class="cropdata2" id="cropdata2">
    <h1>request field report</h1>
    <form action="" method="post" class="cropform2">
    <div>
        <label for="section">Section:</label>
        <input type="text" name="section2" id="section" <?php echo $sectionErr_2 ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $sectionErr_2; ?></div>
        <label for="crop">Crop:</label>
        <input type="text" name="crop2" id="crop" <?php echo $cropErr_2 ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $cropErr_2; ?></div>
        </div>
        <div>
        <label for="instructions">Instructions:</label>
        <input type="text" name="instructions2" id="instructions" <?php echo $instructionsErr_2 ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $instructionsErr_2; ?></div>
        <label for="manager">Manager:</label>
        <input type="text" name="manager2" id="manager" <?php echo $managerErr_2 ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $managerErr_2; ?></div>
        </div>
        <input type="submit" value="request report" name="submit2" class="btn3">
    </form>
</div>


<div class="sqltable" id="sqltable2">

    <h1 class="priority_header">request field updates</h1>

    <?php if (empty($field_data)) : ?>
        <p>No Updates Requested</p>
    <?php endif; ?>

    <?php foreach ($field_data as $item) : ?>

        <table>
            <thead>
                <th>section</th>
                <th>crop</th>
                <th>instructions</th>
                <th>manager</th>
                <th>date</th>
                <th>action</th>
            </thead>
            <tbody>
                <td><?php echo $item['section2']; ?></td>
                <td><?php echo $item['crop2']; ?></td>
                <td><?php echo $item['instructions2']; ?></td>
                <td><?php echo $item['manager2']; ?></td>
                <td><?php echo $item['date']; ?></td>
                <td>
                <a href="deletecropmanager1.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a>
                </td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>


<div class="cropdata3" id="cropdata3">
    <h1>crop yield data</h1>
    <form action="" method="post" class="cropform3">
    <div>
        <label for="section">Section:</label>
        <input type="text" name="section3" id="section" <?php echo $sectionErr_3 ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $sectionErr_3; ?></div>
        <label for="crop">Crop:</label>
        <input type="text" name="crop3" id="crop" <?php echo $cropErr_3 ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $cropErr_3; ?></div>
        </div>
        <div>
        <label for="harvestdate">Harvest Date:</label>
        <input type="date" name="harvestdate3" id="harvestdate" <?php echo $harvestdateErr_3 ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $harvestdateErr_3; ?></div>
        <label for="yield">Yield:</label>
        <input type="text" name="yield3" id="yield" <?php echo $yieldErr_3 ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $yieldErr_3; ?></div>
        </div>
        <div>
        <label for="comments">Comments:</label>
        <input type="text" name="comments3" id="comments" <?php echo $commentsErr_3 ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $commentsErr_3; ?></div>
        <input type="submit" value="add data" name="submit3" class="btn3">
        </div>
    </form>
</div>


<div class="sqltable" id="sqltable3">

    <h1 class="priority_header">recent harvests</h1>

    <?php if (empty($yield_data)) : ?>
        <p>No Recent Harvests</p>
    <?php endif; ?>

    <?php foreach ($yield_data as $item) : ?>

        <table>
            <thead>
                <th>section</th>
                <th>crop</th>
                <th>harvest date</th>
                <th>yield</th>
                <th>comments</th>
                <th>action</th>
            </thead>
            <tbody>
                <td><?php echo $item['section3']; ?></td>
                <td><?php echo $item['crop3']; ?></td>
                <td><?php echo $item['harvestdate3']; ?></td>
                <td><?php echo $item['yield3']; ?></td>
                <td><?php echo $item['comments3']; ?></td>
                <td>
                <a href="deletecropmanager2.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a>
                </td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>
<?php include 'inc/footer.php'; ?>