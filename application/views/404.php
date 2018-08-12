<?php
$title = '404';
$classes = 'navbar-transparent';
$height = 500;
include('header.php'); ?>
    <div class="wrapper">
        <div class="page-header section-dark" style="background-image: url('<?php echo BASE_URL; ?>static/images/home-bg.jpg')">
            <div class="filter"></div>
            <div class="content-center">
                <div class="container">
                    <div class="title-brand">
                        <h1 class="presentation-title">404!</h1>
                    </div>
                    <h2 class="presentation-subtitle text-center">Unfortunately we couldn't find the page you were looking for.</h2>
                </div>
            </div>
            <div class="moving-clouds" style="background-image: url('<?php echo BASE_URL; ?>static/img/clouds.png'); ">

            </div>
        </div>
    </div>

<?php include('footer.php'); ?>