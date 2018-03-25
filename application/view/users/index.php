
<div class="main-container">
<!-- Section Member
================================================== -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Les Membres</h2>
                    <div class="colorgraph"></div>
                </div>
            </div>
        </div>

            <div class="container">
                <h4 class="bg-darkgray btn-round text-center">Total : <span class="badge"><?php echo $amount_of_users; ?></span></h4>
                <?php foreach ($users as $user) { ?>
                    <!-- /.col-md-4 -->
                    <div class="wow-pricing-table col-md-4">
                        <div class="wow-pricing featured">
                            <div class="wow-pricing-header">
                                <div class="wow-pricing-cost">
                                    <p> <strong><?php if (isset($user->FIRSTNAME)) echo htmlspecialchars($user->FIRSTNAME, ENT_QUOTES, 'UTF-8'); ?> <?php if (isset($user->LASTNAME)) echo htmlspecialchars($user->LASTNAME, ENT_QUOTES, 'UTF-8'); ?></strong></p>
                                </div>
                                <div class="wow-pricing-per">
                                    <?php
                                        if (isset($user->SPECIALITY) AND $user->SPECIALITY != "")
                                        {
                                         echo htmlspecialchars($user->SPECIALITY, ENT_QUOTES, 'UTF-8');
                                        }
                                        else{echo 'Non sélectionnée ';}
                                     ?>
                                </div>
                            </div>
                            <div class="wow-pricing-content" style="height: 150px;">
                                <p> <strong>User :</strong> <?php if (isset($user->USERNAME)) echo htmlspecialchars($user->USERNAME, ENT_QUOTES, 'UTF-8'); ?></p>
                                <p> <strong>Domaine :</strong> <?php if (isset($user->SPECIALITY)) echo htmlspecialchars($user->SPECIALITY, ENT_QUOTES, 'UTF-8'); ?></p>
                                <p> <strong>Inscrit le :</strong> <?php if (isset($user->CREATE_DATE)) echo htmlspecialchars($user->CREATE_DATE, ENT_QUOTES, 'UTF-8'); ?></p>
                                <p> <strong>Email :</strong> <?php if (isset($user->EMAIL)) echo htmlspecialchars($user->EMAIL, ENT_QUOTES, 'UTF-8'); ?></p>
                            </div>
                            <div class="wow-pricing-button">
                                <div class="wow-pricing-button">
                                    <!-- Trigger the modal with a button -->
                                    <a href="#" class="wow-button buttonprice" data-toggle="modal" data-target="#myModal<?php if (isset($user->ID)) echo htmlspecialchars($user->ID, ENT_QUOTES, 'UTF-8'); ?>"><span class="wow-button-inner">Plus de details</span></a>
                                </div>
                                <!-- Modal -->
                                <div id="myModal<?php if (isset($user->ID)) echo htmlspecialchars($user->ID, ENT_QUOTES, 'UTF-8'); ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header wow-pricing-cost">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <p><strong><?php if (isset($user->FIRSTNAME)) echo htmlspecialchars($user->FIRSTNAME, ENT_QUOTES, 'UTF-8'); ?>
                                                        <?php if (isset($user->LASTNAME)) echo htmlspecialchars($user->LASTNAME, ENT_QUOTES, 'UTF-8'); ?></strong></p>
                                            </div>
                                            <div class="modal-body">
                                                <p> <strong>Nom d'utilisateur :</strong> <?php if (isset($user->USERNAME)) echo htmlspecialchars($user->USERNAME, ENT_QUOTES, 'UTF-8'); ?></p>
                                                <p> <strong>Domaine :</strong> <?php if (isset($user->SPECIALITY)) echo htmlspecialchars($user->SPECIALITY, ENT_QUOTES, 'UTF-8'); ?></p>
                                                <p> <strong>Inscrit le :</strong> <?php if (isset($user->CREATE_DATE)) echo htmlspecialchars($user->CREATE_DATE, ENT_QUOTES, 'UTF-8'); ?></p>
                                                <p> <strong>Email :</strong> <?php if (isset($user->EMAIL)) echo htmlspecialchars($user->EMAIL, ENT_QUOTES, 'UTF-8'); ?></p>
                                            </div>
                                            <div class="modal-footer" >
                                                <div class="col-md-12 text-center">
                                                    <a href="<?php echo URL . 'users/deleteUser/' . htmlspecialchars($user->ID, ENT_QUOTES, 'UTF-8'); ?>"
                                                       class="btn btn-danger">Supprimer</a>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
</div>
