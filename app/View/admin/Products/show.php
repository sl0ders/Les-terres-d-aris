<div class="justify-content-end">
    <button type="submit" data-toggle="modal" data-target="#modalLoginForm" value="Editer"
            class="btn btn-primary btn-sm">Editer
    </button>
</div>
<br>
<div class="text-center row">
    <div class="col-md-6">
        <img src="img/<?= $product->name ?>.jpg" alt="<?= $product->name ?>" style="width: 100%" width="542"
             height="539">
    </div>
    <div class="col-md-6">
        <h2>Description du produit</h2>
        <p class="mt-sm-4 mt-4"><?= $product->description ?></p>
        <br>
        Prix actuel: <?= $product->price ?>€/l'unité
        <br>
    </div>
</div>
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
            <form method="post">
                <div class="modal-body mx-3">

                    <?= $form->input('name', 'Nom du produit', $product->name); ?>

                    <p class="text-center h6 red-text">
                        <i class="fas fa-exclamation-triangle"></i>
                        <br>
                        Une modification
                        de nom entraine également une
                        modification des deux images destinée au produit
                        <br>
                        (modifier egalement le nom de l'image)
                    </p>
                    <?= $form->textarea('description', 'Description du produit', $product->id); ?>

                    <label for="<?= $product->id ?>">
                        Prix actuel: <?= $product->price ?>€/l'unité
                        <input type="number" name="howmuch" placeholder="0" class="w-25">
                    </label>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-default">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
