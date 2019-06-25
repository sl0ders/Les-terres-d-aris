<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Projet-5</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="scss/sass/style.scss">
</head>
<body>
<header class="navig" id="nav1">
    <nav class="navbar navbar-expand-lg navbar-dark rgba-white-strong scrolling-navbar">
        <div class="container-fluid">
            <button class="navbar-toggler rgba-green-strong" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent-7"
                    aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-sm-1" id="navbarSupportedContent-7">
                <ul class="navbar-nav align-items-center d-flex justify-content-between col-md-12 align-middle">
                    <li class="nav-item ">
                        <a class="navbar-brand" href="index.php">
                            <img src="img/logo.png" width="120" height="70" alt="logo" class="logo">
                        </a>
                    </li>
                    <?php if (isset($_SESSION['auth'])){ ?>
                    <li class="nav-item">
                        <?php } else { ?>
                    <li class="nav-item ml-5 pl-5">
                        <?php } ?>
                        <p class="speach text-center">Les terres d'Aris <br> Mangez <span> BON </span> mangez
                            <span> BIO</span> !!
                        </p>
                    </li>
                    <li class="nav-item row caddie mt-1">
                        <?php if ($_SESSION['auth']['role'] == 0 && $_SESSION['auth']['actif'] == 1): ?>
                            <a class="nav-link" href="index.php?p=cart.index">
                                <img src="img/caddie.gif" class="animated bounceIn" width="70" alt="cart"
                                     id="animated-img1"><span><?= array_sum($_SESSION['cart']); ?></span>
                            </a>
                        <?php endif ?>
                        <?php if (!isset($_SESSION['auth'])) : ?>
                            <a class="nav-link mt-4" href="index.php?p=users.add">S'inscrire</a>
                            <a class="nav-link mt-4" href="index.php?p=users.login">Se connecter</a>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['auth'])) : ?>
                            <div class="avatar dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <img src="<?= $_SESSION['auth']['imgProfile'] ?>" class="rounded-circle z-depth-0"
                                         width="70" height="70" alt="avatar image">
                                    <?php if ($_SESSION['auth']['role'] == 1) : ?>
                                        <img src="img/overlays/star.png" alt="etoile admin" width="30" ">
                                    <?php endif ?>
                                </a>
                                <?php if ($_SESSION['auth']['role'] == 1) : ?>
                                    <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
                                         aria-labelledby="navbarDropdownMenuLink-55">
                                        <a class="dropdown-item" href="index.php?p=Admin.Users.index">Gestion des
                                            utilisateurs</a>
                                        <a class="dropdown-item" href="index.php?p=Admin.Stocks.index">Gestion des
                                            stocks</a>
                                        <a class="dropdown-item" href="index.php?p=Admin.Products.index">Gestion des
                                            produits</a>
                                        <a class="dropdown-item" href="index.php?p=Admin.orders.index">Gestion des
                                            commandes</a>
                                        <a class="dropdown-item" href="index.php?p=Admin.contact.index">Gestion des
                                            contacts</a>
                                        <a class="dropdown-item" href="index.php?p=users.disconnect">Se déconnecter</a>
                                    </div>
                                <?php endif ?>
                                <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
                                     aria-labelledby="navbarDropdownMenuLink-55">
                                    <a class="dropdown-item" href="index.php?p=profil.index">Mon compte</a>
                                    <a class="dropdown-item" href="index.php?p=users.disconnect">Se déconnecter</a>
                                </div>
                            </div>
                        <?php endif ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<header class="navig" id="nav2">
    <nav class="navbar navbar-expand-lg navbar-dark rgba-white-strong fixed-top scrolling-navbar">
        <div class="container-fluid">
            <button class="navbar-toggler rgba-green-strong" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent-7"
                    aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-sm-1" id="navbarSupportedContent-7">
                <ul class="navbar-nav d-md-flex justify-content-between w-100">
                    <li class="nav-item">
                        <a class="navbar-brand" href="index.php">
                            <img src="img/logo.png" width="90" height="50" alt="logo" class="logo">
                        </a>
                    </li>
                    <li class="nav-item row caddie2">
                        <?php if (!isset($_SESSION['auth'])) : ?>
                            <a class="nav-link mt-4" href="index.php?p=users.add">S'inscrire</a>
                            <a class="nav-link mt-4" href="index.php?p=users.login">Se connecter</a>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['auth'])) : ?>
                            <div class="avatar dropdown mt-2">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <img src="<?= $_SESSION['auth']['imgProfile'] ?>" class="rounded-circle z-depth-0"
                                         width="70" height="70" alt="avatar image">
                                    <?php if ($_SESSION['auth']['role'] == 1) : ?>
                                        <img src="img/overlays/star.png" alt="etoile admin" width="30">
                                    <?php endif ?>
                                </a>
                                <?php if ($_SESSION['auth']['role'] == 1) : ?>
                                    <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
                                         aria-labelledby="navbarDropdownMenuLink-55">
                                        <a class="dropdown-item" href="index.php?p=Admin.Users.index">Gestion des
                                            utilisateurs</a>
                                        <a class="dropdown-item" href="index.php?p=Admin.Stocks.index">Gestion des
                                            stocks</a>
                                        <a class="dropdown-item" href="index.php?p=Admin.Products.index">Gestion des
                                            produits</a>
                                        <a class="dropdown-item" href="index.php?p=Admin.orders.index">Gestion des
                                            commandes</a>
                                        <a class="dropdown-item" href="index.php?p=users.disconnect">Se déconnecter</a>
                                    </div>
                                <?php endif ?>
                                <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
                                     aria-labelledby="navbarDropdownMenuLink-55">
                                    <a class="dropdown-item" href="index.php?p=profil.index">Mon compte</a>
                                    <a class="dropdown-item" href="index.php?p=users.disconnect">Se déconnecter</a>
                                </div>
                            </div>
                        <?php endif ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main class="container main">
    <?= $content ?>
