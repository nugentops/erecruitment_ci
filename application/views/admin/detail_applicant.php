<div class="container-fluid p-4">

    <h2>Detail Pelamar</h2>

    <hr>

    <p>
        <strong>Nama :</strong>
        <?= $applicant->full_name ?>
    </p>

    <p>
        <strong>Username :</strong>
        <?= $applicant->username ?>
    </p>

    <p>
        <strong>Email :</strong>
        <?= $applicant->email ?>
    </p>

    <p>
        <strong>Phone :</strong>
        <?= $applicant->phone ?>
    </p>

    <hr>

    <h4>Riwayat Lamaran</h4>

    <table class="table table-bordered">

        <thead>

            <tr>
                <th>Lowongan</th>
                <th>Status</th>
                <th>Catatan HRD</th>
            </tr>

        </thead>

        <tbody>

        <?php foreach($applications as $app): ?>

            <tr>

                <td><?= $app->title ?></td>

                <td><?= $app->status ?></td>

                <td><?= $app->notes ?></td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>