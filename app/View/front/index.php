<!--Main Layout-->
<? $total = $total += $product->price * $_SESSION['cart'][$product->id];?>
<?php if ($_SESSION['role'] == 0): ?>
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
                            <th colspan="2" class="text-center font-weight-bolder">Produit</th>
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
                            <td class="pt-3-half" contenteditable="false"><img src="img/<?= $product->name ?>.png"
                                                                               alt="mini<?= $product->name ?>" width="70">
                            </td>
                            <td class="pt-3-half" contenteditable="false"><?= $product->name ?></td>
                            <td class="pt-3-half" contenteditable="false"><?= $product->price ?>
                                €</td>
                            <td class="pt-3-half" contenteditable="false"><?= $_SESSION['cart'][$product->id] .' ' . $product->unity ?></td>
                            <td>
                                <form method="post" action="index.php?p=cart.del&id=<?= $product->id ?>">
                                    <label for="">
                                        <input type="submit" value="supprimé" class="btn btn-primary btn-sm btn-rounded">
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <?php endif; ?>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2">Total</td>
                            <td colspan="2"><?= $total ?> €</td>
                        </tr>
                        </tbody>

                    </table>

                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Fermer</button>
                    <form method="post">
                        <button name="order" class="btn btn-primary">Validé</button>
                    </form>
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
                         src="img/<?= $product->name ?>.png"
                         alt="<?=$product->name ?>">
                </a>
                <div class="mask rgba-white-slight"></div>

            </div>
            <!-- Card content -->
            <div class="card-body card-body-cascade">
                <!-- Label -->

                <!-- Title -->
                <h4 class="font-weight-bold card-title"><a
                            href="<?= $product->urlFront ?>"> <?= ucfirst($product->name) ?> </a>
                </h4>
                <!-- Text -->
                <div class="description" id="desc">
                    <?= $product->description ?>
                    <a href="#">Plus de detail</a>
                </div>
            </div>
            <form method="post" action="index.php?p=cart.addCart&id=<?= $product->id ?>">
                <label for="">
                    <input type="number" name="much" placeholder="1" min="1" class="w-25">
                    <button type="submit" class="bouton btn-sm btn-dark-green">
                        <i class="fas fa-cart-arrow-down"></i>
                    </button>
                </label>
            </form>
            <h5 class="green-text pb-2 pt-1">Prix: <?= $product->price ?>€/kg</h5>
            <div class="text-right">
                <label>
                    <input value="en savoir +" type="button"  class="btn-fab btn btn-sm rgba-green-light">
                </label>
            </div>
        </div>
    </div>
<?php endforeach; ?>
