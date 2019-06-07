<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Gestion des stocks</h3>
    <div class="card-body ">
        <div id="table" class="table-editable">
            <table class="table table-bordered table-responsive-md table-striped text-center">
                <thead>
                <tr>
                    <th class="text-center font-weight-bolder">Produit</th>
                    <th class="text-center font-weight-bolder">Valeur</th>
                    <th class="text-center font-weight-bolder">Quantité</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($stocks as $stock): ?>
                    <tr>
                        <td class="pt-3-half" contenteditable="true"><?= $stock->product_id ?></td>
                        <td class="pt-3-half" contenteditable="true"><?= $stock->packaging ?></td>
                        <td class="pt-3-half" contenteditable="true"><?= $stock->quantity ?></td>
                    </tr>
                <?php endforeach ?>
                <!-- This is our clonable table line -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Editable table -->