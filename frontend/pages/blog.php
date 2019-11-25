<?php
include "../layout/header.php";
include "../layout/nav.php";
include "../controllers/blogController.php"
?>
<article>
    <section>
        <h1>Blog</h1>
        <p style="color: white">
            <?php
            $articles = get_articles(20);
            echo json_encode($articles);
            ?>
        </p>
    </section>
</article>

<?php
include "../layout/footer.php";
