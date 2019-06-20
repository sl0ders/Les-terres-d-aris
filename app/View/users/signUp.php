<div class="mask rgba-gradient">
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="card mt-5">
            <div class="card-body" style="width: 75vw">
                <h2 class="font-weight-bold my-4 text-center font-weight-bold">
                    <strong>S'inscrire</strong>
                </h2>
                <hr>
                <form method="post" id="loginForm">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row pb-4 d-flex justify-content-center mb-4">
                                <h4 class="mt-3 mr-4">
                                    <strong>Vos informations personnelles</strong>
                                </h4>
                            </div>
                            <!--Body-->
                            <!-- First name -->
                            <div class="md-form">
                                <i class="fas fa-user prefix"></i>
                                <input type="text" name="name" value="<?= $_SESSION['auth']['name'] ?>" id="orangeForm-name" class="form-control">
                                <label for="orangeForm-name">Entrez votre nom</label>
                            </div>
                            <!-- Last name -->
                            <div class="md-form">
                                <i class="fas fa-user prefix"></i>
                                <input type="text" name="firstname" value="<?= $_SESSION['auth']['firstname'] ?>" id="orangeForm-name" class="form-control">
                                <label for="orangeForm-name">Entrez votre prenom</label>
                            </div>
                            <div class="md-form">
                                <i class="fas fa-envelope prefix"></i>
                                <input type="text" name="email" value="<?= $_SESSION['auth']['email'] ?>" id="orangeForm-email" class="form-control">
                                <label for="orangeForm-email">Entrez votre adresse email</label>
                            </div>
                            <div class="md-form">
                                <i class="fas fa-user prefix"></i>
                                <input type="text" name="username" value="<?= $_SESSION['auth']['email'] ?>" id="orangeForm-email" class="form-control">
                                <label for="orangeForm-email">Entrer votre pseudo : </label>
                            </div>
                            <div class="md-form">
                                <i class="fas fa-lock prefix"></i>
                                <input type="password" name="pass" id="orangeForm-pass" class="form-control">
                                <label for="orangeForm-pass">Entrez votre mot de passe</label>
                            </div>
                            <div class="md-form">
                                <i class="fas fa-lock prefix"></i>
                                <input type="password" name="repass" id="orangeForm-pass" class="form-control">
                                <label for="orangeForm-pass">Entrer a nouveau le mot de passe</label>
                            </div>
                        </div>
                        <div class="col-md-7 text-center">
                            <h2 class="mb-5 pt-5">Choisissez votre avatar</h2>
                            <?php foreach ($avatars as $avatar) : ?>
                                <!-- Group of material radios - option <?= $avatars->id ?> -->
                                <input type="radio" class="mb-5 form-check-input" id="avatar<?= $avatar->id ?>"
                                       value="img/<?= $avatar->name ?>" name="imgProfil">
                                <label class="form-check-label" for="avatar<?= $avatar->id ?>"
                                       style="margin-bottom: 150px">
                                    <img src="img/<?= $avatar->name ?>" class="mb-5" width="102" height="112"
                                         alt="<?= $avatar->name ?>">
                                </label>
                            <?php endforeach; ?>
                        </div>
                        <button type="submit" class="btn btn-primary align-content-center">S'inscrire</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

