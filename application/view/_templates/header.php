<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Robbie</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Adding website icone -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo URL; ?>img/icone_2.ico" />

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
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
</head>
<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
   <!-- <div class="container"> -->
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand page-scroll" href="#page-top"><img src="img/robbie.png" alt="logo robbie"></a> -->
            <a style="" href="<?php echo URL; ?>home#page-top"><strong class="bottombrand">Robbie</strong></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left"  style="margin-left:10px">
                <li>
                <a class="page-scroll" href="<?php echo URL; ?>home#page-top">Accueil</a>
                </li>
                <li>
                <a class="page-scroll" href="<?php echo URL; ?>home#about">Les Objectifs</a>
                </li>
                 <li>
                <a class="page-scroll" href="<?php echo URL; ?>home#apropos">A propos de Moi</a>
                </li>
                <li>
                    <a class="page-scroll" href="<?php echo URL; ?>home#influences">Mes Influences</a>
                </li>
                <li>
                    <a class="page-scroll" href="<?php echo URL; ?>projects/index">Les Projets</a>
                </li>
                 <li>
                <a class="page-scroll" href="<?php echo URL; ?>home#contact">Contact</a>
                </li>
                <?php if (isset($_SESSION['username']) && $_SESSION['username'] == "david.banquet.admin") :?>
                    <li >
                        <a class="page-scroll" href="<?php echo URL; ?>users/index">Les Membres</a>
                    </li>
                <?php endif; ?>
            </ul>

             <ul class="nav navbar-nav navbar-right">
                 <li>
                     <div class="dropdown">
                         <button style="margin-top: 5px" class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                             <?php if(isset($_SESSION['firstname']))
                                 echo "Bonjour <span class='badge'>".$_SESSION['firstname']."</span>";
                             else
                                 echo  '<a class="page-scroll" href="<?php echo URL; ?>users/login">Se Connecter</a>'; ?>
                             <span class="caret"></span></button>
                         <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                             <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL; ?>users/editUser/<?php echo $_SESSION['userId']; ?>"><strong>Modifier Mon profil</strong></a></li>
                             <li role="presentation" class="divider"></li>
                             <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL; ?>users/logout"><strong>Se Deconnecter</strong></a></li>
                         </ul>
                     </div>
                 </li>
            </ul>
        </div>
    </nav>
<!-- /.container -->
