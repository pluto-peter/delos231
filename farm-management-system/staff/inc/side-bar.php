
<div class="side-bar show">
        <div class="user-info">
        <img src="images/pic101.jpeg" alt="">
        <?php


if(isset($_SESSION['usertype'])){
    echo '<h1>logged in as ' . $_SESSION['usertype'] . '</h1>';
    
} else {
    echo '<h1>welcome guest</h1>';
}
        
?>
</div>
        <div class="menu-list">
            <ul class="menu-list-items">
                <li class="item item-4"><a href="irrigation.php">task completion status</a></li>
                <li class="item item-1"><a href="priority_tasks.php">crops</a></li>
                <li class="item item-2"><a href="planting.php">livestock</a></li>
                <li class="item item-5"><a href="fertilization.php">request products</a></li>
                <li class="item item-6"><a href="pestcontrol.php">expenses</a></li>
            </ul>
        </div>
    </div>
    <section class="main-content">
    <section class="forecast"></section>