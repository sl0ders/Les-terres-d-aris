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


    public
    function add()
    {
        if ($_POST) {
            if (empty($_POST['contact-name']) || empty($_POST['contact-email']) || empty($_POST['contact-subject']) || empty($_POST['contact-message'])) {
                if (!isset($_POST['contact-name']) || !isset($_POST['contact-email']) || !isset($_POST['contact-subject']) || !isset($_POST['contact-message'])) {
                    header('500 Internal Server Error', true, 500);
                    die('vous devez remplire tout les encarts');
                }
            } else {
                $result = $this->Contact->create([
                    'user_name' => $_POST['contact-name'],
                    'user_email' => $_POST['contact-email'],
                    'subject' => $_POST['contact-subject'],
                    'message' => $_POST['contact-message']
                ]);
                if ($result) {
                    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') { ?>
                        <div class="modal fade" id="modalCart" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" style="z-index: 300;" role="document">
                                <div class="modal-content">
                                    <!--Header-->
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">succé!</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <!--Body-->
                                    <div class="modal-body">
                                        le message a bien etait envoyer
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    } else {
                        header('Location:index.php');
                    }
                }
                $contacts = $this->Contact->all();
                $this->render('Front.Users.contact', compact('contacts'));
            }
        }
    }
}