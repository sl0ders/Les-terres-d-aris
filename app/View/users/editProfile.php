<div class="mask rgba-gradient">
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="card mt-5">
            <div class="card-body" style="width: 75vw">
                <h2 class="font-weight-bold my-4 text-center font-weight-bold">
                    <strong>Modification de vos informations</strong>
                </h2>
                <hr>
                <form method="post" id="<?= $avatar->id ?>">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row pb-4 d-flex justify-content-center mb-4">
                                <h4 class="mt-3 ml-4">
                                    <strong>Editez votre profil</strong>
                                </h4>
                            </div>
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
                                <input type="text" name="username" value="<?= $_SESSION['auth']['username'] ?>" id="orangeForm-email" class="form-control">
                                <label for="orangeForm-email">Entrer votre pseudo : </label>
                            </div>
                        </div>
                        <div class="col-md-7 text-center">
                            <h2 class="mb-5 pt-5">Choisissez votre avatar</h2>
                            <?php foreach ($avatars as $avatar) : ?>
                                <!-- Group of material radios - option <?= $avatars->id ?> -->
                                <input type="radio" class="mb-5 form-check-input" id="avatar-<?= $avatar->id ?>"
                                       value="img/<?= $avatar->name ?>" name="imgProfil">
                                <label class="form-check-label" for="avatar-<?= $avatar->id ?>"
                                       style="margin-bottom: 150px">
                                    <img src="img/<?= $avatar->name ?>" class="mb-5" width="102" height="112"
                                         alt="<?= $avatar->name ?>">
                                </label>
                            <?php endforeach; ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>