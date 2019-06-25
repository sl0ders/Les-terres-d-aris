<?php foreach($orders as $order) : ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Invoice
            <strong><?= $order->datefr?></strong>
            <span class="float-right"> <strong>Status:</strong><?php if ($order->validation == 3){echo ' Payé';} else {echo' En attente de payment';}?></span>

        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h6 class="mb-3">From:</h6>
                    <div>
                        <strong>www.lesterresdaris.com</strong>
                    </div>
                    <div>Domaine du Mas Vezian</div>
                    <div>66350 Toulouges France</div>
                    <div>Email: info@lesterresdaris.com</div>
                    <div>Phone: +48 444 666 3333</div>
                </div>

                <div class="col-sm-6">
                    <h6 class="mb-3">To:</h6>
                    <div>Attn: <?= ucfirst($order->users_firstname).' '.ucfirst($order->users_name) ?></div>
                    <div>Email: <?= $order->email ?></div>
                </div>



            </div>

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="center">#</th>
                            <th>Produit</th>

                        <th class="right">Prix unitaire</th>
                        <th class="center">Qté</th>
                        <th class="right">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="center"><?= $order->concat_id?></td>
                        <td class="left strong"><?= $order->concat_product ?></td>

                        <td class="right"><?= $order->concat_price?></td>
                        <td class="center"><?= $order->concat_quantity?></td>
                        <td class="right"><?= $order-> concat_total ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-lg-4 col-sm-5">

                </div>

                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                        <tr>
                            <td class="left">
                                <strong>Total</strong>
                            </td>
                            <td class="right">
                                <strong><?= $order->prix_total ?></strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>
</div>
<?php endforeach; ?>