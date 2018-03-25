

<div class="main-container">
    <div class="row">
        <div class="container">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <form role="form" name="form1" action="<?php echo URL; ?>users/updateUser" method="post" id="edit_user_form">
                <h3 class="text-center">Modification de profil</h3>
                <div class="colorgraph"></div>
                <div class="form-group">
                    <label for="SPECIALITY" style="font-size:large;">Domaine d'expertise</label>
                </div>
                <div  class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <select class="form-control input-lg" id="sel1" name="SPECIALITY" id="category"  required>
                                <option value="Aérien" <?php if(isset($user->SPECIALITY) && $user->SPECIALITY =="Aérien") echo "selected";?>>Aérien</option>
                                <option  value="Aéronautique" <?php if($user->SPECIALITY =="Aéronautique") echo "selected";?>>Aéronautique</option>
                                <optionn value="Architecture" <?php if( $user->SPECIALITY =="Architecture") echo "selected";?>>Architecture</optionn>
                                <option  value="Assurance" <?php if( $user->SPECIALITY =="Assurance") echo "selected";?>>Assurance</option>
                                <option  value="Blockchain" <?php if($user->SPECIALITY =="Blockchain") echo "selected";?>>Blockchain</option>
                                <option  value="BTP" <?php if($user->SPECIALITY =="BTP") echo "selected";?>>BTP</option>
                                <option  value="Communication" <?php if( $user->SPECIALITY =="Communication") echo "selected";?>>Communication</option>
                                <option value="Conseil" <?php if($user->SPECIALITY =="Conseil") echo "selected";?>>Conseil</option>
                                <option value="Data Science" <?php if($user->SPECIALITY =="Data Science") echo "selected";?>>Data Science</option>
                                <option value="Droit" <?php if($user->SPECIALITY =="Droit") echo "selected";?>>Droit</option>
                                <option value="Energie" <?php if($user->SPECIALITY =="Energie") echo "selected";?>>Energie</option>
                                <option value="Enseignement" <?php if($user->SPECIALITY =="Enseignement") echo "selected";?>>Enseignement</option>
                                <option value="Entreprenariat Social" <?php if($user->SPECIALITY =="Entreprenariat Social") echo "selected";?>>Entreprenariat Social</option>
                                <option value="Finance" <?php if($user->SPECIALITY =="Finance") echo "selected";?>>Finance</option>
                                <option value="Fusion Acquisition" <?php if( $user->SPECIALITY =="Fusion Acquisition") echo "selected";?>>Fusion Acquisition</option>
                                <option value="Généraliste" <?php if($user->SPECIALITY =="Généraliste") echo "selected";?>>Généraliste</option>
                                <option value="Gestion" <?php if( $user->SPECIALITY =="Gestion") echo "selected";?>>Gestion</option>
                                <option value="Informatique" <?php if($user->SPECIALITY =="Informatique") echo "selected";?>>Informatique</option>
                                <option value="Intelligence Artificielle" <?php if( $user->SPECIALITY =="Intelligence Artificielle") echo "selected";?>>Intelligence Artificielle</option>
                                <option value="Langues Etrangères" <?php if($user->SPECIALITY =="Langues Etrangères") echo "selected";?>>Langues Etrangères</option>
                                <option value="Marketing" <?php if($user->SPECIALITY =="Marketing") echo "selected";?>>Marketing</option>
                                <option value="Mecatronique" <?php if( $user->SPECIALITY =="Mecatronique") echo "selected";?>>Mecatronique</option>
                                <option value="Medical" <?php if($user->SPECIALITY =="Medical") echo "selected";?>>Medical</option>
                                <option value="Mode" <?php if($user->SPECIALITY =="Mode") echo "selected";?>>Mode</option>
                                <option value="RH" <?php if( $user->SPECIALITY =="RH") echo "selected";?>>RH</option>
                                <option value="Santé" <?php if( $user->SPECIALITY =="Santé") echo "selected";?>>Santé</option>
                                <option value="Sport" <?php if($user->SPECIALITY =="Sport") echo "selected";?>>Sport</option>
                                <option value="Stratégie" <?php if( $user->SPECIALITY =="Stratégie") echo "selected";?>>Stratégie</option>
                                <option  value="<?php echo $user->SPECIALITY; ?>" <?php if($user->SPECIALITY) echo "selected"?> ><?php echo $user->SPECIALITY; ?></option>
                                <option   value="other" ><strong>Autre</strong></option>
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
                        <input type="hidden" name="ID" value="<?php if (isset($user->ID)) echo htmlspecialchars($_SESSION['userId'], ENT_QUOTES, 'UTF-8'); ?>" />
                        <div class="form-group">
                            <input type="text" minlength="2" name="FIRSTNAME" id="first_name" class="form-control input-lg" placeholder="Prenom" tabindex="1" value="<?php if (isset($user->FIRSTNAME)) echo htmlspecialchars($user->FIRSTNAME, ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" minlength="2" name="LASTNAME" value="<?php if (isset($user->LASTNAME)) echo htmlspecialchars($user->LASTNAME, ENT_QUOTES, 'UTF-8'); ?>" id="last_name" class="form-control input-lg" placeholder="Nom" tabindex="2" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input type="email" minlength="8" name="EMAIL" value="<?php if (isset($user->EMAIL)) echo htmlspecialchars($user->EMAIL, ENT_QUOTES, 'UTF-8'); ?>" id="email" class="form-control input-lg" placeholder="Adresse email" tabindex="4" required>
                </div>
                <div class="form-group">
                    <input type="text" minlength="2" name="USERNAME" value="<?php if (isset($user->USERNAME)) echo htmlspecialchars($user->USERNAME, ENT_QUOTES, 'UTF-8'); ?>" id="username" class="form-control input-lg" placeholder="Nom d'utilisateur" tabindex="4" readonly>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" minlength="5" name="PASSWORD" id="password" class="form-control input-lg" placeholder="Mot de passe" tabindex="5" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" name="PASSWORD2" id="password_confirmation" class="form-control input-lg" placeholder="Nouveau mot de passe" tabindex="6">
                        </div>
                    </div>
                </div>

                <div class="colorgraph"></div>
                <div class="row">
                    <div class="col-xs-12 col-md-6"><input type="submit" name="submit_update_user" value="Valider" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                    <div class="col-xs-12 col-md-6"><a href="<?php echo URL . 'home/index'; ?>" class="btn btn-success btn-block btn-lg">Annuler</a></div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Termes & Conditions</h4>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">J'accepte</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
</div>

<script type="text/javascript">
    window.onload=function() {
        var other = document.getElementById('other');
        other.style.display = 'none';
        document.form1.SPECIALITY.onchange = function() {
            other.style.display =(this.value=='other')? '' : 'none';
        };
    };
</script>
