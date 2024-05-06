<?php include 'inc/header.php'; ?>
<?php include 'inc/side-bar.php'; ?>



<?php
$crop = $section = $date = $fmanager = $tmanager = $smanager = $store = '';
$cropErr = $sectionErr = $dateErr = $fmanagerErr = $tmanagerErr = $smanagerErr = $storeErr = '';


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

    if (empty($_POST['harvestdate'])) {
        $dateErr = 'Enter Date and Time';
    } else {
        $date = filter_input(INPUT_POST, 'harvestdate', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['fmanager'])) {
        $fmanagerErr = 'Enter Farm Managers Name';
    } else {
        $fmanager = filter_input(INPUT_POST, 'fmanager', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['tmanager'])) {
        $tmanagerErr = 'Enter Transport Managers Name';
    } else {
        $tmanager = filter_input(INPUT_POST, 'tmanager', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['smanager'])) {
        $smanagerErr = 'Enter Storage Managers Name';
    } else {
        $smanager = filter_input(INPUT_POST, 'smanager', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['store'])) {
        $storeErr = 'Enter Store/Warehouse';
    } else {
        $store = filter_input(INPUT_POST, 'store', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($cropErr) && empty($sectionErr) && empty ($dateErr) && empty($fmanagerErr) && empty($tmanagerErr) && empty($smanagerErr) && empty($storeErr)) {
        //add to mysql
        $sql = "INSERT INTO harvesting (crop, section, harvestdate, fmanager, tmanager, smanager, store) VALUES('$crop', '$section', '$date', '$fmanager', '$tmanager', '$smanager', '$store')";

        if (mysqli_query($conn, $sql)) {
            # code...
            header('Location: harvesting.php#sqltable');
        } else {
            //error
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}


?>



<?php
$sql = 'SELECT * FROM harvesting';
$result = mysqli_query($conn, $sql);
$harvesting_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>




<div class="harvesting">
    <h1>harvest tasks manager</h1>
    <form action="" method="post" class="harvestingdetails">
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
        <label for="date">Harvest Date:</label>
        <input type="date" name="harvestdate" id="date" <?php echo $dateErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $dateErr; ?></div>
        </div>
        </div>
        <br>

        <div class="grid1">
        <div>
        <label for="fmanager">Farm Manager:</label>
        <input type="text" name="fmanager" id="fmanager" <?php echo $fmanagerErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $fmanagerErr; ?></div>
        </div>

        <div>
        <label for="tmanager">Transport Manager:</label>
        <input type="text" name="tmanager" id="tmanager" <?php echo $tmanagerErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $tmanagerErr; ?></div>
        </div>

        <div>
        <label for="smanager">Storage Manager:</label>
        <input type="text" name="smanager" id="smanager" <?php echo $smanagerErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $smanagerErr; ?></div>
        </div>
        </div>
        <br>

        <div class="grid1">


        <div>
        <label for="store">Warehouse/Store:</label>
        <input type="text" name="store" id="store" <?php echo $storeErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $storeErr; ?></div>
        </div>

        <div>
        <input type="submit" value="assign task" name="submit" class="btn3">
        </div>
        </div>
    </form>
</div>
</div>



<div class="sqltable" id="sqltable">

<h1 class="priority_header">upcoming Harvest tasks</h1>

<?php if (empty($harvesting_data)) : ?>
    <p>No Tasks scheduled</p>
<?php endif; ?>

<?php foreach ($harvesting_data as $item) : ?>

    <table>
        <thead>
            <th>crop</th>
            <th>section</th>
            <th>harvest date</th>
            <th>farm manager</th>
            <th>transport manager</th>
            <th>storage manager</th>
            <th>Store/warehouse</th>
            <th>date</th>
            <th>action</th>
        </thead>
        <tbody>
            <td><?php echo $item['crop']; ?></td>
            <td><?php echo $item['section']; ?></td>
            <td><?php echo $item['harvestdate']; ?></td>
            <td><?php echo $item['fmanager']; ?></td>
            <td><?php echo $item['tmanager']; ?></td>
            <td><?php echo $item['smanager']; ?></td>
            <td><?php echo $item['store']; ?></td>
            <td><?php echo $item['date']; ?></td>
            <td>
            <a href="deleteharvesting.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a>
            </td>
        </tbody>
    </table>

<?php endforeach; ?>

</div>

<?php include 'inc/footer.php'; ?>