<!-- Card -->
<div class="card card-cascade wider">

    <!-- Card image -->
    <div class="view view-cascade gradient-card-header dusty-grass-gradient">

        <!-- Title -->
        <h2 class="card-header-title mb-3"><?= $contact->subject ?></h2>
        <!-- Text -->
        <p class="mb-0"><i class="fas fa-calendar mr-2"></i><?= $contact->date?></p>
    </div>

    <!-- Card content -->
    <div class="card-body card-body-cascade text-center">

        <!-- Text -->
        <p class="card-text"><?= $contact->message ?></p>
        <!-- Link -->
            <h5><button class="waves-effect waves-light btn btn-light-green btn-sm" data-toggle="modal" data-target="#modalContact">Répondre</button></h5>
    </div>
    <!-- Card content -->
</div>
<!-- Card -->
<!-- Modal: modalCart -->
<div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" style="z-index: 300;" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Reponse</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <form method="post">
                    <?= $form->input('Subject', 'Sujet', '') ?>
                    <?= $form->textarea('message', 'Message', '') ?>
                    <button class="btn btn-success">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</div>