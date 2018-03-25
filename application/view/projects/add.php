
<div class="main-container">
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form role="form" action="<?php echo URL . 'projects/addProject'; ?>" method="post" id="add_project">
            <h1 class="text-center">Ajout d'un Projet</h1>
                <div class="form-group">
                    <select class="form-control input-lg" id="sel1" name="CATEGORY" id="category" tabindex="1" required>
                        <option selected value="UNSELECTED">Catégorie</option>
                        <option value="Assurance">Assurance</option>
                        <option value="Social">Social</option>
                        <option value="Musique" > Musique </option>
                        <option value="Médical" > Médical </option>
                        <option value="Psychologie" > Psychologie </option>
                        <option value="Autre">Autre</option>
                    </select>
                </div> 
                <div class="form-group">
                    <input type="text" name="NAME" id="name" class="form-control input-lg" placeholder="Titre du projet" tabindex="2" required>
                </div>
                <div class="form-group">
                    <input type="number" name="P_ORDER" id="p_order" class="form-control input-lg" placeholder="Ordre" tabindex="3" required>
                </div>

                <div class="form-group">
                    <textarea name="DESCRIPTION" id="description"  class="form-control input-lg" placeholder="Description" tabindex="4" required></textarea>
                </div>
                 <div class="form-group hide">
                    <input type="file" name="IMAGE" id="image" class="form-control input-lg" placeholder="Image" tabindex="5" >
                </div>
                 <div class="form-group hide">
                    <input type="text" name="AUTHOR" id="author" class="form-control input-lg" placeholder="Auteur" tabindex="6" value="<?php echo $_SESSION['firstname']; ?>" required>
                </div>
                
                <div class="colorgraph"></div>
                <div class="row">
                    <div class=" input-group col-xs-12 col-md-6 center-block">
                        <input type="submit" name="submit_add_project" value="Ajouter le projet" class="btn btn-primary btn-block btn-lg" tabindex="7">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>