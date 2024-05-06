<?php
include 'inc/header.php';
include 'inc/side-bar.php';

?>



<?php
$sql = 'SELECT * FROM deliveries';
$result = mysqli_query($conn, $sql);
$deliveries_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>




<div class="tourinfo" id="camping">

    <h1 class="priority_header">pending deliveries</h1>
    <div class="tours">
        <?php if (empty($deliveries_data)) : ?>
            <p>No Orders</p>
        <?php endif; ?>

        <?php foreach ($deliveries_data as $item) : ?>
            <div>
                <p><span>FULL NAME:</span> <?= $item['name'] ?></p>
                <p><span>PHONE NUMBER:</span> <?= $item['phone'] ?></p>
                <p><span>EMAIL ADDRESS:</span> <?= $item['email'] ?></p>
                <p><span>PHYSICAL ADDRESS:</span> <?= $item['address'] ?></p>
                <p><span>PREFFERED DELIVERY TIME:</span> <?= $item['deliverytime'] ?></p>
                <p><span>COMMUICATION PREFFERENCES:</span> <?= $item['communication'] ?></p>
                <p><span>SPECIAL INSTRUCTIONS:</span> <?= $item['instructions'] ?></p>
                <p><span>ODERED ON:</span> <?= $item['date'] ?></p>
                <br>
                <a href="deleteorders.php?id=<?php echo $item['id']; ?>" class="delete">DELETE</a>
            </div>
            <?php endforeach; ?>
    </div>
</div>

<?php include 'inc/footer.php'; ?>

