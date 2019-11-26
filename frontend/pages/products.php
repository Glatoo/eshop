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
            echo "<h1 style='color: #fff;'>Pocet produktov: ".count($products)."ks</h1>";
            foreach ($products as $product) {
                echo "<div class='product-container' style='color: white'>";
                echo "<h1 class='product-header'>" . $product[0] .". ". $product[1]. "</h1>";
                echo "<p class='product-description'>" . $product[2] . "</p>";
                echo "<i class='product-price'>" . $product[3] . "</i><br>";
                echo "<p class='product-img'>" . $product[4] . "</p>";
                echo "</div>";
            }
        ?>
        </p>
        <p>products</p>
    </section>
</article>

<?php
include "../layout/footer.php";
