<div class="mask rgba-gradient">
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="card mt-5">
            <div class="card-body" style="width: 75vw">
                <h2 class="font-weight-bold my-4 text-center font-weight-bold">
                    <strong>Modification de vos informations</strong>
                </h2>
                <hr>
                <form method="post" id="loginForm">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row pb-4 d-flex justify-content-center mb-4">
                                <h4 class="mt-3 ml-4">
                                    <strong>Editez votre profil</strong>
                                </h4>
                            </div>
                            <!--Body-->
                            <?= $form->input('name', $_SESSION['name'], 'user'); ?>
                            <?= $form->input('firstname', $_SESSION['firstname'], 'user'); ?>
                            <?= $form->input('username', $_SESSION['username'], 'user'); ?>
                            <?= $form->input('email', $_SESSION['email'], 'envelope'); ?>
                            <?= $form->password('pass', 'Entrer un mot de passe', 'lock'); ?>
                            <?= $form->password('repass', 'Entrer a nouveau le mot de passe', 'lock'); ?>
                        </div>
                        <div class="col-md-7 text-center">
                            <h2 class="mb-5 pt-5">Choisissez votre avatar</h2>
                            <?php foreach($avatars as $avatar) : ?>
                                <!-- Group of material radios - option <?= $avatars->id ?> -->
                                <input type="radio" class="mb-5 form-check-input" id="avatar<?= $avatar->id ?>" value="img/<?= $avatar->name ?>" name="imgProfil">
                                <label class="form-check-label" for="avatar<?= $avatar->id ?>">
                                    <img src="img/<?= $avatar->name ?>" class="mb-5" width="132"  height="142" alt="<?= $avatar->name ?>">
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