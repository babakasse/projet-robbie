<?php

/**
 * Class Comments
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Comments extends Controller
{

    public function getComments()
    {
        // getting all comments and amount of songs
        $comments = $this->model->getAllComments();
        $amount_of_comments = $this->model->getAmountOfComments();

        /* load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/projects/index.php';
        require APP . 'view/_templates/footer.php'; */
    }

    public function getComment($comment_id)
    {
        if (isset($comment_id)) {
            $this->model->getComment($comment_id);
        }
    }

    public function addComment()
    {
        // if we have POST data to create a new comment entry
        if (isset($_POST["submit_add_comment"])) {
            $text= $this->nl2br2($_POST["TEXT"]);
            $this->model->addComment($text, $_POST["ID_USER"],$_POST["ID_PROJECT"]);
            // where to go after comment has been added
            header('location: ' . URL . 'projects/index');
        }
        else{

           echo(" submit_add_comment not clicked");
        }
    }

    function nl2br2($string)
    {
        $string = str_replace(array("\r\n", "\r", "\n"), "<br />", $string);
        return $string;
    }

        public function deleteComment($comment_id)
    {
        if (isset($comment_id)) {
            $this->model->deleteComment($comment_id);
        }

        // where to go after coment has been deleted
        header('location: ' . URL . 'projects/index');
    }

    public function editComment($comment_id)
    {
        if (isset($comment_id)) {
            $comment = $this->model->getComment($comment_id);

            /*
            require APP . 'view/_templates/header.php';
            require APP . 'view/projects/edit.php';
            require APP . 'view/_templates/footer.php'; */
        }
    }

    public function updateComment()
    {
        if (isset($_POST["submit_update_comment"])) {
            $this->model->updateComment($_POST["ID"], $_POST["TEXT"]);
            // redirect user to project index page (as we don't have a comment_id)
            header('location: ' . URL . 'projects/index');
        }
    }

    public function ajaxGetStats()
    {
        $amount_of_comments = $this->model->getAmountOfComments();

        // simply echo out something. A supersimple API would be possible by echoing JSON here
        echo $amount_of_comments;
    }
}

?>