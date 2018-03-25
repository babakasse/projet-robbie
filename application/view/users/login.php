<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Robbie Coworking</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <!-- CSS -->
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/animate.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/form.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/modal.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Mrs+Sheppards%7CDosis:300,400,700%7COpen+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800;' rel='stylesheet' type='text/css'>
</head>
<body id="page-top" style="background-image:url(<?php echo URL; ?>img/login_background.png)">

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <form role="form" action="<?php echo URL; ?>users/login" method="post" id="login" class="panel" style="padding:20px">
                <h1 class="text-center hidden-xs">Connexion</h1>
                <h3 class="text-center">Veuillez vous identifier svp !<small> Heureux de vous revoir.</small></h3>
                <div class="colorgraph"></div>
                <div class="form-group">
                    <input type="text" minlength="2" name="USERNAME" id="username" class="form-control input-lg" placeholder="Nom d'utilisateur" tabindex="1" required>
                </div>
                <div class="form-group">
                    <input type="password" mminlength="5" name="PASSWORD" id="password" class="form-control input-lg" placeholder="Mot de passe" tabindex="2" required>
                </div>
                <div class="colorgraph"></div>
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-md-offset-3"><input type="submit" value="Se connecter" class="btn btn-success btn-block btn-lg" tabindex="3"></div>
                </div>
                <div class="row">
                   <div class="col-xs-12 col-md-6 col-md-offset-3"><a href="<?php echo URL; ?>users/register" class="btn btn-primary btn-block btn-lg">S'enregistrer</a></div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>