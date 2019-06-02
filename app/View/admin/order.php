<Main class="container-fluid">
    <table class="table col-md-12">
        <tbody>
        <tr>
            <th scope="row" class="text-center font-weight-bold h4-responsive">Mes commandes en cours</th>
        </tr>
        <tr>
            <th>10 kg de concombres</th>
        </tr>
        <tr>
            <th>10 kg de concombres</th>
        </tr>
        <tr>
            <th>10 kg de concombres</th>
        </tr>
        <tr>
            <th>10 kg de concombres</th>
        </tr>
        <tr>
            <th>10 kg de concombres</th>
        </tr>

        <tr>
            <th scope="row" class="text-center font-weight-bold h4-responsive">Mes commandes en terminées</th>
        </tr>
        <?php foreach($orders as $order) : ?>
            <tr>
                <th><?= $order->id ?> </th>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</Main>

