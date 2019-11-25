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
    <article class="forms-article">
        <div class="forms">
            <div class="login">
                <form class="login-form" action="">
                    <label for="email-l">E-mail</label>
                    <input type="text" name="email" id="email-l">
                    <label for="password-l">Password</label>
                    <input type="password" name="password" id="password-l">
                </form>
            </div>
            <div class="vl"></div>
            <div class="signup">
                <form class="signup-form" action="">
                    <label for="firstname">Name</label>
                    <input type="text" name="firstname" id="firstname">
                    <label for="surname">Surname</label>
                    <input type="text" name="surname" id="surname">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                    <label for="repassword">Repeat password</label>
                    <input type="password" name="repassword" id="repassword">
                </form>
            </div>
        </div>
    </article>

<?php
include "../layout/footer.php";
