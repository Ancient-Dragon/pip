<?php
$title = "All Recipes";
include('header.php'); ?>
    <div class="main">
        <div class="section section-buttons">
            <div class="container">
                <div class="tim-title">
                    <h2>All Recipes</h2>
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
            </div>
        </div>
    </div>
<?php include('footer.php'); ?>