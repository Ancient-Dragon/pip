<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <?php if(isset($title)) echo "<title> $title | Recipe Buddy</title>";
    else echo '<title>Recipe Buddy</title>' ?>

    <meta name="description" content="">
    <meta name="author" content="">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <link rel="stylesheet" href="<?php echo BASE_URL; ?>static/css/bootstrap.min.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>static/css/paper-kit.css?v=2.1.0" type="text/css" media="screen" />
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>static/css/nucleo-icons.css" type="text/css" media="screen" />
</head>
<body>
<nav class="navbar navbar-expand-md fixed-top navbar-transparent" color-on-scroll="500">
    <div class="container">
        <div class="navbar-translate">
            <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar"></span>
                <span class="navbar-toggler-bar"></span>
                <span class="navbar-toggler-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo BASE_URL; ?>">Recipe Buddy</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="<?php echo BASE_URL; ?>all_recipes" class="nav-link"><i class="nc-icon nc-book-bookmark"></i> All Recipes</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo BASE_URL; ?>my_recipes" class="nav-link"><i class="nc-icon nc-paper"></i> My Recipes</a>
                </li>
                <?php if(!$page['loggedIn']) { ?>
                <li class="nav-item">
                    <a href="<?php echo BASE_URL; ?>auth/login" class="btn btn-outline-info btn-round"><i class="fas fa-fingerprint"></i> Sign In</a>
                </li>
                <?php } else { ?>
                    <div class="nav-item dropdown">
                        <a class="btn btn-outline-info btn-round dropdown-toggle" data-toggle="dropdown" href="#pk" role="button" aria-haspopup="true" aria-expanded="false"><i class="far fa-user-circle " aria-hidden="true"></i> My Account</a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-info">
                            <li class="dropdown-header" href="#">Account Settings</li>
                            <a class="dropdown-item" href="<?php echo BASE_URL; ?>my_profile">My Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo BASE_URL; ?>auth/logout">Logout</a>
                        </ul>
                    </div>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>