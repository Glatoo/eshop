<?php
include "../layout/header.php";
include "../layout/nav.php";
include "../controllers/productsController.php"
?>
<article style="background-color: #E2E2E2;">
    <section>
        <h1 class="products-header">PRODUCTS</h1>
        <form action="products.php" style="color: white; background-color: black; margin-top: -19px;" method="post">
            <h1 style="color: #fff;">Category Search</h1>
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
            $products = MyLibrary\ProductController::get_products(20, $_POST["category"]);
        }else{
            $products = MyLibrary\ProductController::get_products(20);
        }
            echo "<h1 style='color: #000000; margin-bottom: 0; text-align: center; font-weight: lighter;'>Found products: ".count($products)."</h1>";
        echo "<div class='product-list'>";
            foreach ($products as $index => $product) {
                $index++;
                echo "<div class='product-container'>";
                echo "<img class='product-img' src='../img/". $product[3]."'>" ;
                echo "<h1 class='product-header'>". $product[0]. "</h1>";
                echo "<p class='product-description'>" . $product[1] . "</p>";
                echo "<p class='product-price'>" . $product[2] . ",-</p><br>";
                echo "<button class='button-buy'>LEARN MORE</button>";
                echo "</div>";
            }
        echo "</div>";
        ?>
        <p>products</p>
    </section>
</article>

<?php
include "../layout/footer.php";
