<?php
include 'inc/header.php';
//include 'inc/side-bar.php';
?>


<?php
$sql = 'SELECT * FROM overduetasks';
$result = mysqli_query($conn, $sql);
$overdue_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>



<div class="sqltable" id="sqltable">

    <h1 class="priority_header">overdue tasks</h1>

    <?php if (empty($overdue_data)) : ?>
        <p>No Overdue Tasks</p>
    <?php endif; ?>

    <?php foreach ($overdue_data as $item) : ?>

        <table>
            <thead>
                <th>department</th>
                <th>section</th>
                <th>manager</th>
                <th>instructions</th>
                <th style="color: red;">deadline</th>
            </thead>
            <tbody>
                <td><?php echo $item['department']; ?></td>
                <td><?php echo $item['section']; ?></td>
                <td><?php echo $item['manager']; ?></td>
                <td><?php echo $item['instructions']; ?></td>
                <td><?php echo $item['deadline']; ?></td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>



<?php

$sql = 'SELECT * FROM generaltasks';
$result = mysqli_query($conn, $sql);
$general_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<div class="sqltable" id="sqltable">

<h1 class="priority_header">general tasks</h1>

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
        </thead>
        <tbody>
            <td><?php echo $item['department']; ?></td>
            <td><?php echo $item['section']; ?></td>
            <td><?php echo $item['instructions']; ?></td>
            <td><?php echo $item['manager']; ?></td>
            <td><?php echo $item['date']; ?></td>
        </tbody>
    </table>

<?php endforeach; ?>

</div>



<?php
$sql = 'SELECT * FROM milking';
$result = mysqli_query($conn, $sql);
$milking_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>



<div class="sqltable" id="sqltable">

    <h1 class="priority_header">milking</h1>

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
            </thead>
            <tbody>
                <td><?php echo $item['date']; ?></td>
                <td><?php echo $item['time']; ?></td>
                <td><?php echo $item['section']; ?></td>
                <td><?php echo $item['instructions']; ?></td>
                <td><?php echo $item['manager']; ?></td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>




<?php
$sql1 = 'SELECT * FROM pasture';
$result1 = mysqli_query($conn, $sql1);
$pasture_data = mysqli_fetch_all($result1, MYSQLI_ASSOC);
?>




<div class="sqltable" id="sqltable2">

    <h1 class="priority_header">pasture assignments</h1>

    <?php if (empty($pasture_data)) : ?>
        <p>No Recent Activities</p>
    <?php endif; ?>

    <?php foreach ($pasture_data as $item) : ?>

        <table>
            <thead>
                <th>date</th>
                <th>herd</th>
                <th>pasture</th>
                <th>section</th>
                <th>instructions</th>
                <th>manager</th>
            </thead>
            <tbody>
                <td><?php echo $item['date']; ?></td>
                <td><?php echo $item['herd']; ?></td>
                <td><?php echo $item['pasture']; ?></td>
                <td><?php echo $item['section']; ?></td>
                <td><?php echo $item['instructions']; ?></td>
                <td><?php echo $item['manager']; ?></td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>




<?php
$sql = 'SELECT * FROM stallcleaning';
$result = mysqli_query($conn, $sql);
$stalls_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>



<div class="sqltable" id="sqltable">

<h1 class="priority_header">stall cleaning</h1>

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
        </thead>
        <tbody>
            <td><?php echo $item['section']; ?></td>
            <td><?php echo $item['stalls']; ?></td>
            <td><?php echo $item['instructions']; ?></td>
            <td><?php echo $item['manager']; ?></td>
            <td><?php echo $item['date']; ?></td>
        </tbody>
    </table>

<?php endforeach; ?>

</div>




<?php
$sql = 'SELECT * FROM vehiclemaintenance';
$result = mysqli_query($conn, $sql);
$vehicle_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>



<div class="sqltable" id="sqltable">

    <h1 class="priority_header">vehicle maintenance</h1>

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
            </thead>
            <tbody>
                <td><?php echo $item['vehicleregistration']; ?></td>
                <td><?php echo $item['lotnumber']; ?></td>
                <td><?php echo $item['taskdescription']; ?></td>
                <td><?php echo $item['prioritylevel']; ?></td>
                <td><?php echo $item['date']; ?></td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>


<?php
$sql = 'SELECT * FROM infrastracturemaintenance';
$ans = mysqli_query($conn, $sql);
$infra_data = mysqli_fetch_all($ans, MYSQLI_ASSOC);
?>



<div class="sqltable" id="sqltable1">

    <h1 class="priority_header">equipment/machinery maintenance</h1>

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
            </thead>
            <tbody>
                <td><?php echo $item['machinename']; ?></td>
                <td><?php echo $item['equipmenttype']; ?></td>
                <td><?php echo $item['taskdescription']; ?></td>
                <td><?php echo $item['prioritylevel']; ?></td>
                <td><?php echo $item['date']; ?></td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>




