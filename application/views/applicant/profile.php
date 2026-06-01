<div class="container mt-4">

    <h2>Profil Saya</h2>

    <hr>

    <div class="text-center mb-4">

        <?php if(!empty($user->photo)): ?>

            <img src="<?= base_url('uploads/profile/'.$user->photo) ?>"
                width="150"
                height="150"
                class="rounded-circle shadow">

        <?php else: ?>

            <img src="https://via.placeholder.com/150"
                class="rounded-circle shadow">

        <?php endif; ?>

    </div>

    <table class="table table-bordered">

        <tr>
            <th width="200">Nama Lengkap</th>
            <td><?= $user->full_name ?></td>
        </tr>

        <tr>
            <th>Username</th>
            <td><?= $user->username ?></td>
        </tr>

        <tr>
            <th>Email</th>
            <td><?= $user->email ?></td>
        </tr>

        <tr>
            <th>No HP</th>
            <td><?= $user->phone ?></td>
        </tr>

    </table>

    <a href="<?= site_url('applicant/edit_profile') ?>"
       class="btn btn-warning">

       Edit Profil

    </a>

    <a href="<?= site_url('applicant/dashboard') ?>"
        class="btn btn-secondary">

            Kembali ke Dashboard
    </a>

</div>