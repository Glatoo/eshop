<?php
include "env.php";
include "layout/header.php";
include "layout/nav.php";
?>
<article>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 jumbotron">
                <form action="index.php">
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
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
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
include "layout/footer.php";