<?php
$sql3 = 'SELECT * FROM cropprotection';
$result = mysqli_query($conn, $sql3);
$protection_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<div class="sqltable" id="sqltable2">

<h1 class="priority_header">crop protection</h1>

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
        </thead>
        <tbody>
            <td><?php echo $item['weathercondition']; ?></td>
            <td><?php echo $item['crop']; ?></td>
            <td><?php echo $item['protectioninstructions']; ?></td>
            <td><?php echo $item['startdate']; ?></td>
            <td><?php echo $item['enddate']; ?></td>
            <td><?php echo $item['date']; ?></td>
        </tbody>
    </table>

<?php endforeach; ?>

</div>






<?php
$sql = 'SELECT * FROM preparation';
$result = mysqli_query($conn, $sql);
$prep_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>



<div class="sqltable" id="sqltable1">

<h1 class="priority_header">farm Preparations</h1>

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
        </thead>
        <tbody>
            <td><?php echo $item['section']; ?></td>
            <td><?php echo $item['instructions']; ?></td>
            <td><?php echo $item['manager']; ?></td>
            <td><?php echo $item['date']; ?></td>
        </tbody>
    </table>

<?php endforeach; ?>

</div>

<?php
$sql = 'SELECT * FROM planting';
$result = mysqli_query($conn, $sql);
$planting_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<div class="sqltable" id="sqltable2">

<h1 class="priority_header">planting</h1>

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
        </thead>
        <tbody>
            <td><?php echo $item['section']; ?></td>
            <td><?php echo $item['crop']; ?></td>
            <td><?php echo $item['plantingdate']; ?></td>
            <td><?php echo $item['instructions']; ?></td>
            <td><?php echo $item['manager']; ?></td>
            <td><?php echo $item['date']; ?></td>
        </tbody>
    </table>

<?php endforeach; ?>

</div>




<?php
$sql = 'SELECT * FROM harvesting';
$result = mysqli_query($conn, $sql);
$harvesting_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<div class="sqltable" id="sqltable">

<h1 class="priority_header">Harvesting</h1>

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
        </tbody>
    </table>

<?php endforeach; ?>

</div>




<?php
$sql = 'SELECT * FROM irrigation';
$result = mysqli_query($conn, $sql);
$irrigation_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>




<div class="sqltable" id="sqltable">

<h1 class="priority_header">irrigation</h1>

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
        </thead>
        <tbody>
            <td><?php echo $item['crop']; ?></td>
            <td><?php echo $item['section']; ?></td>
            <td><?php echo $item['wateringtime']; ?></td>
            <td><?php echo $item['duration']; ?></td>
            <td><?php echo $item['frequency']; ?></td>
            <td><?php echo $item['manager']; ?></td>
            <td><?php echo $item['date']; ?></td>
        </tbody>
    </table>

<?php endforeach; ?>

</div>



<?php
$sql = 'SELECT * FROM pestcontrol';
$result = mysqli_query($conn, $sql);
$pest_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>




<div class="sqltable">

    <h1 class="priority_header">PEST control</h1>

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
            </thead>
            <tbody>
                <td><?php echo $item['crop']; ?></td>
                <td><?php echo $item['section']; ?></td>
                <td><?php echo $item['instructions']; ?></td>
                <td><?php echo $item['manager']; ?></td>
                <td><?php echo $item['date']; ?></td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>


<?php
$sql = 'SELECT * FROM treeplanting';
$result = mysqli_query($conn, $sql);
$tree_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<div class="sqltable" id="sqltable">

<h1 class="priority_header">tree planting</h1>

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
        </thead>
        <tbody>
            <td><?php echo $item['section']; ?></td>
            <td><?php echo $item['type']; ?></td>
            <td><?php echo $item['date']; ?></td>
            <td><?php echo $item['instructions']; ?></td>
            <td><?php echo $item['manager']; ?></td>
        </tbody>
    </table>

<?php endforeach; ?>

</div>

<?php
$sql1 = 'SELECT * FROM requests';
$result1 = mysqli_query($conn, $sql1);
$field_data = mysqli_fetch_all($result1, MYSQLI_ASSOC);
?>

<div class="sqltable" id="sqltable2">

    <h1 class="priority_header">requested field updates</h1>

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
            </thead>
            <tbody>
                <td><?php echo $item['section2']; ?></td>
                <td><?php echo $item['crop2']; ?></td>
                <td><?php echo $item['instructions2']; ?></td>
                <td><?php echo $item['manager2']; ?></td>
                <td><?php echo $item['date']; ?></td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>

<?php include 'inc/footer.php'; ?>