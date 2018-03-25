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
                <form name="form1" role="form" action="<?php echo URL; ?>users/register" method="post" id="register" class="panel" style="padding:20px;">
                    <h1 class="text-center hidden-xs">Enregistrement</h1>
                    <h3 class="text-center">Veuillez remplir le formulaire svp !</h3>
                    <div class="colorgraph"></div>
                        <div class="form-group">
                            <label for="CATEGORY" style="font-size:large;">Domaine d'expertise</label>
                        </div>
                    <div  class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                    <select name="CATEGORY"  class="form-control input-lg" tabindex="1">
                                        <option value="" selected> </option>
                                        <option value="Aérien">Aérien</option>
                                        <option  value="Aéronautique">Aéronautique</option>
                                        <optionn value="Architecture">Architecture</optionn>
                                        <option  value="Assurance">Assurance</option>
                                        <option  value="Blockchain">Blockchain</option>
                                        <option  value="BTP">BTP</option>
                                        <option  value="Communication">Communication</option>
                                        <option value="Conseil">Conseil</option>
                                        <option value="Data Science">Data Science</option>
                                        <option value="Droit">Droit</option>
                                        <option value="Energie">Energie</option>
                                        <option value="Enseignement">Enseignement</option>
                                        <option value="Entreprenariat Social">Entreprenariat Social</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Fusion Acquisition">Fusion Acquisition</option>
                                        <option value="Généraliste">Généraliste</option>
                                        <option value="Gestion">Gestion</option>
                                        <option value="Informatique">Informatique</option>
                                        <option value="Intelligence Artificielle">Intelligence Artificielle</option>
                                        <option value="Langues Etrangères">Langues Etrangères</option>
                                        <option value="Marketing">Marketing</option>
                                        <option value="Mecatronique">Mecatronique</option>
                                        <option value="Medical">Medical</option>
                                        <option value="Mode">Mode</option>
                                        <option value="RH">RH</option>
                                        <option value="Santé">Santé</option>
                                        <option value="Sport">Sport</option>
                                        <option value="Stratégie">Stratégie</option>
                                        <option value="other"><strong>Autre</strong></option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                 <input type="text" id="other" name="other" class="form-control input-lg" placeholder="Votre domaine d'expertise" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="FIRSTNAME" id="first_name" class="form-control input-lg" placeholder="Prenom" required tabindex="2" minlength="2">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="LASTNAME" id="last_name" class="form-control input-lg" placeholder="Nom" tabindex="3" required minlength="2">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="EMAIL" id="email" class="form-control input-lg" placeholder="Adresse email" tabindex="4" required minlength="10">
                    </div>
                    <div class="form-group">
                        <input type="text" name="USERNAME" id="username" class="form-control input-lg" placeholder="Nom d'utilisateur" tabindex="5" required minlength="3">
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="password" name="PASSWORD" id="password" class="form-control input-lg" placeholder="Mot de passe" tabindex="6" required minlength="5">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="password" name="PASSWORD2" id="password_confirmation" class="form-control input-lg" placeholder="Confirmer le mot de passe" tabindex="7" required minlength="5">
                            </div>
                        </div>
                    </div>
                    <div class="colorgraph"></div>
                    <div class="row center-block">
                        <div class="col-lg-12 hidden-md hidden-xs hidden-sm"><input type="submit" value="Envoyer le mail de confirmation" class="btn btn-primary btn-block btn-lg" tabindex="8"></div>
                        <div class="col-xs-12 col-sm-12 col-md-12 hidden-lg "><input type="submit" value="S'enregistrer" class="btn btn-primary btn-block btn-lg" tabindex="9"></div>
                        <div class="col-xs-12 col-md-6 col-md-offset-3"><a href="<?php echo URL . 'users/login'; ?>" class="btn btn-success btn-block btn-lg" tabindex="10">Se connecter</a></div>
                    </div>

                </form>
            </div>
          </div>
     </div>
<script type="text/javascript">
    window.onload=function() {
        var other = document.getElementById('other');
        other.style.display = 'none';
        document.form1.CATEGORY.onchange = function() {
            other.style.display =(this.value=='other')? '' : 'none';
        };
    };
</script>
</body>
