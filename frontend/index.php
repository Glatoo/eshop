<?php
define("ROOT_DIR", __DIR__);
define(ROOT_DIR, realpath(__DIR__ . '/..'));
include ROOT_DIR.'/layout/header.php';
include ROOT_DIR.'/layout/nav.php';
?>



<article class="index-article">
    <section>
        <div class="heading-container">
            <h1 class="heading">
                <?php echo $store_name;?>
            </h1>
            <p>Lorem ipsum hello my name is peter dzejnous a vítam ťa na svojej paradnej stránke</p>
        </div>
        <div class="menu">
            <a href="#"><span class="dot"></span></a>
            <a href="#"><span class="dot"></span></a>
            <a href="#"><span class="dot"></span></a>
        </div>
    </section>
    <div class="clear"></div>
</article>

<section class="about-us">
    <h1>Newest arrivals</h1>

</section>
<?php
include ROOT_DIR."/layout/footer.php";
