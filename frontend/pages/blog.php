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
            echo "<h1 style='color: #fff;'>Pocet produktov: " . count($articles) . "ks</h1>";
            foreach ($articles as $article) {
                echo "<div class='article-container' style='color: white'>";
                echo "<h1 class='article-header'>" . $article[0] .". ". $article[1]. "</h1>";
                echo "<p class='article-content'>" . $article[2] . "</p>";
                echo "<i class='article-author'>" . $article[3] . "</i><br>";
                echo "<p class='article-date'>" . $article[4] . "</p>";
                echo "</div>";
            }

            ?>
        </p>
    </section>
</article>

<?php
include "../layout/footer.php";
