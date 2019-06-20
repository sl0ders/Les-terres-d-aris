<!--Main Layout-->
<? $total = $total += $product->price * $_SESSION['cart'][$product->id]; ?>
<?php if ($_SESSION['auth']['role'] == 0): ?>
    <a class="nav-link fixed-bottom" style="width: 200px;margin-bottom: 320px">
        <img src="img/caddie.gif" onclick="{document.querySelector('.navig').style.display = 'none'}"
             data-toggle="modal" data-target="#modalCart" class="animated bounceIn" width="120" alt="cart"
             id="animated-img1"><span><?= array_sum($_SESSION['cart']); ?></span>
    </a>
    <!-- Modal: modalCart -->
    <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" style="z-index: 300;" role="document">
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Votre panier</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">

                    <table class="table table-bordered table-responsive-md table-striped text-center w-auto">
                        <thead>
                        <tr>
                            <th class="text-center font-weight-bolder">Produit</th>
                            <th class="text-center font-weight-bolder">Disponibilité</th>
                            <th class="text-center font-weight-bolder">Prix</th>
                            <th class="text-center font-weight-bolder">Quantité</th>
                            <th class="text-center font-weight-bolder">Action</th>
                        </tr>
                        </thead>
                        <?php foreach ($products as $product) : ?>
                        <?php if (isset($_SESSION['cart'][$product->id])) : ?>
                        <? $total = $total += $product->price * $_SESSION['cart'][$product->id]; ?>
                        <tbody>

                        <tr>
                            <td class="pt-3-half" contenteditable="false">
                                <img src="img/<?= $product->name ?>.png" alt="<?= $product->name ?>" width="70">
                                <?= $product->name ?>
                            </td>
                            <td>
                                <?php if ($product->quantity <= 50) {
                                    echo '<p class="text-center h6 text-danger">
                        <i class="fas fa-exclamation-triangle"></i>
                        Produit en rupture dépéchez-vous !!</p>';
                                } elseif ($product->quantity <= 100) {
                                    echo '<p class="text-center h6 text-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        Produit bientot en rupture</p>';
                                } elseif ($product->quantity <= $_SESSION['cart'][$product->id]) {
                                    echo '<p class="text-center h6 text-danger">
                        <i class="fas fa-exclamation-triangle"></i>
                        Produit épuisé!</p>';
                                } else {
                                    echo '<p class="text-center h6 text-success">
                        Ce produit est encore disponible en quantité</p>';
                                } ?>
                            </td>

                            <td class="pt-3-half" contenteditable="false">
                                <?= $product->price ?>
                                €/<?= $product->unity ?>
                            </td>
                            <td class="pt-3-half" contenteditable="false">
                                <?= $_SESSION['cart'][$product->id] ?>
                            </td>
                            <td>
                                <form method="post" action="index.php?p=cart.del&id=<?= $product->id ?>">
                                    <label for="<?= $product->id ?>">
                                        <input type="submit" value="supprimé"
                                               class="btn btn-primary btn-sm btn-rounded">
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <?php endif; ?>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2">Total</td>
                            <td colspan="2"><?= $total ?> €</td>
                            <td>
                                <form method="post">
                                    <button value="Valider" name="order" class="btn btn-sm btn-outline-primary">
                                        Valider
                                    </button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>
<!-- Modal: modalCart -->

<?php foreach ($products as $product) : ?>
    <div class="wow fadeInUp cards">
        <div class="text-center card card-cascade narrower text-center content p-auto mt-5 ml-3 mb-5">
            <!-- Card image -->
            <div class="view view-cascade overlay">
                <a href="<?= $product->urlFront ?>">
                    <img class="card-img-top" width="70" height="200" style="z-index:2"
                         src="<?= $product->imgMini ?>"
                         alt="<?= $product->name ?>">
                </a>
                <div class="mask rgba-white-slight"></div>
            </div>
            <div class="card-body card-body-cascade">
                <h4 class="font-weight-bold card-title"><a
                            href="<?= $product->urlFront ?>"> <?= ucfirst($product->name) ?> </a>
                </h4>
                <?php if ($product->quantity <= 50): ?>
                    <span class="text-danger">
                        <i class="fas fa-exclamation-triangle"></i>
                        <p>Ce produit arrive en rupture de stock</p>
                    </span>

                <?php elseif ($product->quantity <= 100): ?>
                    <span class="text-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        <p>Attention, le produit s'épuise dépéchez-vous !</p>
                    </span>
                <?php endif; ?>


                <!-- Text -->
                <div class="description" id="desc">
                    <?= $product->description ?>
                    <a href="#">Plus de detail</a>
                </div>
            </div>
            <form method="post" action="<?= $product->UrlAdd ?>">
                <label for="">
                    <input type="number" name="much" value="1" min="1" class="w-25">
                    <button type="submit" class="bouton btn-sm btn-dark-green">
                        <i class="fas fa-cart-arrow-down"></i>
                    </button>
                </label>
            </form>
            <h5 class="green-text pb-2 pt-1">Prix: <?= $product->price ?>€/kg</h5>
            <div class="text-right">
                <label>
                    <input value="en savoir +" type="button" class="btn-fab btn btn-sm rgba-green-light">
                </label>
            </div>
        </div>
    </div>
<?php endforeach; ?>
