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
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../../../css/mdb.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="scss/sass/style.scss">
</head>
<body>
<header class="navigation1">
    <nav class="navbar navbar-expand-lg navbar-dark rgba-white-strong scrolling-navbar">
        <div class="container-fluid">
            <button class="navbar-toggler rgba-green-strong" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent-7"
                    aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-sm-1" id="navbarSupportedContent-7">
                <ul class="navbar-nav align-items-center d-flex justify-content-between col-md-12">
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
                        <p></p>
                        <p class="speach ml-5 pl-5">Les terres d'Aris <br> Mangez <span> BON </span> mangez
                            <span> BIO</span> !!
                        </p>
                        <input class="form-control search ml-5 mt-5" style="border: 2px solid rgba(12,54,64,0.5);"
                               type="text" placeholder="Rechercher un produit"
                               aria-label="Search">
                    </li>
                    <li class="nav-item row caddie">
                        <a class="nav-link" href="index.php?p=cart.index">

                            <img src="img/caddie.gif" class="animated bounceIn" width="70" alt="cart"
                                 id="animated-img1">
                        </a>
                        <?php if (!isset($_SESSION['auth'])) : ?>
                            <a class="nav-link mt-4" href="index.php?p=users.signUp">S'inscrire</a>
                            <a class="nav-link mt-4" href="index.php?p=users.login">Se connecter</a>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['auth'])) : ?>
                            <div class="nav-item avatar dropdown mt-4">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <img src="<?= $_SESSION['imgProfile'] ?>" width="70"
                                         class="rounded-circle z-depth-0" alt="avatar image">
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
                                     aria-labelledby="navbarDropdownMenuLink-55">
                                    <a class="dropdown-item" href="index.php?p=admin.profil.index">Mon compte</a>
                                    <a class="dropdown-item" href="index.php?p=admin.profil.order">Mes commandes</a>
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
<header class="navigation2">
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
                    <li class="nav-item ml-5 pl-5">
                        <input class="form-control search" type="text" placeholder="Rechercher un produit"
                               aria-label="Search">
                    </li>
                    <li class="nav-item row caddie2">
                        <a class="nav-link" href="index.php?p=cart.index">
                            <img src="img/caddie.gif" class="animated bounceIn" width="70" alt="cart"
                                 id="animated-img1">
                        </a>
                        <?php if (!isset($_SESSION['auth'])) : ?>
                            <a class="nav-link mt-4" href="index.php?p=users.signUp">S'inscrire</a>
                            <a class="nav-link mt-4" href="index.php?p=users.login">Se connecter</a>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['auth'])) : ?>
                            <div class="nav-item avatar dropdown mt-4">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <img src="<?= $_SESSION['imgProfile'] ?>"
                                         class="rounded-circle z-depth-0" alt="avatar image">
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
                                     aria-labelledby="navbarDropdownMenuLink-55">
                                    <a class="dropdown-item" href="index.php?p=admin.profil.index">Mon compte</a>
                                    <a class="dropdown-item" href="index.php?p=admin.profil.order">Mes commandes</a>
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
                    <h6 class="text-uppercase font-weight-bold">les terres d'aris</h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
                        consectetur
                        adipisicing elit.</p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Products</h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a href="#!">MDBootstrap</a>
                    </p>
                    <p>
                        <a href="#!">MDWordPress</a>
                    </p>
                    <p>
                        <a href="#!">BrandFlow</a>
                    </p>
                    <p>
                        <a href="#!">Bootstrap Angular</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a href="#!">Your Account</a>
                    </p>
                    <p>
                        <a href="#!">Become an Affiliate</a>
                    </p>
                    <p>
                        <a href="#!">Shipping Rates</a>
                    </p>
                    <p>
                        <a href="#!">Help</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Contact</h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i> info@example.com</p>
                    <p>
                        <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                    <p>
                        <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center text-black-50 py-3">© 2018 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
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

<script type="text/javascript" src="js/script.js"></script>
</body>

</html>