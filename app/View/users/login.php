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
                                    <?= $form->input("email", "Entrez votre email : ", "envelope");?>
                                    <?= $form->password("pass", "Entrez un mot de passe", "lock") ?>
                                    <div class="d-flex justify-content-around">
                                        <div>
                                            <!-- Remember me -->
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input"
                                                       id="materialLoginFormRemember">
                                                <label class="form-check-label" for="materialLoginFormRemember">Se
                                                    souvenir de moi</label>
                                            </div>
                                        </div>
                                        <div class="text-danger">
                                            <!-- Forgot password -->
                                            <a href="index.php?p=users.retrieveMdp">Mot de passe perdu ?</a>
                                        </div>
                                    </div>

                                    <!-- Sign in button -->
                                    <button class="btn btn-outline-green btn-rounded btn-block my-4 waves-effect z-depth-0"
                                            type="submit">
                                        Se connecter
                                    </button>

                                    <!-- Register -->
                                    <p>Vous n'etes pas encore membre ?
                                        <a href=""> Inscrivez vous !</a>
                                    </p>

                                    <!--Social login-->
                                    <p> Ou se connecter via : </p>
                                    <a type="button" class="btn-floating btn-fb btn-sm">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a type="button" class="btn-floating btn-tw btn-sm">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a type="button" class="btn-floating btn-li btn-sm">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a type="button" class="btn-floating btn-git btn-sm">
                                        <i class="fab fa-github"></i>
                                    </a>
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

