<?php
$title = "Register";
$classes = 'navbar-transparent';

include('header.php'); ?>

    <div class="wrapper">
        <div class="page-header" style="background-image: url('<?php echo BASE_URL; ?>static/images/register-bg.jpg')">
            <div class="filter"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 ml-auto mr-auto">
                        <div class="card card-register">
                            <h3 class="title">Sign Up</h3>
                            <form class="register-form" id="register" name="register" action="#" method="post">
                                <label for="email">Email</label>
                                <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="nc-icon nc-email-85"></i>
                                        </span>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email Address">
                                </div>

                                <label for="confirm_email">Confirm Email</label>
                                <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="nc-icon nc-email-85"></i>
                                        </span>
                                    <input type="email" id="confirm_email" name="confirm_email" class="form-control" placeholder="Confirm Email Address">
                                </div>

                                <label for="password">Password</label>
                                <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="nc-icon nc-key-25"></i>
                                        </span>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                </div>

                                <label for="confirm_password">Confirm Password</label>
                                <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="nc-icon nc-key-25"></i>
                                        </span>
                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                                </div>

                                <button type="submit" class="btn btn-primary btn-block btn-round">Register</button>
                            </form>
                            <div class="forgot">
                                <a href="<?php echo BASE_URL; ?>auth/login" class="btn btn-link btn-primary">Already have an account?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.php'); ?>