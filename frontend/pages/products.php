<?php
include "../layout/header.php";
include "../layout/nav.php";
include "../controllers/productsController.php"
?>
<article>
    <section>
        <h1>Products:</h1>
        <form action="products.php" style="color: white" method="post">
            <h1 style="color: #fff;">Search</h1>
            <?php
            $categories = MyLibrary\ProductController::get_categories();
            foreach ($categories as $category){
                echo "<label for='".$category."'>".$category."</label>";
                echo "<input value='".$category."' id='".$category."' type='checkbox' name='category[]'>";
                echo "<br>";
            }
            ?>
            <input type="submit" value="Search">

        </form>
        <?php
        if (!empty($_POST["category"])) {
            echo "<p style='color: white'>".json_encode($_POST["category"])."</p>";
            $products = MyLibrary\ProductController::get_products(20, $_POST["category"]);
        }else{
            $products = MyLibrary\ProductController::get_products(20);
        }
            echo "<h1 style='color: #fff;'>Pocet produktov: ".count($products)."ks</h1>";
            foreach ($products as $index => $product) {
                $index++;
                echo "<div class='product-container' style='color: white'>";
                echo "<h1 class='product-header'>" . $index .". ". $product[0]. "</h1>";
                echo "<p class='product-description'>" . $product[1] . "</p>";
                echo "<i class='product-price'>" . $product[2] . "</i><br>";
                echo "<p class='product-img'>" . $product[3] . "</p>";
                echo "</div>";
            }
        ?>
        <p>products</p>
    </section>
</article>

<?php
include "../layout/footer.php";
