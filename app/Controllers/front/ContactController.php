<?php


namespace App\Controllers\Front;


class ContactController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Contact');
    }

    public function index()
    {
        $contacts = $this->Contact->all();
        $this->render('Front.Users.contact', compact('contacts'));
    }


    public function add()
    {
        $errorMSG = "";
// NAME
        if (empty($_POST["name"])) {
            $errorMSG = "Veuillez entrer votre nom ";
        } else {
            $name = htmlspecialchars($_POST["name"]);
        }
// FIRSTNAME
        if (empty($_POST["firstname"])) {
            $errorMSG = "Veuillez entrer votre prénom ";
        } else {
            $firstname = htmlspecialchars($_POST["firstname"]);
        }
// EMAIL
        if (empty($_POST["email"])) {
            $errorMSG .= "Veuillez entrer votre adresse email ";
        } else {
            $email = htmlspecialchars($_POST["email"]);
        }
//SUBJECT
        if (empty($_POST["subject"])) {
            $errorMSG .= "Veuillez entrer votre adresse email ";
        } else {
            $subject = htmlspecialchars($_POST["subject"]);
        }
// MESSAGE
        if (empty($_POST["message"])) {
            $errorMSG .= "Veuillez entrer un message ";
        } else {
            $message = htmlspecialchars($_POST["message"]);
        }
// redirect to success page
        if ($errorMSG == "") {
            echo "success";
            $this->Contact->create([
                'user_name' => $name,
                'user_firstname' => $firstname,
                'user_email' => $email,
                'subject' => $subject,
                'message' =>$message
            ]);
        } else {
            if ($errorMSG == "") {
                echo "Quelque chose a mal tourné :(";
            } else {
                echo $errorMSG;
            }
        }
    }
}