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
            <h2 style="color: white">Brand</h2>
            <?php
            $sub_cat = "Brand";
            $categories = MyLibrary\ProductController::get_categories($sub_cat);
            foreach ($categories as $category){
                echo "<label for='".$category."'>".$category."</label>";
                echo "<input value='".$category."' id='".$category."' type='checkbox' name='brand[]'>";
                echo "<br>";
            }
            ?>
            <h2 style="color: white">Size</h2>
            <?php
            $sub_cat = "Size";
            $categories = MyLibrary\ProductController::get_categories($sub_cat);
            foreach ($categories as $category){
            echo "<label for='".$category."'>".$category."</label>";
            echo "<input value='".$category."' id='".$category."' type='checkbox' name='size[]'>";
            echo "<br>";
            }
            ?>
            <h2 style="color: white">Type</h2>
            <?php
            $sub_cat = "Type";
            $categories = MyLibrary\ProductController::get_categories($sub_cat);
            foreach ($categories as $category){
                echo "<label for='".$category."'>".$category."</label>";
                echo "<input value='".$category."' id='".$category."' type='checkbox' name='type[]'>";
                echo "<br>";
            }
            ?>
            <h2 style="color: white">Price</h2>
            <label for="min_price">Minimal price: </label>
            <input type="number" name="min_price" id="min_price">
            <label for="max_price">Maximum price: </label>
            <input type="number" name="max_price" id="max_price">
            <input type="submit" value="Search" name="search">

        </form>
        <?php
        if (isset($_POST["search"])) {
            $products = MyLibrary\ProductController::get_products(20, $_POST["type"], $_POST["size"], [$_POST["min_price"], $_POST["max_price"]], $_POST["brand"]);
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
