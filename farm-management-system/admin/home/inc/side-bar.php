<div class="side-bar show">
    <div class="user-info">
        <img src="images/pic101.jpeg" alt="">
        <p class="name"><?= $_SESSION['username']; ?></p>
        <small class="access-type"><?= $_SESSION['role'] ?></small>
    </div>
    <div class="menu-list">
        <h2 class="main-title">your digital farm management assistant</h2>
        <ul class="menu-list-items">
            <li class="item item-5"><a href="../home/deliveries.php">deliveries</a></li>
            <li class="item item-1"><a href="../cropmanager/cropmanager.php">crop management</a></li>
            <li class="item item-2"><a href="../livestockmanager/livestockmanager.php">livestock management</a></li>
            <li class="item item-3"><a href="../taskmanager/priority_tasks.php">task management</a></li>
            <li class="item item-5"><a href="../tourmanager/tourmanager.php">tour management</a></li>
            <li class="item item-4"><a href="../expensetracking/expensetracking.php">expense tracking</a></li>
        </ul>
    </div>
</div>
<section class="main-content">
    <!-- <section class="forecast"></section> -->