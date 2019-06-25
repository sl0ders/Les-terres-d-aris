<table class="table">
    <thead class="black white-text">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Produits</th>
        <th scope="col">Prix</th>
        <th scope="col">Quantité</th>
        <th scope="col">Total</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td><?= $order->price ?></td>
        <td><?= $order->quantity ?></td>
        <td><?= $order->total ?></td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <th colspan="3">1</th>
        <td><?= $order->price ?></td>
        <td><?= $order->quantity ?></td>
        <td><?= $order->total ?></td>
    </tr>
    </tfoot>
</table>