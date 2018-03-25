<?php if (isset($message)) : ?>
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
<?php if($message=="account_created") { echo '<div class="container" style="margin-top:5%;">
        <div class="row">
            <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000;">
                <h2 class="text-center">Merci pour votre enregistrement ! Consultez votre boite email pour activer votre compte .</h2>
                     <a href="'.URL.'home/index" class="btn btn-lg btn-primary center-block">Accueil</a>
                    <a href="'.URL.'users/login" class="btn btn-lg btn-default center-block">Se connecter</a>
                    </div></center>
            </div>
        </div>
    </div>'; }
elseif($message=="email_confirmed")
{ echo '
    <div class="container" style="margin-top:5%;">
        <div class="row">
            <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000;">
                <h2 class="text-center">Votre compte a été activé avec succés, vous pouvez y accéder à present ! </h2>
                     <a href="'.URL.'home/index" class="btn btn-lg btn-primary center-block">Accueil</a>
                    <a href="'.URL.'users/login" class="btn btn-lg btn-default center-block">Se connecter</a>
                    </div></center>
            </div>
        </div>
    </div>';}
elseif ($message=="email_unconfirmed")
{ echo '<div class="container" style="margin-top:5%;">
        <div class="row">
            <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000;">
                <h2 class="text-center">Oops ! Votre email n\'a pas pus etre verifier !</h2>
                    <a href="'.URL.'home/index" class="btn btn-lg btn-primary center-block">Accueil</a>
                    <a href="'.URL.'users/login" class="btn btn-lg btn-default center-block">Se connecter</a>
                </div></center>
            </div>
        </div>
    </div>';}
elseif ($message=="login_error")
{echo'
    <div class="container" style="margin-top:5%;">
        <div class="row">
            <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000;">
                <h2 class="text-center">Nom d\'utilisateur ou mot de passe incorrecte ! Veuillez réessayer svp </h2>
                    <a href="'.URL.'home/index" class="btn btn-lg btn-primary center-block">Accueil</a>
                    <a href="'.URL.'users/login" class="btn btn-lg btn-default center-block">Se connecter</a>
                </div></center>
            </div>
        </div>
    </div>';
}
elseif($message=="account_already_active")
{ echo'
    <div class="container" style="margin-top:5%;">
        <div class="row">
            <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000;">
                <h2 class="text-center">Votre compte est déjà activé , vous pouvez vous connécter ! </h2>
                    <a href="'.URL.'home/index" class="btn btn-lg btn-primary center-block">Accueil</a>
                    <a href="'.URL.'users/login" class="btn btn-lg btn-default center-block">Se connecter</a>
                </div></center>
            </div>
        </div>
    </div>';
}
elseif ($message=="participation_aprouved")
{ echo '<div class="container" style="margin-top:5%;">
        <div class="row">
            <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000;">
                <h2 class="text-center">Demande d\'informations supplémantaires approuvé avec succés !</h2>
                    <a href="'.URL.'home/index" class="btn btn-lg btn-primary center-block">Accueil</a>
                    <a href="'.URL.'users/login" class="btn btn-lg btn-default center-block">Se connecter</a>
                </div></center>
            </div>
        </div>
    </div>';}
elseif ($message=="participation_unaprouved")
{echo'
    <div class="container" style="margin-top:5%;">
        <div class="row">
            <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000;">
                <h2 class="text-center">Impossible d\'approuver la demande d\'informations supplémentaire! Contactez l\'administrateur du site svp.</h2>
                    <a href="'.URL.'home/index" class="btn btn-lg btn-primary center-block">Accueil</a>
                    <a href="'.URL.'users/login" class="btn btn-lg btn-default center-block">Se connecter</a>
                </div></center>
            </div>
        </div>
    </div>';
}
elseif ($message=="participation_sended")
{ echo '<div class="container" style="margin-top:5%;">
        <div class="row">
            <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000;">
                <h2 class="text-center">Votre demande d\'informations a été envoyé avec succés !</h2>
                    <a href="'.URL.'home/index" class="btn btn-lg btn-primary center-block">Accueil</a>
                    <a href="'.URL.'users/login" class="btn btn-lg btn-default center-block">Se connecter</a>
                </div></center>
            </div>
        </div>
    </div>';}
elseif ($message=="participation_unsended")
{echo'
    <div class="container" style="margin-top:5%;">
        <div class="row">
            <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000;">
                <h2 class="text-center">Impossible d\'envoyer votre demande ! Contactez l\'administrateur du site svp.</h2>
                    <a href="'.URL.'home/index" class="btn btn-lg btn-primary center-block">Accueil</a>
                    <a href="'.URL.'users/login" class="btn btn-lg btn-default center-block">Se connecter</a>
                </div></center>
            </div>
        </div>
    </div>';
}
else{ echo'
<div class="container" style="margin-top:5%;">
    <div class="row">
        <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000;">
            <h2 class="text-center">Erreur Interne</h2>
                <a href="'.URL.'home/index" class="btn btn-lg btn-primary">Accueil</a>
                <a href="'.URL.'users/login" class="btn btn-lg btn-default">Se connecter</a>
            </div></center>
        </div>
    </div>
</div>';
}
 endif; ?>
</body>
</html>