<div class="main-container">
    <!-- Section Intro Slider
    ================================================== -->
    <div id="carousel-example-generic" class="carousel intro slide" hidden>
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <!-- First slide -->
            <div class="item active" style="background-image:url(img/robot.jpg)">
                <div class="carousel-caption">
                    <h2 data-animation="animated bounceInDown" hidden>
                        Le Coworking c'est</h2>
                    <p class="text-muted"></p>
                    <h1 data-animation="animated bounceInUp">
                        Robbie </h1>
                    <a href="#" class="btn btn-primary btn-lg" data-animation="animated fadeInLeft">Les projets</a><a href="#" class="btn btn-primary btn-lg" data-animation="animated fadeInRight">En savoir plus</a>
                </div>
            </div>
            <!-- /.item -->
            <!-- Second slide -->
            <div class="item" style="background-image:url(img/robot.jpg)">
                <div class="carousel-caption">
                    <h2 data-animation="animated bounceInDown" hidden>
                        Le Coworking c'est</h2>
                    <p class="text-muted"></p>
                    <h1 data-animation="animated bounceInUp">
                        Robbie </h1>
                    <a href="#" class="btn btn-primary btn-lg" data-animation="animated fadeInLeft">Les projets</a><a href="#" class="btn btn-primary btn-lg" data-animation="animated fadeInRight">En savoir plus</a>
                </div>
            </div>
            <!-- /.item -->
            <!-- Third slide -->
            <div class="item" style="background-image:url(img/robot.jpg)">
                <div class="carousel-caption">
                    <h2 data-animation="animated bounceInDown" hidden>
                        Le Coworking c'est</h2>
                    <p class="text-muted"></p>
                    <h1 data-animation="animated bounceInUp">
                        Robbie </h1>
                    <a href="#" class="btn btn-primary btn-lg" data-animation="animated fadeInLeft">Les projets</a><a href="#" class="btn btn-primary btn-lg" data-animation="animated fadeInRight">En savoir plus</a>
                </div>
            </div>
            <!-- /.item -->
        </div>
        <!-- /.carousel-inner -->
        <!-- Controls (currently displayed none from style.css)-->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Precedant</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
        </a>
    </div>
    <!-- /.carousel -->

    <div class="container">
        <div class="row">
            <?php if (isset($_SESSION['firstname']) && $_SESSION['username'] == "david.banquet.admin") :?>
                <a href="<?php echo URL; ?>projects/addProject" class="btn btn-ghost btn-lg">Ajouter un projet</a>
            <?php endif ?>
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Les Projets</h2>
                <div class="colorgraph"></div>
                <!-- /////////////////////BAR DE NAVIGATION////////////////////////////////////  -->
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <form class="navbar-form" action="<?php echo URL; ?>projects/index" method="post">
                                <div class="navbar-left">
                                <div class="form-group">
                                    <label for="sel1">Catégorie</label>
                                    <select class="form-control" id="sel1" name="CATEGORY" id="category" tabindex="1" >
                                        <option value="" <?php if (isset($category)) { if ($category=="") echo 'selected'; }?>></option>
                                        <option <?php if (isset($category)) { if ($category=="Assurance") echo 'selected'; }?> >Assurance</option>
                                        <option  <?php if (isset($category)) { if ($category=="Social") echo 'selected'; }?>>Social</option>
                                        <option  <?php if (isset($category)) { if ($category=="Musique") echo 'selected'; }?> > Musique </option>
                                        <option  <?php if (isset($category)) { if ($category=="Médical") echo 'selected'; }?> > Médical </option>
                                        <option  <?php if (isset($category)) { if ($category=="Psychologie") echo 'selected'; }?> > Psychologie </option>
                                        <option <?php if (isset($category)) { if ($category=="Autre") echo 'selected'; }?> >Autre</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="NAME" placeholder="Titre du projet" value="<?php if (isset($name)) echo $name; else echo '';?>">
                                </div>
                                <div class="form-group hide">
                                    <input type="text" class="form-control searchDate form-control input-sm datepicker margin-bottom" name="DATE_CREATION1" value="<?php if (isset($c_date_c1)) echo $c_date_c1; else echo '';?>" placeholder="Plus tot">
                                </div>
                                <div class="form-group hide">
                                    <input type="text" class="form-control searchDate form-control input-sm datepicker margin-bottom" name="DATE_CREATION2" value="<?php if (isset($c_date_c2)) echo $c_date_c2; else echo '';?>" placeholder="Plus tard"><br/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="search_btn" class="btn btn-default" style="margin-top: 0px;">Chercher</button>
                                </div>
                                </div>
                                <div class="navbar-right">

                                </div>
                            </form>
                        </div><!-- /.navbar-collapse -->
                        <h4 class="bg-darkgray btn-round text-center">Total : <span class="badge"><?php echo $amount_of_projects; ?></span></h4>
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
        <?php foreach ($projects as $project) { ?>
            <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12 text-center <?php if($project->P_ORDER  % 2 == 0) echo "col-md-offset-offset-4 col-lg-offset-4 col-sm-offset-4";?>">
                <a href="#" class="wow-button buttonprice" data-toggle="modal" data-target="#myModal<?php if (isset($project->ID)) echo htmlspecialchars($project->ID, ENT_QUOTES, 'UTF-8'); ?>">
                <div class="circle col-md-12  col-xs-12 col-lg-12 col-sm-12">
                    <div class="modal-title">
                        <h3 class="project-title">
                            <?php if (isset($project->NAME)) echo htmlspecialchars($project->NAME, ENT_QUOTES, 'UTF-8'); ?>
                        </h3>
                    </div>
                    <div class="modal-body">
                        <p>
                            <?php if (isset($project->CATEGORY)) echo htmlspecialchars($project->CATEGORY, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    </div>
                </div>
                </a>
            </div>

            <!-- Modal -->
            <div id="myModal<?php if (isset($project->ID)) echo htmlspecialchars($project->ID, ENT_QUOTES, 'UTF-8'); ?>" class="modal fade" role="dialog">
                <div class="modal-lg center-block">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">X</button>
                            <h3 class="modal-title text-center"> <?php if (isset($project->NAME)) echo htmlspecialchars($project->NAME, ENT_QUOTES, 'UTF-8'); ?></h3>
                            <p class="text-center"> <?php if (isset($project->CATEGORY)) echo htmlspecialchars($project->CATEGORY, ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                        <div class="modal-body" style="font-style: inherit;">
                            <?php $participation_state = $this->model->checkParticipation($_SESSION['userId'],$project->ID); ?>

                       <!-- ACTIVATION DESCRIPTIONS DES 4 PREMIERS PROJETS POUR TOUS LES USERS------------------------------- -->
                                <?php if ($project->P_ORDER<=4) {$participation_state = "ENABLED";}?>
                        <!-- FIN ACTIVATION DESCRIPTIONS --------------------------------------------------------------------- -->

                            <?php if ($participation_state == "undefined" &&  $_SESSION['username'] != "david.banquet.admin" ):?>
                        <div class="input-group center-block text-center">
                            <p class="alert-warning center-block">
                                <em class=" glyphicon glyphicon-info-sign "></em>
                                Déscription indisponible pour l'instant
                            </p>
                        </div>
                                <form action="<?php echo URL . 'projects/addParticipation/'; ?>" method="post">
                                    <div class="modal-footer" >
                                        <div class="col-md-12 text-center">
                                            <input type="text" name="id_project" value=<?php echo $project->ID; ?>" class="hide">
                                            <input type="text" name="id_user" value=<?php echo $_SESSION["userId"]?>" class="hide">
                                            <input type="text" name="email" value="<?php echo $_SESSION["email"]?>" class="hide">
                                            <input type="text" name="firstname" value="<?php echo $_SESSION["firstname"]?>" class="hide">
                                            <input type="text" name="lastname" value="<?php echo $_SESSION["lastname"]?>" class="hide">
                                            <input type="submit" class="btn btn-ghost hidden-xs" value="Demander des informations détaillées" >
                                            <input type="submit" class="btn btn-ghost hidden-sm hidden-lg hidden-md" value="Informations détaillées" >
                                        </div>
                                    </div>
                                </form>
                            <?php endif ?>
                            <?php if ($participation_state == "ENABLED" || $_SESSION['username'] == "david.banquet.admin" ) :?>
                                <p class="text-left"> <?php echo $project->DESCRIPTION; ?></p>
                            <?php endif ?>
                        </div>
                        <?php if ($participation_state == "DISABLED" &&  $_SESSION['username'] != "david.banquet.admin" ):?>
                            <div class="modal-footer" >
                                <div class="col-md-12 text-center">
                                    <?php if ($participation_state == "DISABLED") :?>
                                        <span class=" glyphicon glyphicon-info-sign"></span>
                                        <p> <strong>Votre demande d'information n'a pas encore été approuvé, Réessayer ulterieurement !</strong><br>
                                            Pour signaler un probléme, merci de me contacter grace au  <a class="fa-link" href="<?php echo URL; ?>home#contact">formulaire de contact</a></p>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($_SESSION['username'] == "david.banquet.admin") :?>
                        <div class="modal-footer" >
                            <div class="col-md-12 text-center">
                            <a href="<?php echo URL . 'projects/editProject/' . htmlspecialchars($project->ID, ENT_QUOTES, 'UTF-8'); ?>"
                               class="btn btn-primary">Modifier</a>
                            <a href="<?php echo URL . 'projects/deleteProject/' . htmlspecialchars($project->ID, ENT_QUOTES, 'UTF-8'); ?>"
                               class="btn btn-danger">Suprimer</a>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if ($_SESSION['username'] == "david.banquet.admin" || $participation_state == "ENABLED" ):?>
                            <div class="modal-footer" >
                                <form method="post" action="<?php echo URL . 'comments/addComment/'; ?>">
                                    <textarea wrap="hard" class="form-control input-lg" placeholder="Votre commentaire ici" name="TEXT" id="text"></textarea>
                                    <input type="text" id="id_user" name="ID_USER" value="<?php echo $_SESSION['userId']; ?>" class="hide" />
                                    <input type="text" id="id_user" name="ID_PROJECT" value="<?php echo $project->ID; ?>" class="hide" />
                                    <input type="submit" name="submit_add_comment" class="btn btn-success" value="Envoyer" />
                                </form>
                                <p>
                                    <!-- GETTING AMOUNTS OFF SELECTED PROJECT COMMENTS -->
                                    <?php $amount_of_project_comments = $this->model->getAmountOfProjectsComments($project->ID); ?>
                                <h3 class="bg-darkgray btn-round text-center">Total commentaires :
                                    <span class="badge"><?php echo $amount_of_project_comments; ?></span>
                                </h3>
                                <!--GETTING ALL COMMENT OF SELECTED PROJECT -->
                                <?php $projectcomments = $this->model->getProjectComments($project->ID); ?>
                                <?php foreach ($projectcomments as $projectcomment) { ?>
                                <!-- TEST ---->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <strong>
                                                    <?php if (isset($projectcomment->FIRSTNAME)) echo htmlspecialchars($projectcomment->FIRSTNAME, ENT_QUOTES, 'UTF-8'); ?>
                                                    <?php if (isset($projectcomment->LASTNAME)) echo htmlspecialchars($projectcomment->LASTNAME, ENT_QUOTES, 'UTF-8'); ?>,
                                                </strong>
                                                <span class="text-muted">at  <?php if (isset($projectcomment->CREATE_DATE)) echo htmlspecialchars($projectcomment->CREATE_DATE, ENT_QUOTES, 'UTF-8'); ?></span>
                                            </div>
                                            <div class="panel-body">
                                                <p class="text-left"><?php if (isset($projectcomment->TEXT)) echo $projectcomment->TEXT ; ?></p>
                                            </div><!-- /panel-body -->
                                        </div><!-- /panel panel-default -->
                                    </div><!-- /col-sm-5 -->
                                </div>

                                <!--- End TEST >
                                            <?php } ?>
                                            <!--END GETTING ALL COMMENT OF SELECTED PROJECT -->
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
                <?php } ?>
        </div>
    </div>
</div>


