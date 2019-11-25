<?php
include "../layout/header.php";
include "../layout/nav.php";
include "../controllers/productsController.php"
?>
<article>
    <section>
        <h1>Products:</h1>
        <p style="color: white">
        <?php
            $products = get_products(20);
            foreach ($products as $product) {
                echo "<div class='product-container'>";
                echo "<h3>".$product["title"]."</h3>";
                echo "<p>".$product["description"]."</p>";
                echo "<i>".$product["price"]."</i>";
                echo "</div>";
            }
        ?>
        </p>
        <p>products</p>
    </section>
</article>

<?php
include "../layout/footer.php";
