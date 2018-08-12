<?php
$title = $page['recipe']->getName();
$classes = 'navbar-transparent';
$height = 150;
include('header.php'); ?>
    <div class="wrapper">
        <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('<?php echo BASE_URL; ?>static/images/recipe.jpg');">
            <div class="filter"></div>
        </div>
        <div class="section profile-content">
            <div class="container">
                <div class="owner">
                    <div class="avatar">
                        <img src="<?php echo BASE_URL; ?>static/images/joe-gardner-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                    </div>
                    <div class="name">
                        <h4 class="title"><?php echo $page['recipe']->getName() ?><br /></h4>
                        <h6 class="description"><?php echo $page['author']->getEmail() ?></h6>
                    </div>
                </div>
                <br/>
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#method" role="tab">Method</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#ingredients" role="tab">Ingredients</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content following">
                    <div class="tab-pane text-center active" id="method" role="tabpanel">
                        <pre><?php echo $page['recipe']->getDescription() ?></pre>
                    </div>
                    <div class="tab-pane" id="ingredients" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 ml-auto mr-auto">
                                <ul class="list-unstyled follows">
                                    <?php foreach($page['ingredients'] as $ingredient) { ?>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2 ml-auto mr-auto">
                                                <img src="<?php echo BASE_URL; ?>static/images/ingredient.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                            </div>
                                            <div class="col-md-7 col-sm-4  ml-auto mr-auto">
                                                <h6><?php echo $ingredient->getName()?><br /><small><?php echo $ingredient->getAmount() ?> (g)</small></h6>
                                            </div>
                                            <div class="col-md-3 col-sm-2  ml-auto mr-auto">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                    <hr />
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php include('footer.php'); ?>