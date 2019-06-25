<div class="container-fluid mt-5 pt-5">
    <div class="row" style="margin-top: -100px;">
        <div class="col-md-12">
            <div class="card pb-5">
                <div class="card-body">
                    <div class="container text-center">

                        <section class="section">
                            <h2 class="font-weight-bold text-center h1 my-5">Nous Contacter</h2>
                            <!--Section description-->
                            <div id="resultat"></div>
                            <p class="text-center grey-text mb-5 mx-auto w-responsive">Ce formulaire vous permet de nous contacter directement, Notre objectif est de vous servir au mieux et c'est pour cela que nous mettrons tout en oeuvre pour vous repondre au plus vite</p>
                            <div class="row pt-5">
                                <div class="col-md-8 col-xl-9">
                                    <form role="form" id="contactForm" data-toggle="validator" class="shake">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="md-form">
                                                    <input type="text" name="name" id="contact-name"
                                                           class="form-control" value="<?= $_SESSION['auth']['name'] ?>" required data-error="NEW ERROR MESSAGE">
                                                    <label for="contact-name" class="">Votre nom</label>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="md-form">
                                                    <input type="text" name="firstname" id="contact-firstname"
                                                           class="form-control" value="<?= $_SESSION['auth']['firstname'] ?>" required">
                                                    <label for="contact-firstname" class="">Votre Prenom</label>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="md-form">
                                                    <input type="text" name="email" id="contact-email"
                                                           class="form-control" value="<?= $_SESSION['auth']['email']?>" disabled>
                                                    <label for="contact-email" class="">Votre email</label>
                                                    <div class="help-block with-errors"></div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="md-form">
                                                    <input type="text" name="subject" id="contact-subject"
                                                           class="form-control" required>
                                                    <label for="contact-Subject" class="">Le sujet de votre message</label>
                                                    <div class="help-block with-errors"></div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="md-form">
                                                    <textarea type="text" name="message" id="contact-message"
                                                              class="md-textarea form-control" rows="3" required></textarea>
                                                    <label for="contact-message">Votre message</label>
                                                    <div class="help-block with-errors"></div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center text-md-left my-4">
                                            <button type="submit" id="form-submit" class="btn dusty-grass-gradient">Envoyer
                                            </button>
                                        </div>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                                <div class="col-md-4 col-xl-3">
                                    <ul class="contact-icons text-center list-unstyled">
                                        <li>
                                            <i class="fas fa-map-marker fa-2x green-text"></i>
                                            <p>canohes</p>
                                        </li>

                                        <li>
                                            <i class="fas fa-envelope fa-2x green-text"></i>
                                            <p>lesterresdaris@gmail.com</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div id="map-container-demo-section">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2934.369079723984!2d2.8056116644049394!3d42.65353357951484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b072ed246fab63%3A0xf630b4ef65253ac3!2sMas+de+Vezians%2C+Canoh%C3%A8s%2C+France!5e0!3m2!1sfr!2sus!4v1561338070684!5m2!1sfr!2sus" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
