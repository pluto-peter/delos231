
<div class="side-bar show">
        <div class="user-info">
            <img src="images/pic101.jpeg" alt="">
            <p class="name"><?= $_SESSION['username'] ?></p>
            <small class="access-type"><?= $_SESSION['role'] ?></small>
</div>
        <div class="menu-list">
            <ul class="menu-list-items">
                <li class="item item-1"><a href="priority_tasks.php">high priority tasks</a></li>
                <li class="item item-2"><a href="planting.php">planting</a></li>
                <li class="item item-3"><a href="harvesting.php">harvesting</a></li>
                <li class="item item-4"><a href="irrigation.php">irrigation</a></li>
                <li class="item item-5"><a href="fertilization.php">fertilization</a></li>
                <li class="item item-6"><a href="pestcontrol.php">pest control</a></li>
                <li class="item item-8"><a href="stallcleaning.php">stall cleaning</a></li>
                <li class="item item-9"><a href="milking.php">milking</a></li>
                <li class="item item-10"><a href="treeplanting.php">tree planting</a></li>
                <li class="item item-11"><a href="generaltasks.php">general tasks</a></li>
            </ul>
        </div>
    </div>
    <section class="main-content">
    <!-- <section class="forecast"></section> -->