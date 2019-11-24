<?php
$currentPage = $_SERVER['REQUEST_URI'];
?>
<div class="announcement" id="announcement"><?php echo "<p>$announcement</p>";?></div>
<nav>
    <ul class="nav">
            <li class="nav-item-left"><a href="../index.php"><?php echo $title?></a></li>
            <li <?php if ($currentPage == '/index.php'){echo 'class="nav-item-active"';}else{echo'class="nav-item"';} ?>><a href="../index.php">Home</a></li>
            <li <?php if ($currentPage == '/pages/products.php'){echo 'class="nav-item-active"';}else{echo'class="nav-item"';} ?>><a href="../pages/products.php">Products</a></li>
            <li <?php if ($currentPage == '/pages/blog.php'){echo 'class="nav-item-active"';}else{echo'class="nav-item"';} ?>><a href="../pages/blog.php">Blog</a></li>
            <li <?php if ($currentPage == '/pages/contact.php'){echo 'class="nav-item-active"';}else{echo'class="nav-item"';} ?>><a href="../pages/contact.php">Contact</a></li>
            <li class="nav-item-right"><a href="../pages/login.php">Log In</a></li>
    </ul>

</nav>
