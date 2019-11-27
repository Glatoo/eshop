<?php
define("ROOT_DIR", __DIR__);
$currentPage = $_SERVER['REQUEST_URI'];
$right_path_index = ($currentPage == '/index.php' || $currentPage == '/') ?'"./index.php"':'"../index.php"';
$right_path = ($currentPage == '/index.php' || $currentPage == '/')?'"./pages/':'"./';
?>
<div class="announcement" id="announcement"><?php echo "<p>$announcement</p>";?></div>
<nav>
    <p style="color: #fff;"><?=$currentPage?></p>
    <ul class="nav">
            <li class="nav-item-left"><a href="../index.php"><?php echo $title?></a></li>
            <li <?php if ($currentPage == '/index.php'){echo 'class="nav-item-active"';}else{echo'class="nav-item"';} ?>><a href=<?=$right_path_index?>>Home</a></li>




            <li <?php if ($currentPage == '/pages/products.php'){echo 'class="nav-item-active"';}else{echo'class="nav-item"';} ?>><a href=<?= $right_path?>products.php">Products</a></li>
            <li <?php if ($currentPage == '/pages/blog.php'){echo 'class="nav-item-active"';}else{echo'class="nav-item"';} ?>><a href=<?= $right_path?>blog.php">Blog</a></li>
            <li <?php if ($currentPage == '/pages/contact.php'){echo 'class="nav-item-active"';}else{echo'class="nav-item"';} ?>><a href=<?= $right_path?>contact.php">Contact</a></li>
            <li class="nav-item-right"><a href="../pages/login.php">Log In</a></li>
    </ul>

</nav>
