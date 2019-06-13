<?php
?>

<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Information utilisateur</h3>
    <div class="card-body ">
        <div id="table" class="table-editable">
            <table class="table table-bordered ">
                <tbody>
                <tr>
                    <th scope="row" class="font-weight-bolder">NOM :</th>
                    <td><?= $infoUser->name; ?></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-bolder">PRENOM :</th>
                    <td><?= $infoUser->firstname; ?></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-bolder">PSEUDO :</th>
                    <td><?= $infoUser->username; ?></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-bolder">EMAIL :</th>
                    <td><?= $infoUser->email; ?></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-bolder">STATUS :</th>
                    <td><?php if ($infoUser->actif == 0) {
                            echo 'Visiteur';
                        } elseif ($infoUser->actif == 1) {
                            echo 'Utilisateur';
                        } elseif ($infoUser->actif == 2) {
                            echo 'Utilisateur bannie';
                        } ?></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-bolder">IMG UTIL. :</th>
                    <td><img src="<?= $infoUser->imgProfil ?>" alt="imgProfile"></td>
                </tr>

                </tbody>
                <?php if (($infoUser->actif == 1) || ($infoUser->actif == 0)) : ?>
                    <form action="?p=Admin.users.ban" method="post" style="display: inline">
                        <input type="hidden" name="id" value="<?= $infoUser->id ?>">
                        <button type="submit"
                                onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')"
                                class="btn btn-danger">bannir
                        </button>
                    </form>
                <?php else : ?>
                    <form action="?p=Admin.users.dban" method="post" style="display: inline">
                        <input type="hidden" name="id" value="<?= $infoUser->id ?>">
                        <button type="submit"
                                onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')"
                                class="btn btn-success">réintegrer
                        </button>
                    </form>
                <?php endif; ?>
            </table>
            <div class="text-center">
                <a href="index.php?p=Admin.users.index">
                    <button type="button" class="btn btn-primary"><i class="fas fa-angle-double-left"></i></button>
                </a>
            </div>
        </div>
    </div>
</div>