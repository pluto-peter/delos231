
<div class="side-bar show">
        <div class="user-info">
            <img src="images/pic101.jpeg" alt="">
            <p class="name"><?= $_SESSION['username'] ?></p>
            <small class="access-type"><?= $_SESSION['role'] ?></small>
</div>
        <div class="menu-list">
            <ul class="menu-list-items">
                <li class="item item-1"><a href="./cropmanager.php#cropdata1">PLANTING DETAILS</a></li>
                <li class="item item-2"><a href="./cropmanager.php#cropdata2">request field report</a></li>
                <li class="item item-3"><a href="./cropmanager.php#cropdata3">add crop yield data</a></li>
            </ul>
        </div>
    </div>
    <section class="main-content">
    <!-- <section class="forecast"></section> -->