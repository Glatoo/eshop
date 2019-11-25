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
<<<<<<< HEAD
    <article class="forms-article">
        <div class="vl"></div>
        <div class="forms">
            <div class="login">
                <form class="login-form" action="">
                    <label for="email">E-mail</label>
                    <input type="text" name="email">
                    <label for="password">Password</label>
                    <input type="password" name="password">
                </form>
            </div>
            <div class="signup">
                <form class="signup-form" action="">
                    <label for="firstname">Name</label>
                    <input type="text" name="firstname">
                    <label for="surname">Surname</label>
                    <input type="text" name="surname">
                    <label for="email">E-mail</label>
                    <input type="text" name="email">
                    <label for="password">Password</label>
                    <input type="password" name="password">
                    <label for="repassword">Repeat password</label>
                    <input type="password" name="repassword">
                </form>
=======
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
>>>>>>> 228c18b1260077de7d823b29355160417b937f96
            </div>
        </div>
    </article>

<?php
include "../layout/footer.php";
