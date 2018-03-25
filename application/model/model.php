<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

///////////////////// USER MODEL //////////////////////////////////////////////////////////

    //Ajout d'un utlisateur
     public function addUser($username,$firstname,$lastname, $pass_hache, $email,$category)
    {
        // Insertion
        $sql = "INSERT INTO users (USERNAME, FIRSTNAME, LASTNAME, PASSWORD, EMAIL, SPECIALITY, CREATE_DATE) VALUES (:username, :firstname, :lastname, :password, :email, :category, CURDATE())";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username,':firstname' => $firstname,':lastname' => $lastname, ':password' => $pass_hache, ':email' => $email, ':category' => $category);

        $query->execute($parameters);
    }

    public function getAllUsers()
    {
        $sql = "SELECT ID, FIRSTNAME, LASTNAME, SPECIALITY, EMAIL, USERNAME, CREATE_DATE, PASSWORD FROM users";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


    public function deleteUser($user_id)
    {
        $sql = "DELETE FROM users WHERE ID = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);

        $query->execute($parameters);
    }

    public function getUser($user_id)
    {
        $sql = "SELECT ID, FIRSTNAME, LASTNAME, SPECIALITY, EMAIL, CREATE_DATE, USERNAME, PASSWORD FROM users WHERE ID = :user_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);

        $query->execute($parameters);

        return $query->fetch();
    }
    public function updateUser($user_id, $firstname, $lastname, $speciality, $email,$password)
    {
        if($password != "" && $password =! " ")
        {
            $sql = "UPDATE users SET FIRSTNAME = :firstname, LASTNAME = :lastname, SPECIALITY = :speciality , EMAIL = :email, PASSWORD = :password WHERE ID = :user_id";
            $query = $this->db->prepare($sql);
            $parameters = array(':user_id' => $user_id,':firstname' => $firstname, ':lastname' => $lastname, ':speciality' => $speciality, ':email' =>$email, ':password' =>$password);

        }
        else
        {
            $sql = "UPDATE users SET FIRSTNAME = :firstname, LASTNAME = :lastname, SPECIALITY = :speciality , EMAIL = :email WHERE ID = :user_id";
            $query = $this->db->prepare($sql);
            $parameters = array(':user_id' => $user_id,':firstname' => $firstname, ':lastname' => $lastname, ':speciality' => $speciality, ':email' =>$email);

        }

        $query->execute($parameters);
    }

    public function getAmountOfUsers()
    {
        $sql = "SELECT COUNT(ID) AS amount_of_users FROM users";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_users;
    }

     //Checher un utlisateur 
     public function searchUser($username, $pass_hache)
    {

        $sql = "SELECT ID, FIRSTNAME, LASTNAME, USERNAME, STATE FROM users WHERE USERNAME = :username AND PASSWORD = :pass_hache";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username, ':pass_hache'=>$pass_hache);
        $query->execute($parameters);

        return $query->fetch();
    }

    //Insert une cle dans la BD pour futur verification
    public function insertCle($cle,$username){
        $sql = "UPDATE users SET CLE =:cle WHERE USERNAME LIKE :username";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username,':cle' => $cle);
        $query->execute($parameters);
    }

    public function getCle($username)
    {
        //Recupération de la cle pour verifier l'adresse mail de l'utilisateur
        $sql = "SELECT ID, STATE, CLE FROM users WHERE USERNAME = :username";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username);
        $query->execute($parameters);

        return $query->fetch();
    }

    //Insert une cle dans la BD pour futur verification
    public function enableUser($username){
        $state = "ENABLED";
        $sql = "UPDATE users SET STATE =:state WHERE USERNAME LIKE :username";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username,':state' => $state);
        $query->execute($parameters);
    }




