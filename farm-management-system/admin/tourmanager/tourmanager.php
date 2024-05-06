<?php
include 'inc/header.php';
//include 'inc/side-bar.php';

?>



<?php
$sql = 'SELECT * FROM camping';
$result = mysqli_query($conn, $sql);
$camping_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>




<div class="tourinfo" id="camping">

    <h1 class="priority_header">personal bookings</h1>
    <div class="tours">
        <?php if (empty($camping_data)) : ?>
            <p>No bookings</p>
        <?php endif; ?>

        <?php foreach ($camping_data as $item) : ?>
            <div>
                <p><span>FIRST NAME:</span> <?= $item['firstname'] ?></p>
                <p><span>LAST NAME:</span> <?= $item['lastname'] ?></p>
                <p><span>PHONE NUMBER:</span> <?= $item['phone'] ?></p>
                <p><span>EMAIL ADDRESS:</span> <?= $item['email'] ?></p>
                <p><span>ACTIVITIES:</span> <?= $item['activities'] ?></p>
                <p><span>ARRIVAL:</span> <?= $item['arrival'] ?></p>
                <p><span>DEPARTURE:</span> <?= $item['departure'] ?></p>
                <p><span>PREFFERED CAMPING LOCATION:</span> <?= $item['campinglocation'] ?></p>
                <p><span>PREFFERED ACCOMODATION:</span> <?= $item['accomodation'] ?></p>
                <p><span>RENTALS NEEDED:</span> <?= $item['rentals'] ?></p>
                <p><span>MEDICAL ISSUES:</span> <?= $item['medicalissues'] ?></p>
                <p><span>CREATED ON:</span> <?= $item['date'] ?></p>
                <br>
                <a href="deletetours.php?id=<?php echo $item['id']; ?>" class="delete">DELETE</a>
            </div>
            <?php endforeach; ?>
    </div>
</div>





<?php
$sql = 'SELECT * FROM familyvacations';
$result = mysqli_query($conn, $sql);
$family_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<div class="tourinfo" id="family">

    <h1 class="priority_header">family bookings</h1>
    <div class="tours">
        <?php if (empty($family_data)) : ?>
            <p>No bookings</p>
        <?php endif; ?>

        <?php foreach ($family_data as $item) : ?>
            <div>
                <p><span>FIRST NAME:</span> <?= $item['firstname'] ?></p>
                <p><span>LAST NAME:</span> <?= $item['lastname'] ?></p>
                <p><span>PHONE NUMBER:</span> <?= $item['phone'] ?></p>
                <p><span>EMAIL ADDRESS:</span> <?= $item['email'] ?></p>
                <p><span>FAMILY INFO:</span> <?= $item['familyinfo'] ?></p>
                <p><span>ACTIVITIES:</span> <?= $item['activities'] ?></p>
                <p><span>ARRIVAL:</span> <?= $item['arrival'] ?></p>
                <p><span>DEPARTURE:</span> <?= $item['departure'] ?></p>
                <p><span>CREATED ON:</span> <?= $item['date'] ?></p>
                <br>
                <a href="deletetours1.php?id=<?php echo $item['id']; ?>" class="delete">DELETE</a>
            </div>
            <?php endforeach; ?>
    </div>
</div>




<?php
$sql = 'SELECT * FROM groups';
$result = mysqli_query($conn, $sql);
$group_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="tourinfo" id="groups">

    <h1 class="priority_header">group tours</h1>
    <div class="tours">
        <?php if (empty($group_data)) : ?>
            <p>No bookings</p>
        <?php endif; ?>

        <?php foreach ($group_data as $item) : ?>
            <div>
                <p><span>COMPANY/GROUP NAME:</span> <?= $item['groupname'] ?></p>
                <p><span>MANAGERs NAME:</span> <?= $item['teammanager'] ?></p>
                <p><span>PHONE NUMBER:</span> <?= $item['phone'] ?></p>
                <p><span>EMAIL ADDRESS:</span> <?= $item['email'] ?></p>
                <p><span>ITINERARY:</span> <?= $item['activities'] ?></p>
                <p><span>ARRIVAL:</span> <?= $item['arrival'] ?></p>
                <p><span>DEPARTURE:</span> <?= $item['departure'] ?></p>
                <p><span>ADDITIONAL INFO:</span> <?= $item['grpinfo'] ?></p>
                <p><span>CREATED ON:</span> <?= $item['date'] ?></p>
                <br>
                <a href="deletetours2.php?id=<?php echo $item['id']; ?>" class="delete">DELETE</a>
            </div>
            <?php endforeach; ?>
    </div>
</div>



<?php include 'inc/footer.php'; ?>