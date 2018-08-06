<?php
$title = "Login";
include('header.php'); ?>

    <div class="wrapper">
        <div class="page-header" style="background-image: url('<?php echo BASE_URL; ?>static/images/register-bg.jpg')">
            <div class="filter"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 ml-auto mr-auto">
                        <div class="card card-register">
                            <h3 class="title">Sign In</h3>
                            <form class="register-form">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email Address">

                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">

                                <button class="btn btn-primary btn-block btn-round">Login</button>
                            </form>
                            <div class="forgot">
                                <a href="<?php echo BASE_URL; ?>auth/register" class="btn btn-link btn-primary">Don't have an account?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.php'); ?>