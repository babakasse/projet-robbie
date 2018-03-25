 <?php

/**
 * Class Project
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

 require_once('comments.php');

class Projects extends Comments
{

 public function index()
    {
        $this->checkLogin();

        $amount_of_projects = $this->model->getAmountOfProjects();

        $comments = $this->model->getAllComments();
        $amount_of_comments = $this->model->getAmountOfComments();

        $participations = $this->model->getAllParticipations();

        if(!isset($_POST["search_btn"]))
        {
            // getting all songs and amount of songs
            $projects = $this->model->getAllProjects();

            // load views
            require APP . 'view/_templates/header.php';
            require APP . 'view/projects/index.php';
            require APP . 'view/_templates/footer.php';

        }
        else
        {

            //Prepare set vars for search
            $request = array();
            $variables = array();
            if (!empty($_POST["CATEGORY"]))
            {
                if( $_POST["CATEGORY"] !="")
                {
                    $category = $_POST["CATEGORY"];
                    $request[] = "CATEGORY LIKE :category";
                    $variables[":category"] = $category;
                }
            }

            if (!empty($_POST["NAME"]))
            {
                $name = $_POST["NAME"];
                $request[] = "NAME LIKE :name";
                $variables[":name"] = $name;
            }

            if (!empty($_POST["DATE_CREATION1"]))  //DEBUT
            {
                $c_date_c1 = $_POST["CREATE_DATE"];
                $request[] = "CREATE_DATE >=:date_c_1";
                $variables[":date_c_1"] = date_sql($c_date_c1);
            }
            if (!empty($_POST["DATE_CREATION2"]))  //FIN
            {
                $c_date_c2 = $_POST["DATE_CREATION2"];
                $request[] = "CREATE_DATE <= :date_c_2";
                $variables[":date_c_2"] = date_sql($c_date_c2);
            }

            if (count($request) > 0)
            {
                $search = "WHERE " . implode(" AND ", $request) . " ";

                $projects = $this->model->searchProject($search,$variables);
            }
            else{
                // getting all songs and amount of songs
                $projects = $this->model->getAllProjects();
            }

            // load views
            require APP . 'view/_templates/header.php';
            require APP . 'view/projects/index.php';
            require APP . 'view/_templates/footer.php';

        }

    }



    public function getAllParticipations()
    {
        $this->checkLogin();
            $this->model->getAllParticipations();
    }

    public function addParticipation()
    {
        $this->checkLogin();
        if(isset($_POST['id_project']) && isset($_POST['id_user']))
        {
            $id_project=$_POST['id_project'];
            $id_user=$_POST['id_user'];
            $this->model->addParticipation( $id_user,$id_project);
            $this->send_email_confirmation($_POST['firstname'],$_POST['lastname'],$id_project,$id_user);

            $message="participation_sended";
            header('location: ' . URL . 'users/confirmation/'.$message);
        }
        else{
            $message="participation_unsended";
            header('location: ' . URL . 'users/confirmation/'.$message);
        }
    }

    public function send_email_confirmation($firstname,$lastname,$id_project,$id_user){


        // Préparation du mail contenant le lien d'activation
        $destinataire = "david.banquet@projet-robbie.fr";
        $sujet = "Demande de participation" ;
        $entete = "From: participation@projet-robbie.fr" ;
        $project = $this->model->getProject($id_project);
        $nom_projet = $project->NAME;

        // Le lien d'activation est composé du login(log) et de la clé(cle)
        $message = 'Bonjour David,
         
        Pour approuver la participation de '.$firstname.' '.$lastname.' au projet :
        "'.$nom_projet.'",
        veuillez cliquer sur le lien ci dessous ou copier/coller dans votre navigateur internet.
         
        http://projet-robbie.fr/projects/activeParticipation?id_project='.urlencode($id_project).'&id_user='.urlencode($id_user).'
         
         
        ---------------
        Ceci est un mail automatique, Merci de ne pas y répondre.';

        mail($destinataire, $sujet, $message, $entete); // Envoi du mail)

    }

    public function activeParticipation()
    {

        // Récupération des variables nécessaires à l'activation
        if(isset($_GET['id_user']) && isset($_GET['id_project'])) {
            $id_user = $_GET['id_user'];
            $id_project = $_GET['id_project'];

            // Récupération de la clé correspondant au $login dans la base de données
            $this->model->activeParticipation($id_user,$id_project);
            $message = "participation_aprouved";
            header('location: ' . URL . 'users/confirmation/'.$message);
        }
        else{
            $message = "participation_unaprouved";
            header('location: ' . URL . 'users/confirmation/'.$message);
        }

    }



    public function getProject($project_id)
    {
        $this->checkLogin();
        if (isset($project_id)) {
            $this->model->getProject($project_id);
        }
    }

     public function addProject()
    {
        $this->checkLogin();
        // if we have POST data to create a new project entry
        if (isset($_POST["submit_add_project"])) {
            // do addSong() in model/model.php
            $description= $this->nl2br2( $_POST["DESCRIPTION"]);
            $this->model->addProject($_POST["NAME"],$_POST["P_ORDER"],$description,$_POST["CATEGORY"],$_POST["AUTHOR"]);
            // where to go after project has been added
            header('location: ' . URL . 'projects/index');
        }
        else{

            // load views
            require APP . 'view/_templates/header.php';
            require APP . 'view/projects/add.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    public function deleteProject($project_id)
    {
        $this->checkLogin();
        // if we have an id of a project that should be deleted
        if (isset($project_id)) {
            // do deleteSong() in model/model.php
            $this->model->deleteProject($project_id);
        }

        // where to go after song has been deleted
        header('location: ' . URL . 'projects/index');
    }

    public function editProject($project_id)
    {
        $this->checkLogin();
        // if we have an id of a song that should be edited
        if (isset($project_id)) {
            // do getSong() in model/model.php
            $project = $this->model->getProject($project_id);

            // load views. within the views we can echo out $song easily
            require APP . 'view/_templates/header.php';
            require APP . 'view/projects/edit.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    public function updateProject()
    {
        $this->checkLogin();
        // if we have POST data to create a new song entry
        if (isset($_POST["submit_update_project"])) {
            // do updateSong() from model/model.php
            $description= $this->nl2br2( $_POST["DESCRIPTION"]);
            $this->model->updateProject( $_POST["ID"], $_POST["NAME"],  $_POST["P_ORDER"],$description,$_POST["CATEGORY"],$_POST["AUTHOR"]);
            // redirect user to songs index page (as we don't have a project_id)
            header('location: ' . URL . 'projects/index');
        }
    }

    public function searchProject()
    {
        $this->checkLogin();

        //Prepare set vars for search
        $request = array();
        $variables = array();
        if (!empty($_POST["CATEGORY"]))
        {
            if( $_POST["CATEGORY"] !="")
            {
                $category = $_POST["CATEGORY"];
                $request[] = "CATEGORY LIKE :category";
                $variables[":category"] = $category;
            }
        }

        if (!empty($_POST["NAME"]))
        {
            $name = $_POST["NAME"];
            $request[] = "NAME LIKE :name";
            $variables[":name"] = $name;
        }

        if (!empty($_POST["DATE_CREATION1"]))  //DEBUT
        {
            $c_date_c1 = $_POST["CREATE_DATE"];
            $request[] = "CREATE_DATE >=:date_c_1";
            $variables[":date_c_1"] = date_sql($c_date_c1);
        }
        if (!empty($_POST["DATE_CREATION2"]))  //FIN
        {
            $c_date_c2 = $_POST["DATE_CREATION2"];
            $request[] = "CREATE_DATE <= :date_c_2";
            $variables[":date_c_2"] = date_sql($c_date_c2);
        }

        if (count($request) > 0)
        {
            $search = "WHERE " . implode(" AND ", $request) . " ";

            $projects = $this->model->searchProject($search,$variables);
            $amount_of_projects = $this->model->getAmountOfProjects();

            $comments = $this->model->getAllComments();
            $amount_of_comments = $this->model->getAmountOfComments();

            $participations = $this->model->getAllParticipations();

            // load views
            require APP . 'view/_templates/header.php';
            require APP . 'view/projects/index.php';
            require APP . 'view/_templates/footer.php';
        }

        // getting all songs and amount of songs
    }

     public function ajaxGetStats()
    {
        $amount_of_projects = $this->model->getAmountOfProjects();

        // simply echo out something. A supersimple API would be possible by echoing JSON here
        echo $amount_of_projects;
    }

    function date_sql($str)
    {
        $mm = substr($str, 0, 2);
        $dd = substr($str, 3, 2);
        $yy = substr($str, 6, 4);
        return ($yy.'-'.$mm.'-'.$dd);
    }


}

?>