<?php if ($_SESSION['auth']['actif'] == 1): ?>
    <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Vos Commandes</h3>
        <div class="card-body ">
            <div id="table" class="table-editable table-responsive">
                <table class="table table-bordered table-responsive-md text-center w-auto">
                    <thead>
                    <tr>
                        <th class="text-center font-weight-bolder">numero commande</th>
                        <th class="text-center font-weight-bolder">produit</th>
                        <th class="text-center font-weight-bolder">Quantité</th>
                        <th class="text-center font-weight-bolder">Prix</th>
                        <th class="text-center font-weight-bolder">Total</th>
                        <th class="text-center font-weight-bolder">Etat de la commande</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($orders as $order) : ?>
                        <tr<?php switch ($order->validation) {
                            case ($order->validation == '1'):
                                echo ' class="rgba-red-strong"';
                                break;
                            case ($order->validation == '0'):
                                echo ' class="rgba-orange-strong"';
                                break;
                            default :
                                echo ' class="rgba-green-strong"';
                        } ?>>
                            <td class="pt-3-half" contenteditable="false"><?= $order->nCmd ?></td>
                            <td class="pt-3-half" contenteditable="false"><?= $order->name ?></td>
                            <td class="pt-3-half" contenteditable="false"><?= $order->quantity ?></td>
                            <td class="pt-3-half" contenteditable="false"><?= $order->price ?></td>
                            <td class="pt-3-half" contenteditable="false"><?= $order->total ?></td>
                            <td class="pt-3-half"
                                contenteditable="false">
                                <?php switch ($order->validation) {
                                    case ($order->validation == 1):
                                        echo 'La commande n\'a pas encore été validé';
                                        break;
                                    case ($order->validation == 0):
                                        echo 'Commande en cour de préparation';
                                        break;
                                    case ($order->validation == 2):
                                        echo 'Commande validé et prête';
                                        break;
                                } ?>
                            </td>
                        </tr>
                        <!-- This is our clonable table line -->
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php else: return $this->forbidden(); ?>
<?php endif ?>