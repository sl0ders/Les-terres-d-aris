<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Numero de la commande</th>
        <th scope="col">Produit</th>
        <th scope="col">Quantité</th>
        <th scope="col">Prix total</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">Cmd n°<?= $cmd->number ?></th>
        <td><?= $cmd->product ?></td>
        <td><?= $cmd->quantity ?></td>
        <td><?= $cmd->price ?></td>
    </tr>
    </tbody>
</table>