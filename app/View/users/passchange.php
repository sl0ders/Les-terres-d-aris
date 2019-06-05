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
                            <strong>Se connecter</strong>
                        </h2>
                        <hr>
                        <form method="post">
                            <!--Card content-->
                            <div class="card-body px-lg-5 pt-0">
                                <!-- Form -->
                                <form class="text-center" method="post" style="color: #757575;">
                                    <div class="md-form">
                                        <i class="fas fa-envelope prefix"></i>
                                        <input type="text" name="email" value="<?= $_GET['email'] ?>"
                                               id="orangeForm-email" class="form-control">
                                        <label for="orangeForm-email">email</label>
                                    </div>
                                    <?= $form->password("pass", "Entrer un mot de passe", "lock") ?>
                                    <?= $form->password('repass', 'Entrer a nouveau le mot de passe', 'lock'); ?>
                                    <!-- Sign in button -->
                                    <button class="btn btn-outline-green btn-rounded btn-block my-4 waves-effect z-depth-0"
                                            type="submit">
                                        Reinitialiser
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
