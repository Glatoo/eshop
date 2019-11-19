<?php
include "../env.php";
include "../layout/header.php";
include "../layout/nav.php";
?>
    <article>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">

                    <div id="carousel_home" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../img/vans1jpg.jpg" class="d-block w-100 img-fluid" alt="vans1">
                            </div>
                            <div class="carousel-item">
                                <img src="../img/vans2.jpg" class="d-block w-100 img-fluid" alt="vans2">
                            </div>
                            <div class="carousel-item">
                                <img src="../img/converse1.png" class="d-block w-100 img-fluid" alt="converse1">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel_home" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" style="color: black;" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel_home" role="button" data-slide="next">
                            <i class="fa fa-angle-right" style="color: black;" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
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
