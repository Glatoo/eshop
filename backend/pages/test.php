<?php
include "../layout/header.php";
include "../layout/nav.php";
include "../controllers/adminController.php";
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
if(isset($_POST["register"])){
    $status = register($_POST["username"], $_POST["name"], $_POST["surname"], $_POST["address"], $_POST["email"],$_POST["password"],$_POST["token"]);
    if($status == -1){
        echo "Chybajuce data";
    }
    else if ($status == -2){
        echo "Neplatne(prazdne) udaje";
    }
    else if ($status == -3){
        echo "Zlyhalo pripojenie na DB";
    }
    else if ($status == -4){
        echo "Uzivatel je zaregistrovany alebo email sa pouziva";
    }
    else if ($status == -5){
        echo "Zlyhalo pripravenie SQL pri ziskani osoby";
    }
    else if ($status == -6){
        echo "Zlyhalo pripravenie SQL pri vlozeni osoby";
    }
    else if ($status == -7){
        echo "Neplatny token";
    }
    else if ($status == -8){
        echo "Zlyhalo ziskanie tokena";
    }
    else if($status == 1){
        echo "Registracia uspesna";
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
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 jumbotron">
                    <form action="#" method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h3 class="text-center container-fluid">Register</h3>
                                        <label class="text-center" for="username">Username: </label>
                                        <input type="text" name="username" id="username">

                                    </div>
                                    <div class="form-group">
                                        <label class="text-center" for="name">Name: </label>
                                        <input type="text" name="name" id="name">

                                    </div>
                                    <div class="form-group">
                                        <label class="text-center" for="surname">Surname: </label>
                                        <input type="text" name="surname" id="surname">

                                    </div>
                                    <div class="form-group">
                                        <label class="text-center" for="email">Email: </label>
                                        <input type="email" name="email" id="email">

                                    </div>
                                    <div class="form-group">
                                        <label class="text-center" for="address">Address: </label>
                                        <input type="text" name="address" id="address">


                                    </div>
                                    <div class="form-group">
                                        <label class="text-center" for="token">Token: </label>
                                        <input type="text" name="token" id="token">

                                    </div>
                                    <div class="form-group">
                                        <label class="text-center container-fluid" for="password"> Password: </label>
                                        <input type="password" name="password" id="password">

                                    </div>
                                    <button type="submit" name="register" id="register" class="btn btn-primary">Register</button>
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
