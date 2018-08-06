<?php
$title = "Register";
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
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email Address">

                                <label for="confirm_email">Confirm Email</label>
                                <input type="email" id="confirm_email" name="confirm_email" class="form-control" placeholder="Confirm Email Address">

                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">

                                <label for="confirm_password">Password</label>
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password">

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