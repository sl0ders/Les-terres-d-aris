<?php if ($_SESSION['auth']['actif'] == 1): ?>

    <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Votre Panier</h3>
        <div class="card-body ">
            <div id="table" class="table-editable table-responsive">
                <table class="table table-bordered table-responsive-md table-striped text-center w-auto">
                    <thead>
                    <tr>
                        <th class="text-center font-weight-bolder">Produit</th>
                        <th class="text-center font-weight-bolder">Disponibilité</th>
                        <th class="text-center font-weight-bolder">Prix</th>
                        <th class="text-center font-weight-bolder">Quantité</th>
                        <th class="text-center font-weight-bolder">Total simple</th>
                        <th class="text-center font-weight-bolder">Action</th>
                    </tr>
                    <?php foreach ($products as $product) :?>
                    <?php $total = $total += $product->price * $_SESSION['cart'][$product->id]; ?>
                    <tbody>
                    <tr>
                        <td class="pt-3-half" contenteditable="false">
                            <img src="<?= $product->imgMini ?>" alt="<?= $product->name ?>" width="70">
                            <?= $product->name ?>
                        </td>
                        <td>
                            <?php if ($product->quantity <= 50) {
                                echo '<p class="text-center h6 text-danger">
                        <i class="fas fa-exclamation-triangle"></i><br>
                        Produit en rupture dépéchez-vous !!</p>';

                            } elseif ($product->quantity <= 100) {
                                echo '<p class="text-center h6 text-warning">
                        <i class="fas fa-exclamation-triangle"></i><br>
                        Produit bientot en rupture</p>';

                            } elseif ($product->quantity <= $_SESSION['cart'][$product->id]) {
                                echo '<p class="text-center h6 text-danger">
                        <i class="fas fa-exclamation-triangle"></i><br>
                        Produit épuisé!</p>';

                            } else {
                                echo '<p class="text-center h6 text-success">
                        <i class="fas fa-exclamation-triangle"></i><br>
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
                        <td class="pt-3-half" contenteditable="false">
                            <?php $totalsimple = $product->price * $_SESSION['cart'][$product->id]?>
                            <?= $totalsimple ?>€
                        </td>
                        <td>
                            <form method="post" action="index.php?p=cart.delete&id=<?= $product->id ?>">
                                <label for="<?= $product->id ?>">
                                    <input type="submit" value="supprimé" class="btn btn-primary btn-sm btn-rounded">
                                </label>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="2">Total</td>
                        <td colspan="2"><?= $total ?> €
                        </td>
                        <td>
                            <form action="index.php?p=order.add&quantity=<?= $_SESSION['cart'][$product->id] ?>" method="post">

                            <button name="order" value="Valider" class="btn btn-sm btn-outline-primary">
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
<?php else: return $this->forbidden(); ?>
    <!-- Editable table -->
<?php endif ?>
