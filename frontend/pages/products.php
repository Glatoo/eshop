<?php
include "../layout/header.php";
include "../layout/nav.php";
include "../controllers/productsController.php";
if (!isset($_GET["index_page"])) {
    $index_page = 1;
}
?>
<article style="background-color: #ffffff;">
    <section>
        <h1 class="products-header">PRODUCTS</h1>
        <form action="products.php" style="color: #000000; background-color: #ffffff; margin-top: -19px;" method="post">
            <div class="filters">
                <span class="filter-opener" id="brand" onclick="openFilter(id);">Brand</span>
                <span class="filter-opener" id="size" onclick="openFilter(id);">Size</span>
                <span class="filter-opener" id="type" onclick="openFilter(id);">Type</span>
                <span class="filter-opener" id="price" onclick="openFilter(id);">Price</span>
            </div>
            <?php
            $sub_cat = "Brand";
            $categories = MyLibrary\ProductController::get_categories($sub_cat);
            echo "<div class='filter-items' id='brand_sub'>";
            foreach ($categories as $category){
                echo "<div class='filter-items-border'>";
                echo "<label for='".$category."'>".$category."</label>";
                echo "<input value='".$category."' id='".$category."' type='checkbox' name='brand[]'>";
                echo "<br>";
                echo "</div>";
            }
            echo "</div>";
            ?>

            <?php
            $sub_cat = "Size";
            $categories = MyLibrary\ProductController::get_categories($sub_cat);
            echo "<div class='filter-items' id='size_sub'>";
            foreach ($categories as $category){
                echo "<div class='filter-items-border'>";
                echo "<label for='".$category."'>".$category."</label>";
                echo "<input value='".$category."' id='".$category."' type='checkbox' name='size[]'>";
                echo "<br>";
                echo "</div>";
            }
            echo "</div>";
            ?>

            <?php
            $sub_cat = "Type";
            $categories = MyLibrary\ProductController::get_categories($sub_cat);
            echo "<div class='filter-items' id='type_sub'>";
            foreach ($categories as $category){
                echo "<div class='filter-items-border'>";
                echo "<label for='".$category."'>".$category."</label>";
                echo "<input value='".$category."' id='".$category."' type='checkbox' name='type[]'>";
                echo "<br>";
                echo "</div>";
            }
            echo "</div>";
            ?>

            <label for="min_price">Minimal price: </label>
            <input type="number" name="min_price" id="min_price">
            <label for="max_price">Maximum price: </label>
            <input type="number" name="max_price" id="max_price">
            <input type="submit" value="Search" name="search">

        </form>
         <?php
            if (isset($_GET["left"]) && !empty($_GET["left"])) {
                $index_page = $_GET["index_page"] + 1;
            } else if (isset($_GET["right"]) && !empty($_GET["right"])) {
                $index_page = $_GET["index_page"] - 1;
            }
            if (isset($_POST["search"])) {
                $products = MyLibrary\ProductController::get_products(21, $_POST["type"], $_POST["size"], [$_POST["min_price"], $_POST["max_price"]], $_POST["brand"], ($index_page - 1) * 20);
            } else {
                $products = MyLibrary\ProductController::get_products(21, [], [], [], [], ($index_page - 1) * 20);
            }
            //echo "<h1 style='color: #000000; margin-bottom: 0; text-align: center; font-weight: lighter;'>Found products: ".count($products)."</h1>";
            echo "<div class='product-list'>";
            $max = count($products);
            if (count($products) > 20) {
                $max = 20;
            }
            for ($i = 0; $i < $max; $i++) {
                $product = $products[$i];
                echo "<div class='product-container'>";
                echo "<img class='product-img' src='../img/" . $product[4] . "'>";
                echo "<h1 class='product-header'>" . $product[0] . "</h1>";
                echo "<p class='product-description'>" . utf8_encode($product[1]) . "</p>";
                echo "<p class='product-price'>" . $product[2] . ",-</p><br>";
                echo "<p class='product-size'>"."</p><br>";
                echo "<button class='button-buy'>LEARN MORE</button>";
                echo "</div>";
            }
            echo "</div>";
            if (count($products) > 20) {
                ?>
                <form action="products.php" method="get">
                    <input type="hidden" name="index_page" value=<?= $index_page ?>>
                    <input type="submit" name="left" value=">">
                </form>
                <?php
            }
            ?>
            <p><?= $index_page ?></p>
            <?php
            if ($index_page > 1) {
                ?>
                <form action="products.php" method="get">
                    <input type="hidden" name="index_page" value=<?= $index_page ?>>
                    <input type="submit" name="right" value="<">
                </form>
                <?php
            }
            ?>
        </section>
    </article>

<?php
include "../layout/footer.php";
