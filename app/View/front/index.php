<!--Main Layout-->
<?php foreach ($products as $product) : ?>
    <div class="wow fadeInUp cards">
        <div class="text-center card card-cascade narrower text-center content p-auto mt-5 ml-3 mb-5">
            <!-- Card image -->
            <div class="view view-cascade overlay">
                <a href="show.php">
                    <img class="card-img-top" width="70" height="200" style="z-index:2" src="img/<?= $product->img ?>"
                         alt="' . $name . '">
                </a>
                <div class="mask rgba-white-slight"></div>

            </div>
            <!-- Card content -->
            <div class="card-body card-body-cascade">
                <!-- Label -->
                <h5 class="green-text pb-2 pt-1">Prix : <?= $product->price ?>€/kg</h5>
                <!-- Title -->
                <h4 class="font-weight-bold card-title"><a href="index?p=products.show&id=<?= $product->id ?>"> <?= ucfirst($product->name) ?> </a>
                </h4>
                <!-- Text -->
                <p class="description" data-desc="<?= $product->description ?>">
                    <?= $product->description ?>
                    <a href="#">Plus de detail</a>
                </p>
            </div>
            <div class="">
                <form action="">
                    <label for="">
                        <input type="number" name="howmuch" placeholder="1" min="1" class="w-25">
                        <button type="button" class="bouton btn-sm btn-primary">
                            <i class="fas fa-cart-arrow-down"></i>
                        </button>
                    </label>
                </form>
            </div>
            <div class="text-right reply">
                    <label>
                        <button value="<?= $product->description ?>" type="submit" class="btn btn-av btn-sm rgba-green-light">
                        <i class="fas fa-reply-all"></i>
                        </button>
                    </label>
            </div>
        </div>
    </div>
<?php endforeach; ?>