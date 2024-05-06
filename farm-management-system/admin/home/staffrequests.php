<?php 

include 'inc/header.php';
include 'inc/side-bar.php';

?>


<?php
$sql = 'SELECT * FROM inputrequests';
$result = mysqli_query($conn, $sql);
$input_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="sqltable" id="sqltable">

    <h1 class="priority_header">requested inputs, supplies, and equipment</h1>

    <?php if (empty($input_data)) : ?>
        <p>No Recent Requests</p>
    <?php endif; ?>

    <?php foreach ($input_data as $item) : ?>

        <table>
            <thead>
                <th>department</th>
                <th>section</th>
                <th>request</th>
                <th>manager</th>
                <th>date</th>
                <th>action</th>
            </thead>
            <tbody>
                <td><?php echo $item['department']; ?></td>
                <td><?php echo $item['section']; ?></td>
                <td><?php echo $item['request']; ?></td>
                <td><?php echo $item['manager']; ?></td>
                <td><?php echo $item['date']; ?></td>
                <td>
                    <a href="deleteinputrequests.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a>
                </td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>



<?php include 'inc/footer.php'; ?>