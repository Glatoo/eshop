<?php
include "../layout/header.php";
include "../layout/nav.php";
include "../controllers/userController.php";
if(isset($_POST["login"])){
    $status = login($_POST["username"], $_POST["password"]);
    if($status == -1){
        echo "Nevyplnene polia";
    }
    else if ($status == -2){
        echo "Neviem sa napojit na DB";
    }
    else if ($status == -3){
        echo "Zle udaje";
    }
    else if ($status == -4){
        echo "Prazdne pole";
    }
    else if ($status == -5){
        echo "Chyba vo vykonani";
    }
    else if($status == 1){
        echo "Sme dnu";
    }
}
?>
    <article>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 jumbotron">
                    <form action="#" method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h3 class="text-center container-fluid">Login</h3>
                                        <label class="text-center" for="username">Username: </label>
                                        <input type="text" name="username" id="username">

                                    </div>
                                    <div class="form-group">
                                        <label class="text-center container-fluid" for="password"> Password: </label>
                                        <input type="password" name="password" id="password">

                                    </div>
                                    <button type="submit" name="login" id="login" class="btn btn-primary">Login</button>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <section>
            <p>index</p>
        </section>
    </article>

<?php
include "../layout/footer.php";
