
<div class="main-container">
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form role="form" action="<?php echo URL; ?>projects/updateProject" method="post" id="register">
            <h1 class="text-center">Modification d'un projet</h1>
                <div class="form-group">
                    <select class="form-control input-lg" id="sel1" name="CATEGORY" id="category" tabindex="1" required>
                        <option>Catégorie</option>
                        <option  <?php if(isset($project->CATEGORY) && $project->CATEGORY =="Assurance") echo "selected"?>  >Assurance</option>
                        <option <?php if(isset($project->CATEGORY) && $project->CATEGORY =="Social") echo "selected"?>      >Social</option>
                        <option  <?php if(isset($project->CATEGORY) && $project->CATEGORY =="Musique") echo "selected"?>    >Musique</option>
                        <option   <?php if(isset($project->CATEGORY) && $project->CATEGORY =="Médical") echo "selected"?>  > Médical </option>
                        <option <?php if(isset($project->CATEGORY) && $project->CATEGORY =="Psychologie") echo "selected"?>   > Psychologie </option>
                        <option  <?php if(isset($project->CATEGORY) && $project->CATEGORY =="Autre") echo "selected"?>    >Autre</option>
                    </select>
                </div>
                <input type="hidden" name="ID" value="<?php echo htmlspecialchars($project->ID, ENT_QUOTES, 'UTF-8'); ?>" />
                <div class="form-group">
                    <input type="text" name="NAME" id="title" value="<?php if (isset($project->NAME)) echo htmlspecialchars($project->NAME, ENT_QUOTES, 'UTF-8'); ?>" class="form-control input-lg" placeholder="Titre" tabindex="2" required>
                </div>
                <div class="form-group">
                    <input type="number" name="P_ORDER" id="p_order" value="<?php if (isset($project->P_ORDER)) echo $project->P_ORDER; ?>" class="form-control input-lg" placeholder="Ordre" tabindex="3" required>
                </div>
                <div class="form-group">
                    <textarea name="DESCRIPTION" id="description" class="form-control input-lg" placeholder="Description" tabindex="3" required><?php if (isset($project->DESCRIPTION)) echo br2nl($project->DESCRIPTION); ?></textarea>
                </div>
                 <div class="form-group hide">
                    <input type="file" name="IMAGE" id="image" value="<?php if (isset($project->IMAGE)) echo htmlspecialchars($project->IMAGE, ENT_QUOTES, 'UTF-8'); ?>" class="form-control input-lg" placeholder="Image" tabindex="4" >
                </div>
                 <div class="form-group hide">
                    <input type="text" name="AUTHOR" id="author" value="<?php if (isset($project->AUTHOR)) echo htmlspecialchars($project->AUTHOR, ENT_QUOTES, 'UTF-8'); ?>" class="form-control input-lg" placeholder="Auteur" tabindex="5" required>
                </div>
                
                <div class="colorgraph"></div>
                <div class="row">
                    <div class=" input-group col-xs-12 col-md-8 center-block">
                        <input type="submit" name="submit_update_project" value="Valider les modifications" class="btn btn-primary btn-block btn-lg" tabindex="6">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php function br2nl($string){
return preg_replace('/\<br(\s*)?\/?\>/i', "\n", $string);
}?>