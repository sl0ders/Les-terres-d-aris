<!-- Editable table -->
<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Gestion des utilisateurs</h3>
    <div class="card-body ">
        <div id="table" class="table-editable">
            <table class="table table-bordered table-responsive-md text-center">
                <thead>
                <tr>
                    <th class="text-center font-weight-bolder">ID</th>
                    <th class="text-center font-weight-bolder">Utilisateurs</th>
                    <th class="text-center font-weight-bolder">Email</th>
                    <th class="text-center font-weight-bolder">Pseudo</th>
                    <th class="text-center font-weight-bolder">Role</th>
                    <th class="text-center font-weight-bolder">Etat</th>
                    <th class="text-center font-weight-bolder">Image Profile</th>
                    <th class="text-center font-weight-bolder">Validation email</th>
                    <th class="text-center font-weight-bolder">Detail</th>
                </tr>
                </thead>
                <tbody">
                <?php foreach ($users as $user): ?>

                    <tr <?php if($user->actif == 2){?>class="rgba-red-strong"<?php }?>>
                        <td class="pt-3-half" contenteditable="true"><?= $user->id ?></td>
                        <td class="pt-3-half" contenteditable="true"><?= $user->name . ' ' . $user->firstname ?></td>
                        <td class="pt-3-half" contenteditable="true"><?= $user->email ?></td>
                        <td class="pt-3-half" contenteditable="true"><?= $user->username ?></td>
                        <td class="pt-3-half" contenteditable="true"><?php if ($user->role == 1) {echo 'Admin';} elseif ($user->role == 0) {echo 'User';}?></td>
                        <td class="pt-3-half" contenteditable="true"><?php if ($user->actif == 0) {echo 'Visiteur';} elseif ($user->actif == 1) {echo 'Utilisateur';} elseif($user->actif == 2) {echo 'Utilisateur bannie';} ?></td>
                        <td class="pt-3-half" contenteditable="true"><?= $user->imgProfil ?></td>
                        <td class="pt-3-half" contenteditable="true"><?php if ($user->mailvalidation == 1) {echo 'Email validé';} else {echo 'Email en attente de validation';} ?></td>
                        <td>
                            <span class="table-remove">
                                <a href="<?= $user->url; ?>">
                                    <input type="button" value="detail" class="btn btn-primary btn-rounded btn-sm my-0">
                                </a>
                            </span>
                        </td>

                    </tr>

                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>
<!-- Editable table -->