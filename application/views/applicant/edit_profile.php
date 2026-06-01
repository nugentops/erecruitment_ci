<div class="container mt-4">

    <h2>Edit Profil</h2>

    <form action="<?= site_url('applicant/update_profile') ?>"
        method="post"
        enctype="multipart/form-data">
        <div class="mb-3">

            <label>Nama Lengkap</label>

            <input type="text"
                   name="full_name"
                   class="form-control"
                   value="<?= $user->full_name ?>">

        </div>

        <div class="mb-3">

            <label>Email</label>

            <input type="email"
                   name="email"
                   class="form-control"
                   value="<?= $user->email ?>">

        </div>

        <div class="mb-3">

            <label>No HP</label>

            <input type="text"
                   name="phone"
                   class="form-control"
                   value="<?= $user->phone ?>">

        </div>

        <div class="mb-3">

            <label>Foto Profil</label>

            <?php if(!empty($user->photo)): ?>

                <div class="mb-2">

                    <img src="<?= base_url('uploads/profile/'.$user->photo) ?>"
                        width="120"
                        class="rounded-circle shadow">

                </div>

            <?php endif; ?>

            <input type="file"
                name="photo"
                class="form-control">

        </div>

        <button class="btn btn-primary">
            Simpan
        </button>

    </form>

</div>