</main>
<footer class="menu">
    <!-- Footer Links -->
    <div class="display justify-content-start page-footer rgba-green-light font-small" id="footer">
        <div class="container text-center text-md-left mt-5 pt-5 text-white">
            <!-- Grid row -->
            <div class="row mt-3">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

                    <!-- Content -->
                    <h6 class="text-uppercase font-weight-bold">Les terres d'Aris</h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>Les terres d'Aris sont situées du coté de <a href="https://fr.wikipedia.org/wiki/Canoh%C3%A8s">canohes</a>,
                        de
                        <a href="https://fr.wikipedia.org/wiki/Ille-sur-T%C3%AAt">Illes sur Tet</a>, ainsi que <a
                                href="https://fr.wikipedia.org/wiki/Corb%C3%A8re-les-Cabanes">Corbere les cabanes</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Nos Produits</h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a href="#!">Fruit</a>
                    </p>
                    <p>
                        <a href="#!">legumes</a>
                    </p>
                    <p>
                        <a href="#!">Aromate</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Liens pratique</h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a href="<?php if ($_SESSION['auth']): ?>index.php?p=profil.index<?php else: ?>index.php?p=users.login <?php endif; ?>">Votre
                            compte</a>
                    </p>
                    <p>
                        <a href="<?php if ($_SESSION['auth']): ?>index.php?p=profil.show<?php else: ?>index.php?p=users.login <?php endif; ?>">Vos
                            Informations</a>
                    </p>
                    <p>
                        <a href="<?php if ($_SESSION['auth']): ?>index.php?p=order.index<?php else: ?>index.php?p=users.login <?php endif; ?>">Vos
                            commandes</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Contact</h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a href="index.php?p=contact.index"><i class="fas fa-file-signature mr-3"></i>Nous écrire</a>
                    </p>
                    <p>
                        <a href="https://fr.wikipedia.org/wiki/Canoh%C3%A8s"><i class="fas fa-home mr-3"></i>Toulouges
                            66680</a>
                    </p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i> info@lesterresdaris.fr
                    </p>
                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center text-black-50 py-3">© 2019 Copyright:
            <a href="https://openclassrooms.com">Projet 5 </a>
        </div>
        <!-- Copyright -->
</footer>
<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="../../../js/jquery-3.4.0.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../../../js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../../../js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../../../js/mdb.js"></script>
<script type="text/javascript" src="../../../js/validator.min.js"></script>

<script type="text/javascript" src="js/script.js"></script>
</body>

</html>