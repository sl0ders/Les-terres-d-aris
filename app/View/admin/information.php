<main class="d-flex align-content-center" style="height: 600px;">
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <h2>Mes information</h2>
                <br>
                <br>
                <ul>
                    <li><a>Identitée</a></li>
                    <li><a>Adresse</a></li>
                    <li><a>moyen de payment</a></li>
                </ul>
            </div>
            <div class="col-md-8">
                <h2>Identitée</h2>
                <ul>
                    <li>Nom : <?= $_SESSION['name'] ?></li>
                    <li>Prenom : <?= $_SESSION['firstname'] ?></li>
                    <li>Pseudo : <?= $_SESSION['username'] ?></li>
                    <li>Email : <?= $_SESSION['email'] ?></li>
                    <li>Mot de pass : ******</li>
                    <li><a href="index.php?p=admin.profil.editProfil">Modifier mon identitée</a></li>
                </ul>
            </div>
        </div>
    </div>
</main>
