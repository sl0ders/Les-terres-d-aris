<!--Main Layout-->
<main>
    <div class="container">
        <div class="col-md-12">
            <div class="tab-content">
                <div class="tab-pane fade  show active" id="panel11" role="tabpanel">
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <section class="text-center mb-5">
                                <div class="row ">

                                    <?php if ($_SESSION['auth']['actif'] == 1): ?>
                                        <div class="col-md-6">
                                            <div class="card card-image"
                                                 style="background-image: url('/img/historique-jpg1.jpg');">
                                                <div class="text-white text-center d-flex align-items-center rgba-blue-strong py-5 px-4">
                                                    <div>
                                                        <h3 class="mb-4 mt-4 font-weight-bold">
                                                            <strong>Historique des commandes</strong>
                                                        </h3>
                                                        <p>Retrouvez ici l'historique complet de toutes vos commandes et
                                                            editez vos factures</p>
                                                        <a href="index.php?p=order.index">
                                                            <button class="btn btn-outline-white btn-sm">
                                                                <i class="fas fa-clone left"></i> Entrer
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif ?>

                                    <?php if ($_SESSION['auth']['actif'] == 1) {
                                        echo '<div class="col-md-6 mb-4">';
                                    } else {
                                        echo '<div class="col-md-12 mb-4">';
                                    } ?>
                                    <div class="card card-image"
                                         style="background-image: url('/img/params.jpg');">
                                        <!-- Content -->
                                        <div class="text-white text-center d-flex align-items-center rgba-green-strong py-5 px-4">
                                            <div>
                                                <h3 class="mb-4 mt-4 font-weight-bold">
                                                    <strong>Mes informations</strong>
                                                </h3>
                                                <p>Editez vos information, (mot de passe, nom d'utilisateur,
                                                    mode de
                                                    payment...)</p>
                                                <a href="index.php?p=profil.show&id=<?= $_SESSION['auth']['id'] ?>"
                                                   class="btn btn-outline-white btn-sm">
                                                    <i class="fas fa-clone left"></i> Entrer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>

