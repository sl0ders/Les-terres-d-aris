<div class="mask rgba-gradient mt-5">
    <div class="container d-flex justify-content-center align-items-center">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-body">
                        <?php
                        if ($errors) : ?>
                            <div class="alert alert-danger">
                                Identifiants Incorrects
                            </div>
                        <?php endif; ?>
                        <h2 class="font-weight-bold my-4 text-center font-weight-bold">
                            <strong>Mot de passe perdu ?<br> Entrez votre adresse email</strong>
                        </h2>
                        <hr>
                        <form method="post">
                            <!--Card content-->
                            <div class="card-body px-lg-5 pt-0">
                                <!-- Form -->
                                <form class="text-center" method="post" style="color: #757575;">'
                                    <?= $form->input("email", "Entrez votre email : ", "envelope"); ?>
                                    <!-- Sign in button -->
                                    <button class="btn btn-outline-green btn-rounded btn-block my-4 waves-effect z-depth-0"
                                            type="submit">
                                        M'envoyer un lien de récupération
                                    </button>

                                    <!-- Register -->
                                    <p>Vous n'etes pas encore membre ?
                                        <a href=""> Inscrivez vous !</a>
                                    </p>
                                </form>
                                <!--Form -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>