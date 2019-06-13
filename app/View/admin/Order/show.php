<div class="text-center row">
    <div class="col-md-6">
        <img src="img/<?= $product->name ?>-show.jpg" alt="<?= $product->name ?>" style="width: 100%" width="542"
             height="539">
        <button class="btn btn-primary btn-sm" style="">Editer</button>
    </div>
    <div class="col-md-6">
        <h2>Description du produit</h2>
        <form method="post">
            <?= $form->textarea('description', "", "active"); ?>
            <input type="submit" value="Editer" class="btn btn-primary btn-sm">
        </form>
        <br>
        <br>
        Prix actuel: <?= $product->price ?>€/l'unité
        <br>
        <form method="post">
            <label for="<?= $product->id ?>">
                <input type="number" name="howmuch" placeholder="0" class="w-25">
                <input type="submit" value="Valider" class="btn btn-primary btn-sm btn-rounded">
            </label>
        </form>
    </div>

</div>