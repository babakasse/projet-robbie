<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        $this->checkLogin();
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    function sendMessage()
    {
            // Check for empty fields
    if(empty($_POST['name'])  		||
        empty($_POST['email']) 		||
        empty($_POST['message'])	||
        !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
        echo "No arguments Provided!";
        return false;
    }

    $name = strip_tags(htmlspecialchars($_POST['name']));
    $email_address = strip_tags(htmlspecialchars($_POST['email']));
    $message = strip_tags(htmlspecialchars($_POST['message']));

    // Create the email and send the message
    $to = 'david.banquet@projet-robbie.fr'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
    $email_subject = "Website Contact Form:  $name";
    $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
    $headers = "From: noreply@projet-robbie.fr\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    $headers .= "Reply-To: $email_address";
    mail($to,$email_subject,$email_body,$headers);

        header('location: ' . URL . 'home/index');
    }
}
