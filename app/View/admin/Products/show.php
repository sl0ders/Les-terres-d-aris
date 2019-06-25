<div class="text-center row">
    <div class="col-md-6">
        <img src="<?= $product->imgProduct ?>" alt="<?= $product->name ?>" style="width: 100%" width="600"
             height="539">
        <form  method="post" enctype="multipart/form-data">
            <label for="fichier_a_uploader" title="icon image">Image du produit :</label>
            <input type="hidden" name="MAX_FILE_SIZES" value="<?php echo MAX_SIZE; ?>"/>
            <input name="fichier" type="file" id="fichier_a_uploader"/>
            <button type="submit" name="grandImage" class="btn btn-primary btn-sm">Editer
            </button>
        </form>
    </div>
    <div class="col-md-6">
        <div class="justify-content-end">
            <button type="submit" data-toggle="modal" data-target="#modalLoginForm" value="Editer"
                    class="btn btn-primary btn-sm">Editer
            </button>
        </div>
        <h2>Description du produit</h2>
        <p class="mt-sm-4 mt-4"><?= $product->description ?></p>
        <br>
        Prix actuel: <?= $product->price ?>€/l'unité
        <br>
        <img src="<?= $product->imgMini ?>" alt="<?= $product->name ?>" width="90">
    </div>
</div>



<!-- Desc -->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Modification du produit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" class="text-center">
                <div class="modal-body mx-3">
                    <?= $form->input('name', 'Nom du produit', $product->name); ?>
                    <?= $form->textarea('description', 'Description du produit', $product->id); ?>
                    <label for="<?= $product->id ?>">
                        Prix actuel: <?= $product->price ?>€/l'unité
                        <input type="number" name="howmuch" placeholder="0" class="w-25">
                    </label><br>
                    <label for="fichier_a_uploader" title="icon image">Icône du produit :</label>
                    <input type="hidden" name="MAX_FILE_SIZES" value="<?php echo MAX_SIZE; ?>"/>
                    <input name="fichier" type="file" id="fichier_a_uploader"/>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" name="submit" class="btn btn-default">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End desc -->