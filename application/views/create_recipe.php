<?php
$title = "Create a recipe";
include('header.php'); ?>
    <div class="main">
        <div class="section section-buttons">
            <div class="container">
                <div class="tim-title">
                    <h2>Create a recipe</h2>
                </div>
                <form class="create-recipe" action="#" method="post">
                    <div class="container">
                        <div class="tim-title">
                            <h3>Name</h3>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name the recipe">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="tim-title">
                            <h3>Method</h3>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea type="text" id="description" name="description" class="form-control" placeholder="Please describe how you create the end product..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="ingredientsContainer" class="container">
                        <div class="tim-title">
                            <h3>Ingredients</h3>
                        </div>
                        <div class="row" id="ingredients">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="ingredient1" name="ingredient1" placeholder="Enter the name ingredient">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" id="ingredients">
                                    <input type="number" class="form-control" id="ingredient1Amount" name="ingredient1Amount" placeholder="Enter the amount of that ingredient (grams)">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="ingredient2" name="ingredient2" placeholder="Enter the name ingredient">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" id="ingredients">
                                    <input type="number" class="form-control" id="ingredient2Amount" name="ingredient2Amount" placeholder="Enter the amount of that ingredient (grams)">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="ingredient3" name="ingredient3" placeholder="Enter the name ingredient">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" id="ingredients">
                                    <input type="number" class="form-control"  id="ingredient3Amount" name="ingredient3Amount" placeholder="Enter the amount of that ingredient (grams)">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="ingredient4" name="ingredient4" placeholder="Enter the name ingredient">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" id="ingredients">
                                    <input type="number" class="form-control" id="ingredient4Amount" name="ingredient4Amount" placeholder="Enter the amount of that ingredient (grams)">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="ingredient5" name="ingredient5" placeholder="Enter the name ingredient">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" id="ingredients">
                                    <input type="number" class="form-control" id="ingredient5Amount" name="ingredient5Amount" placeholder="Enter the amount of that ingredient (grams)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="col-md-12 btn btn-success btn-round" id="add_ingredient">Save</button>
                </form>
            </div>
        </div>
    </div>
<script>

</script>
<?php include('footer.php'); ?>