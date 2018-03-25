<?php

/**
 * Class Users
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Users extends Controller
{
    public function index()
    {
        $this->checkLogin();
        // getting all songs and amount of songs
        $users = $this->model->getAllUsers();
        $amount_of_users = $this->model->getAmountOfUsers();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/users/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function getUser($user_id)
    {
        $this->checkLogin();

        if (isset($user_id)) {
            $this->model->getUser($user_id);
        }
    }

    public function deleteUser($user_id)
    {
        $this->checkLogin();
        // if we have an id of a project that should be deleted
        if (isset($user_id)) {
            // do deleteSong() in model/model.php
            $this->model->deleteUser($user_id);
        }

        // where to go after song has been deleted
        header('location: ' . URL . 'users/index');
    }

    public function editUser($user_id)
    {
        $this->checkLogin();
        // if we have an id of a song that should be edited
        if (isset($user_id)) {
            $user = $this->model->getUser($user_id);

            // load views. within the views we can echo out $song easily
            require APP . 'view/_templates/header.php';
            require APP . 'view/users/edit.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    public function updateUser()
    {
        $this->checkLogin();
        // if we have POST data to create a new song entry
        if (isset($_POST["submit_update_user"])) {
            if(isset($_POST['SPECIALITY']))
            {
                if($_POST['SPECIALITY'] != "" && $_POST['SPECIALITY'] != "other")
                {
                    $speciality=$_POST['SPECIALITY'];
                }
                elseif (isset($_POST['other']))
                {
                    $speciality=$_POST['other'];
                }
            }
            $pass_hache = sha1($_POST['PASSWORD2']);
            $this->model->updateUser( $_POST["ID"], $_POST["FIRSTNAME"], $_POST["LASTNAME"],$speciality,$_POST["EMAIL"],$pass_hache);
            // redirect user to songs index page (as we don't have a project_id)
            header('location: ' . URL . 'home/index');
        }
    }

    public function send_email_confirmation($email,$username){

        // Génération aléatoire d'une clé
                $cle = md5(microtime(TRUE)*100000);

             //Insertion de la cle dans la BD
            $this->model->insertCle($cle,$username);

        // Préparation du mail contenant le lien d'activation
                $destinataire = $email;
                $sujet = "Activer votre compte" ;
                $entete = "From: inscription@projet-robbie.fr" ;

        // Le lien d'activation est composé du login(log) et de la clé(cle)
                $message = 'Bienvenue sur Robbie,
         
        Pour activer votre compte, veuillez cliquer sur le lien ci dessous
        ou copier/coller dans votre navigateur internet.
         
        http://projet-robbie.fr/users/activation?username='.urlencode($username).'&cle='.urlencode($cle).'
         
         
        ---------------
        Ceci est un mail automatique, Merci de ne pas y répondre.';



            mail($destinataire, $sujet, $message, $entete); // Envoi du mail)
            $message2="account_created";
            header('location: ' . URL . 'users/confirmation/'.$message2);

    }

    public function activation()
    {

    // Récupération des variables nécessaires à l'activation
        if(isset($_GET['cle']) && isset($_GET['username']))
        {
        $cle = $_GET['cle'];
        $username = $_GET['username'];

    // Récupération de la clé correspondant au $login dans la base de données
        $result = $this->model->getCle($username);

        if(isset($result->CLE))
        {
            $clebdd = $result->CLE;	// Récupération de la clé
            $statebdd = $result->STATE; // $actif contiendra alors 0 ou 1
        }

        // On teste la valeur de la variable $actif récupéré dans la BDD
            if($statebdd == 'ENABLE') // Si le compte est déjà actif on prévient
            {
                $message = "account_already_active";
                // where to go after project has been added
                header('location: ' . URL . 'users/confirmation/'.$message);

            }
            else // Si ce n'est pas le cas on passe aux comparaisons
            {
                if($cle == $clebdd) // On compare nos deux clés
                {

                    // La requête qui va passer notre champ actif de 0 à 1
                     $this->model->enableUser($username);

                    // Si elles correspondent on active le compte !
                    $message = "email_confirmed";
                    // where to go after project has been added
                    header('location: ' . URL . 'users/confirmation/'.$message);
                }
                else // Si les deux clés sont différentes on provoque une erreur...
                {
                    // Si elles correspondent on active le compte !
                    $message = "email_unconfirmed";
                    // where to go after project has been added
                    header('location: ' . URL . 'users/confirmation/'.$message);

                }
            }
        }
        else{
            header('location: ' . URL . 'users/register');
        }

    }


    public function register()
    {

        if(isset($_POST["USERNAME"]))
        {
            $username = $_POST['USERNAME'];
            $firstname = $_POST['FIRSTNAME'];
            $lastname = $_POST['LASTNAME'];
            $pass_hache = sha1($_POST['PASSWORD']);
            $email = $_POST['EMAIL'];
            if(isset($_POST['CATEGORY']))
            {
                if($_POST['CATEGORY'] != "" && $_POST['CATEGORY'] != "other")
                {
                    $category=$_POST['CATEGORY'];
                }
                elseif (isset($_POST['other']))
                {
                    $category=$_POST['other'];
                }
            }
            //Insertion
             $this->model->addUser($username,$firstname,$lastname, $pass_hache, $email,$category);

             //envoie du mail de confirmation
             $this->send_email_confirmation($email,$username);

            // where to go after project has been added
           // header('location: ' . URL . 'users/login');
        }
        else{
        // load views.
            require APP . 'view/users/register.php';
        }
    }

    public function login()
    {
            // if we have POST data to create a new song entry
        if (isset($_POST["USERNAME"])) 
        {
            // Hachage du mot de passe
            $pass_hache = sha1($_POST['PASSWORD']);
            $username = $_POST['USERNAME'];
            echo "<script> alert('variable recupérés ! ')</script>";
            //Recherche
            $result = $this->model->searchUser($username,$pass_hache);

            if (isset($result->ID) && ($result->STATE=="ENABLED"))
            {
                session_start();
                $_SESSION['userId'] = $result->ID;
                $_SESSION['username'] = $result->USERNAME;
                $_SESSION['firstname'] = $result->FIRSTNAME;
                $_SESSION['lastname'] = $result->LASTNAME;
                $_SESSION['email'] = $result->EMAIL;

                $_SESSION["logged"] = true;

                header('location: ' . URL . 'home/index');
            }
            else
            {
                // load views. within the views we can echo out $songs and $amount_of_songs easily
                $message = "login_error";
                // where to go after project has been added
                header('location: ' . URL . 'users/confirmation/'.$message);
            }
        }
        else{
            
            // load views. within the views we can echo out $songs and $amount_of_songs easily
            require APP . 'view/users/login.php';
        }

    }

    public function confirmation($message)
    {
        require APP . 'view/users/confirmation.php';
    }

    public function logout($song_id)
    {
        session_start();
        // Suppression des variables de session et de la session

        $_SESSION = array();
        session_destroy();
        // Suppression des cookies de connexion automatique
        setcookie('login', '');
        setcookie('pass_hache', '');
        header('location: ' . URL . 'users/login');
    }

}
