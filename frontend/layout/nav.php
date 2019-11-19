<?php
$currentPage = $_SERVER['REQUEST_URI'];
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li <?php if ($currentPage == '/products.php'){echo 'class="nav-item active"';}else{echo'class="nav-item"';} ?> >
                <a class="nav-link" href="../pages/products.php">Products</a>
            </li>
            <li <?php if ($currentPage == '/blog.php'){echo 'class="nav-item active"';}else{echo'class="nav-item"';} ?> >
                <a class="nav-link" href="../pages/blog.php">Blog</a>
            </li>
            <li <?php if ($currentPage == '/shops.php'){echo 'class="nav-item active"';}else{echo'class="nav-item"';} ?> >
                <a class="nav-link" href="../pages/shops.php">Shops</a>
            </li>
            <li <?php if ($currentPage == '/contact.php'){echo 'class="nav-item active"';}else{echo'class="nav-item"';} ?> >
                <a class="nav-link" href="../pages/contact.php">Contact</a>
            </li>
        </ul>
    </div>
</nav>
<header>
    <div class="jumbotron">
        <h1 class="display-1 text-center"><?php echo $title;?></h1>
        <h1 class="dispaly-1 text-center"><small class="text-muted">Shop you always wanted</small></h1>

    </div>
</header>