
<div class="container-fluid mb-5">
    <div class="row" style="margin-top: -100px;">
        <div class="col-md-12">
            <div class="card pb-5">
                <div class="card-body">
                    <div class="container text-center">

                        <section class="section">
                            <h2 class="font-weight-bold text-center h1 my-5">Contact us</h2>
                            <!--Section description-->
                            <div id="resultat"></div>
                            <p class="text-center grey-text mb-5 mx-auto w-responsive">Lorem ipsum dolor sit amet,
                                consectetur
                                adipisicing elit. Fugit, error amet numquam iure provident voluptate
                                esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus
                                veniam.</p>
                            <div class="row pt-5">
                                <div class="col-md-8 col-xl-9">
                                    <form method="post" action="index.php?p=contact.add" id="form-add">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="md-form">
                                                    <input type="text" name="contact-name" id="contact-name"
                                                           class="form-control">
                                                    <label for="contact-name" class="">Your name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="md-form">
                                                    <input type="text" name="contact-email" id="contact-email"
                                                           class="form-control">
                                                    <label for="contact-email" class="">Your email</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="md-form">
                                                    <input type="text" name="contact-subject" id="contact-Subject"
                                                           class="form-control">
                                                    <label for="contact-Subject" class="">Subject</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="md-form">
                                                    <textarea type="text" name="contact-message" id="contact-message"
                                                              class="md-textarea form-control" rows="3"></textarea>
                                                    <label for="contact-message">Your message</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center text-md-left my-4">
                                            <button type="submit" id="submits" class="btn peach-gradient">Envoyer</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4 col-xl-3">
                                    <ul class="contact-icons text-center list-unstyled">
                                        <li>
                                            <i class="fas fa-map-marker fa-2x orange-text"></i>
                                            <p>San Francisco, CA 94126, USA</p>
                                        </li>

                                        <li>
                                            <i class="fas fa-phone fa-2x orange-text"></i>
                                            <p>+ 01 234 567 89</p>
                                        </li>

                                        <li>
                                            <i class="fas fa-envelope fa-2x orange-text"></i>
                                            <p>contact@mdbootstrap.com</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?foreach ($contacts as $contact) :?>
    <?= $contact->user_name ?>
    <?= $contact->user_email?>
    <?= $contact->subject ?>
    <?= $contact->message ?>
    <?php endforeach; ?>
</div>
