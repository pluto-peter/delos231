<?php include 'inc/header.php'; ?>
<?php include 'inc/side-bar.php'; ?>



<?php
$sql = 'SELECT * FROM vehiclemaintenance';
$result = mysqli_query($conn, $sql);
$vehicle_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>



<?php



$vehicle_registration = $lot_number  = $task_description = $priority_level = '';

$vehicle_registrationErr = $lot_numberErr  = $task_descriptionErr = $priority_levelErr = '';

//form stuff 

if (isset($_POST['submit'])) {
    if (empty($_POST['vehicleregistration'])) {
        $vehicle_registrationErr = 'Input Vehicle Registration Details';
    } else {
        $vehicle_registration = filter_input(INPUT_POST,  'vehicleregistration', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['lotnumber'])) {
        $lot_numberErr = 'Input Lot Number';
    } else {
        $lot_number = filter_input(INPUT_POST, 'lotnumber', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['taskdescription'])) {
        $task_descriptionErr = 'Input Short Task Description';
    } else {
        $task_description = filter_input(INPUT_POST, 'taskdescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['prioritylevel'])) {
        $priority_levelErr = 'Choose Priority Level';
    } else {
        $priority_level = filter_input(INPUT_POST, 'prioritylevel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($vehicle_registrationErr) && empty($lot_numberErr) && empty($task_descriptionErr) && empty($priority_levelErr)) {
        //add data to mysql database
        $sql = "INSERT INTO vehiclemaintenance (vehicleregistration, lotnumber, taskdescription, prioritylevel) VALUES ('$vehicle_registration', '$lot_number', '$task_description', '$priority_level')";

        if (mysqli_query($conn, $sql)) {
            //success
            header('Location: priority_tasks.php');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}

?>

<!-- //starts infrastructure section -->

<?php
$sql = 'SELECT * FROM infrastracturemaintenance';
$ans = mysqli_query($conn, $sql);
$infra_data = mysqli_fetch_all($ans, MYSQLI_ASSOC);
?>

<?php

$machine_name = $equipment_type = $task_description_a = $priority_level_a = '';
$machine_nameErr = $equipment_typeErr = $task_description_a_Err = $priority_level_a_Err = '';

if (isset($_POST['submitinfra'])) {
    if (empty($_POST['machinename'])) {
        $machine_nameErr = 'Input Machine Name';
    } else {
        $machine_name = filter_input(INPUT_POST,  'machinename', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['equipmenttype'])) {
        $equipment_typeErr = 'Input Equipment Type';
    } else {
        $equipment_type = filter_input(INPUT_POST, 'equipmenttype', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['taskdescriptiona'])) {
        $task_description_a_Err = 'Input Short Task Description';
    } else {
        $task_description_a = filter_input(INPUT_POST, 'taskdescriptiona', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['prioritylevela'])) {
        $priority_level_a_Err = 'Choose Priority Level';
    } else {
        $priority_level_a = filter_input(INPUT_POST, 'prioritylevela', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($machine_nameErr) && empty($equipment_typeErr) && empty($task_description_a_Err) && empty($priority_level_a_Err)) {
        //add data to mysql database
        $sql = "INSERT INTO infrastracturemaintenance (machinename, equipmenttype, taskdescription, prioritylevel) VALUES ('$machine_name', '$equipment_type', '$task_description_a', '$priority_level_a')";

        if (mysqli_query($conn, $sql)) {
            //success
            header('Location: priority_tasks.php');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}




?>




<!-- //starts crop protection section -->

<?php
$sql3 = 'SELECT * FROM cropprotection';
$result = mysqli_query($conn, $sql3);
$protection_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<?php

$weather = $field = $protection_instructions = $start_date = $end_date = '';
$weatherErr = $fieldErr = $protection_instructionsErr = $start_dateErr = $end_dateErr = '';

if (isset($_POST['submitcrop'])) {
    if (empty($_POST['weathercondition'])) {
        $weatherErr = 'Input Weather Condition';
    } else {
        $weather = filter_input(INPUT_POST,  'weathercondition', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['crop'])) {
        $fieldErr = 'Specify Farm Location';
    } else {
        $field = filter_input(INPUT_POST, 'crop', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['protectioninstructions'])) {
        $protection_instructionsErr = 'Input Short Task Description';
    } else {
        $protection_instructions = filter_input(INPUT_POST, 'protectioninstructions', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['startdate'])) {
        $start_dateErr = 'Enter Start Date';
    } else {
        $start_date = filter_input(INPUT_POST, 'startdate', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['enddate'])) {
        $end_dateErr = 'Enter End Date';
    } else {
        $end_date = filter_input(INPUT_POST, 'enddate', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($weatherErr) && empty($fieldErr) && empty($protection_instructionsErr) && empty($start_dateErr) && empty($end_dateErr)) {
        //add data to mysql database
        $sql = "INSERT INTO cropprotection (weathercondition, crop, protectioninstructions, startdate, enddate) VALUES ('$weather', '$field', '$protection_instructions', '$start_date', '$end_date')";

        if (mysqli_query($conn, $sql)) {
            //success
            header('Location: priority_tasks.php');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}




?>








<h2 class="scheduletitle">Schedule critical maintenance and high priority tasks</h2>

<div class="critical-maintenance">

    <h1 class="formheader">vehicle maintenance</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="maintenance-details">
        <div class="inputsec1">
            <div>
                <label for="vehicle-registration">Vehicle Registration:</label>
                <input type="text" name="vehicleregistration" id="vehicle-registration" class="vehicles-input <?php echo $vehicle_registrationErr ? 'errormsg' : null; ?>">
                <div class="errormsg"><?php echo $vehicle_registrationErr; ?></div>
                <label for="lot-number">Lot Number:</label>
                <input type="text" name="lotnumber" id="lot-number" class="vehicles-input" <?php echo $lot_numberErr ? 'errormsg' : null; ?>>
                <div class="errormsg"><?php echo $lot_numberErr; ?></div>
            </div>
            <div>
                <label for="description">Short Task Description:</label>
                <input type="text" name="taskdescription" id="description" class="vehicles-input" <?php echo $task_descriptionErr ? 'errormsg' : null; ?>>
                <div class="errormsg"><?php echo $task_descriptionErr; ?></div>
                <label for="high-priority">High Priority</label>
                <input type="radio" value="high priority" name="prioritylevel" id="high-priority" <?php echo $priority_levelErr ? 'errormsg' : null; ?>><br>
                <label for="low-priority">Low Priority</label>
                <input type="radio" value="low priority" name="prioritylevel" id="low-priority" <?php echo $priority_levelErr ? 'errormsg' : null; ?>>
                <div class="errormsg"><?php echo $priority_levelErr; ?></div>
            </div>
        </div>
        <p align="center"><input type="submit" name="submit" value="Schedule maintenance" class="vehiclesubmitbtn"></p>
    </form>
</div>

<div class="sqltable" id="sqltable">

    <h1 class="priority_header">high priority tasks</h1>

    <?php if (empty($vehicle_data)) : ?>
        <p>No Tasks scheduled</p>
    <?php endif; ?>

    <?php foreach ($vehicle_data as $item) : ?>

        <table>
            <thead>
                <th>registration</th>
                <th>lot-number</th>
                <th>instructions</th>
                <th>priority-level</th>
                <th>date</th>
                <th>action</th>
            </thead>
            <tbody>
                <td><?php echo $item['vehicleregistration']; ?></td>
                <td><?php echo $item['lotnumber']; ?></td>
                <td><?php echo $item['taskdescription']; ?></td>
                <td><?php echo $item['prioritylevel']; ?></td>
                <td><?php echo $item['date']; ?></td>
                <td>
                    <a href="deleteprioritytasks.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a>
                </td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>

<div class="infrastructure-maintenance">
    <h1 class="form-header">infrastructure maintenance</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="infrastructure-form">
        <div>
            <label for="machine-name">Machine Name:</label>
            <input type="text" name="machinename" id="machine-name" class="infra-input" <?php echo $machine_nameErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $machine_nameErr; ?></div>
            <label for="equipment-type">Type of Equipment:</label>
            <input type="text" name="equipmenttype" id="equipment-type" class="infra-input" <?php echo $equipment_typeErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $equipment_typeErr; ?></div>
        </div>
        <div>
            <label for="describe-infrastructure">Short Task Description:</label>
            <input type="text" name="taskdescriptiona" id="describe-infrastructure" class="infra-input" <?php echo $task_description_a_Err ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $task_description_a_Err; ?></div>
            <label for="highpriority">High Priority</label>
            <input type="radio" value="high priority" name="prioritylevela" id="high-priority" <?php echo $priority_level_a_Err ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $priority_level_a_Err; ?></div>
            <label for="low-priority">Low Priority</label>
            <input type="radio" value="low priority" name="prioritylevela" id="low-priority" <?php echo $priority_level_a_Err ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $priority_level_a_Err; ?></div>
        </div><br>
        <input type="submit" name="submitinfra" value="Schedule maintenance" class="vehiclesubmitbtn btn2">
    </form>
</div>


<div class="sqltable" id="sqltable1">

    <h1 class="priority_header">high priority tasks</h1>

    <?php if (empty($infra_data)) : ?>
        <p>No Tasks scheduled</p>
    <?php endif; ?>

    <?php foreach ($infra_data as $item) : ?>

        <table>
            <thead>
                <th>machine-name</th>
                <th>equipment type</th>
                <th>task-description</th>
                <th>priority-level</th>
                <th>date</th>
                <th>action</th>
            </thead>
            <tbody>
                <td><?php echo $item['machinename']; ?></td>
                <td><?php echo $item['equipmenttype']; ?></td>
                <td><?php echo $item['taskdescription']; ?></td>
                <td><?php echo $item['prioritylevel']; ?></td>
                <td><?php echo $item['date']; ?></td>
                <td>
                    <a href="deleteprioritytasks2.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a>
                </td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>


<div class="crop-protection">
    <h1>crop protection</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="crop-protection-form">
    <div class="grid1">
        <div>
            <label for="weather-type">Weather:</label>
            <input type="text" name="weathercondition" id="Weather-type" class="select" <?php echo $weatherErr ? 'errormsg' : null; ?>>
            <div class="errormsg" style="font-size: xx-large;"><?php echo $weatherErr; ?></div>
        </div>

        <div>
            <label for="crops-requiring-protection">Crops:</label>
            <input type="text" name="crop" id="fields" class="select" <?php echo $fieldErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $fieldErr; ?></div>
        </div>

        <div>
            <label for="protection-instructions">Protection Instructions:</label>
            <input type="text" name="protectioninstructions" id="protection-instructions" <?php echo $protection_instructionsErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $protection_instructionsErr; ?></div>
        </div>
        </div> <br>
        <div class="grid1">
        <div>
            <label for="from">From:</label>
            <input type="date" name="startdate" id="from" <?php echo $start_dateErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $start_dateErr; ?></div>
        </div>

        <div>
            <label for="to">To:</label>
            <input type="date" name="enddate" id="to" <?php echo $end_dateErr ? 'errormsg' : null; ?>>
            <div class="errormsg"><?php echo $end_dateErr; ?></div>
        </div>

        <div>
            <input type="submit" name="submitcrop" value="Add crop protection" class="vehiclesubmitbtn btn2">
        </div>
        </div>
    </form>
</div>

<div class="sqltable" id="sqltable2">

    <h1 class="priority_header">high priority tasks</h1>

    <?php if (empty($protection_data)) : ?>
        <p>No Tasks scheduled</p>
    <?php endif; ?>

    <?php foreach ($protection_data as $item) : ?>

        <table>
            <thead>
                <th>weather</th>
                <th>crop</th>
                <th>instructions</th>
                <th>start date</th>
                <th>end date</th>
                <th>date</th>
                <th>action</th>
            </thead>
            <tbody>
                <td><?php echo $item['weathercondition']; ?></td>
                <td><?php echo $item['crop']; ?></td>
                <td><?php echo $item['protectioninstructions']; ?></td>
                <td><?php echo $item['startdate']; ?></td>
                <td><?php echo $item['enddate']; ?></td>
                <td><?php echo $item['date']; ?></td>
                <td>
                    <a href="deleteprioritytasks1.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a>
                </td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>

<?php include 'inc/footer.php'; ?>