///////////////////// PROJECTS MODEL //////////////////////////////////////////////////////////

    /**
     * Get all projects from database
     */
    public function getAllProjects()
    {
        $sql = "SELECT ID, NAME, P_ORDER, DESCRIPTION, CREATE_DATE, CATEGORY, AUTHOR FROM projects ORDER BY P_ORDER";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
    public function addProject($name, $p_order, $description, $category, $author)
    {
        $p_order=intval($p_order);
        $sql = "INSERT INTO projects (NAME, P_ORDER, DESCRIPTION, CATEGORY, AUTHOR, CREATE_DATE) VALUES (:name, :p_order, :description,:category, :author, CURDATE() )";
        $query = $this->db->prepare($sql);
        $parameters = array(':name'=>$name, ':p_order' =>$p_order, ':description'=>$description,':category'=>$category, ':author'=>$author );

        $query->execute($parameters);
    }

    /**
     * @param int $project_id Id of project
     */
    public function deleteProject($project_id)
    {
        $sql = "DELETE FROM projects WHERE ID = :project_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id);

        $query->execute($parameters);
    }

    public function getProject($project_id)
    {
        $sql = "SELECT ID, NAME,P_ORDER, DESCRIPTION, CREATE_DATE, CATEGORY, AUTHOR FROM projects WHERE ID = :project_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id);

        $query->execute($parameters);

        return $query->fetch();
    }

    public function updateProject($project_id, $name, $p_order, $description, $category, $author)
    {
        $sql = "UPDATE projects SET NAME = :name, P_ORDER = :p_order, DESCRIPTION = :description, CATEGORY = :category, AUTHOR = :author WHERE ID = :project_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name,':p_order' =>$p_order, ':description' => $description, ':category' => $category, ':author' =>$author, ':project_id' => $project_id);

        $query->execute($parameters);
    }

    public function getAmountOfProjects()
    {
        $sql = "SELECT COUNT(ID) AS amount_of_projects FROM projects";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_projects;
    }

    public function searchProject($search, $variables){
        //Query
        $sql = 'SELECT * FROM projects '.$search;
        $query = $this->db->prepare($sql);
        $query->execute($variables);
        return $query->fetchAll();
    }

    ///////////////////// COMMENTS MODEL //////////////////////////////////////////////////////////

    public function getAllComments()
    {
        $sql = "SELECT ID, TEXT, ID_USER, ID_PROJECT, CREATE_DATE FROM projects_comments";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function addComment($text, $id_user, $id_project)
    {
        $sql = "INSERT INTO projects_comments (TEXT, ID_USER, ID_PROJECT, CREATE_DATE) VALUES (:text, :id_user, :id_project, CURDATE() )";
        $query = $this->db->prepare($sql);
        $parameters = array(':text'=>$text, ':id_user'=>$id_user,':id_project'=>$id_project);

        $query->execute($parameters);
    }

    public function deleteComment($comment_id)
    {
        $sql = "DELETE FROM projects_comments WHERE ID = :comment_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':comment_id' => $comment_id);

        $query->execute($parameters);
    }

    public function getComment($comment_id)
    {
        $sql = "SELECT ID, TEXT, ID_USER, ID_PROJECT, CREATE_DATE FROM projects_comments WHERE ID = :comment_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':comment_id' => $comment_id);

        $query->execute($parameters);

        return $query->fetch();
    }

    public function getProjectComments($id_project)
    {
        $sql = "SELECT pc.TEXT, pc.CREATE_DATE, u.FIRSTNAME, u.LASTNAME
                FROM projects_comments pc, users u 
                WHERE pc.ID_PROJECT = :id_project AND pc.ID_USER = u.ID";
        $query = $this->db->prepare($sql);

        $parameters = array(':id_project' => $id_project);
        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function getAmountOfProjectsComments($id_project)
    {
        $sql = "SELECT COUNT(pc.ID) AS amount_of_project_comments 
                FROM projects_comments pc
                WHERE pc.ID_PROJECT = :id_project";
        $query = $this->db->prepare($sql);

        $parameters = array(':id_project' => $id_project);
        $query->execute($parameters);

        return $query->fetch()->amount_of_project_comments;
    }

    public function updateComments($comment_id, $text)
    {
        $sql = "UPDATE projects_comments SET TEXT = :text WHERE ID = :comment_id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':comment_id' => $comment_id, ':text' => $text);

        $query->execute($parameters);
    }

    public function getAmountOfComments()
    {
        $sql = "SELECT COUNT(ID) AS amount_of_comments FROM projects_comments";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_comments;
    }

    //GESTION DES PARTICIPATION
    public function addParticipation($id_user, $id_project)
    {
        $sql = "INSERT INTO participations (ID_USER, ID_PROJECT,CREATE_DATE) VALUES (:id_user, :id_project, CURDATE() )";
        $query = $this->db->prepare($sql);
        $parameters = array(':id_user'=>$id_user,':id_project'=>$id_project);

        $query->execute($parameters);
    }

    public function activeParticipation($id_user, $id_project)
    {
        $state="ENABLED";
        $sql = "UPDATE participations SET STATE = :state WHERE ID_USER = :id_user AND ID_PROJECT = :id_project ";
        $query = $this->db->prepare($sql);
        $parameters = array(':id_user' => $id_user, ':id_project' => $id_project,':state' =>$state);

        $query->execute($parameters);
    }
    public function getAllParticipations()
    {
        $sql = "SELECT ID, ID_USER, ID_PROJECT, CREATE_DATE FROM participations";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function checkParticipation($id_user,$id_project)
    {
        $sql = "SELECT STATE FROM participations WHERE ID_USER = :id_user AND ID_PROJECT = :id_project";
        $query = $this->db->prepare($sql);
        $parameters = array(':id_project' => $id_project, ':id_user' =>$id_user);
        $query->execute($parameters);
        $state=$query->fetch();
        if($state)
            return $state->STATE;
         else
             return "undefined";
    }

    //FIN GESTION DES PARTICIPATION






}
