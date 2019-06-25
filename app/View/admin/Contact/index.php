<div class="card rgba-green-strong text-white">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Gestion des contacts</h3>
    <div class="card-body ">
        <div id="table" class="table-editable table-responsive">
            <table class="table table-bordered table-responsive-md table-striped text-center w-auto">
                <thead>
                <tr>
                    <th class="text-center font-weight-bolder">Nom</th>
                    <th class="text-center font-weight-bolder">Prenom</th>
                    <th class="text-center font-weight-bolder">Adresse email</th>
                    <th class="text-center font-weight-bolder">Sujet</th>
                    <th class="text-center font-weight-bolder">Message</th>
                    <th class="text-center font-weight-bolder">Action</th>
                </tr>
                </thead>
                <tbody class="text-white">
                <?php foreach ($contacts as $contact): ?>
                    <tr>
                        <td class="pt-3-half" contenteditable="false"><?= $contact->user_name ?></td>
                        <td class="pt-3-half" contenteditable="false"><?= $contact->user_firstname ?></td>
                        <td class="pt-3-half" contenteditable="false"><?= $contact->user_email ?></td>
                        <td class="pt-3-half" contenteditable="false"><?= $contact->subject ?></td>
                        <td class="pt-3-half" contenteditable="false"><?= $contact->extract ?></td>
                    </tr>
                <?php endforeach ?>
                <!-- This is our clonable table line -->
                </tbody>
            </table>
        </div>
    </div>
</div>

