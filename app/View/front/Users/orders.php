<? $total = $total += $product->price * $_SESSION['cart'][$product->id];?>
<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Votre Panier</h3>
    <div class="card-body ">
        <div id="table" class="table-editable table-responsive">
            <form method="post">
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
                        <td class="pt-3-half" contenteditable="false"><img src="img/<?= $product->img ?>"
                                                                           alt="mini<?= $product->img ?>" width="70">
                        </td>
                        <td class="pt-3-half" contenteditable="false"><?= $product->name ?></td>
                        <td class="pt-3-half" contenteditable="false"><?= $product->price ?>
                            €/<?= $product->unity ?></td>
                        <td class="pt-3-half" contenteditable="false"><?= $_SESSION['cart'][$product->id] ?></td>
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
                        <td><?= $total ?> €</td>
                        <td colspan="2"><input value="Valider" name="order" class="btn btn-sm btn-outline-primary"></td>
                    </tr>
                    </tbody>

                </table>
            </form>
        </div>
    </div>
</div>

<!-- Editable table -->
