<?php
include 'inc/header.php';
//include 'inc/side-bar.php';
?>


<?php
$sql = 'SELECT * FROM updates';
$result = mysqli_query($conn, $sql);
$update_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="updatepanel" id="updatepanel">

    <h1 class="priority_header">recent updates</h1>
<div class="updt1">
    <?php if (empty($update_data)) : ?>
        <p>No Updates</p>
    <?php endif; ?>

    <?php foreach ($update_data as $item) : ?>
<div>
        <h1><?php echo $item['ref']; ?></h1>
        <p><?php echo $item['message']; ?></p>
        </div>
    <?php endforeach; ?>

</div>
</div>

<?php include 'inc/footer.php' ;?>

