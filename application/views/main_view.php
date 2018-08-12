<?php
$classes = 'navbar-transparent';
$height = 500;
include('header.php'); ?>
    <div class="wrapper">
        <div class="page-header section-dark" style="background-image: url('<?php echo BASE_URL; ?>static/images/home-bg.jpg')">
            <div class="filter"></div>
            <div class="content-center">
                <div class="container">
                    <div class="title-brand">
                        <h1 class="presentation-title">Recipe Buddy</h1>
                    </div>
                    <h2 class="presentation-subtitle text-center">All your recipes in one place!</h2>
                </div>
            </div>
            <div class="moving-clouds" style="background-image: url('<?php echo BASE_URL; ?>static/img/clouds.png'); ">

            </div>
        </div>
        <div class="main">
            <div class="section section-buttons">
                <div class="container">
                    <div class="tim-title">
                        <h2>Latest Recipes</h2>
                    </div>
                    <div class="row">
                        <?php foreach ($page['recipes'] as $recipe) { ?>
                            <div class="col-8 col-sm-6 col-md-3">
                                <h4 class="images-title"><a href="<?php echo BASE_URL; ?>recipes/view/<?php echo $recipe->getId()?>"><?php echo $recipe->getName()?></a></h4>
                                <a href="<?php echo BASE_URL; ?>recipes/view/<?php echo $recipe->getId()?>"><img src="<?php echo BASE_URL; ?>static/images/recipes.jpg" class="img-rounded img-responsive" alt="Rounded Image"></a>
                                <div class="img-details">
                                    <div class="author">
                                        <img src="<?php echo BASE_URL; ?>static/images/avatar.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                    </div>
                                    <p><?php foreach ($page['users'] as $user) {
                                        if ($user->getId() === $recipe->getUserId()) {
                                            echo $user->getEmail();
                                            break;
                                        }
                                        } ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <a type="button" class="btn btn-outline-info btn-round col-md-12" href="<?php echo BASE_URL; ?>all_recipes">View all recipes</a>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.php'); ?>