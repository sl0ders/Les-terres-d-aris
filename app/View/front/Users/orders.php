<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Vos commandes</h3>
    <div class="card-body ">
        <div id="table" class="table-editable table-responsive">
            <form method="post">
                <table class="table table-bordered table-responsive-md table-striped text-center w-auto">
                    <thead>
                    <tr>
                        <th colspan="2" class="text-center font-weight-bolder">numero commande</th>
                        <th class="text-center font-weight-bolder">produit</th>
                        <th class="text-center font-weight-bolder">Quantité</th>
                        <th class="text-center font-weight-bolder">Action</th>
                    </tr>
                    </thead>
                    <?php foreach ($orders as $order) : ?>
                    <tbody>
                    <tr>
                        <td class="pt-3-half" contenteditable="false"><?= $order->nCmd ?></td>
                        <td class="pt-3-half" contenteditable="false"><?= $order->product_id ?></td>
                        <td class="pt-3-half" contenteditable="false"><?= $order->price ?></td>
                        <td class="pt-3-half" contenteditable="false"><?= $order->user_id ?></td>
                    </tr>
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
