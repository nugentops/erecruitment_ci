<div class="container mt-5">

    <!-- HEADER WELCOME -->
    <div class="card shadow border-0 rounded-4">
        <div class="card-body p-4">

        <div class="row align-items-center">

            <div class="col-md-2 text-center">

                <?php if(!empty($user->photo)): ?>

                    <img src="<?= base_url('uploads/profile/'.$user->photo) ?>"
                        class="rounded-circle shadow"
                        width="120"
                        height="120">

                <?php else: ?>

                    <img src="https://via.placeholder.com/120"
                        class="rounded-circle shadow">

                <?php endif; ?>

            </div>

            <div class="col-md-10">

                <h2 class="fw-bold">
                    <?= $user->full_name ?>
                </h2>

                <p class="text-muted">
                    <?= $user->email ?>
                </p>

            </div>

        </div>

            <div class="row align-items-center">
                
                <!-- LEFT TEXT -->
                <div class="col-md-8">
                    <h2 class="fw-bold">Dashboard Applicant</h2>

                    <p class="text-muted mb-0">
                        Selamat datang kembali,
                        <span class="fw-semibold text-dark">
                            <?= $this->session->userdata('username') ?>
                        </span>
                    </p>
                </div>

                <!-- RIGHT QUICK INFO -->
                <div class="col-md-4 text-md-end mt-3 mt-md-0">

                    <div class="badge bg-primary p-2">
                        E-Recruitment System
                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- STATS CARD -->
    

    <!-- MENU ACTION -->
    <div class="row mt-4">

        <div class="col-md-3">
            <a href="<?= site_url('applicant/jobs') ?>" class="text-decoration-none">
                <div class="card shadow border-0 rounded-4 text-center h-100">
                    <div class="card-body">
                        <h5>📌 Lowongan</h5>
                        <p class="text-muted">Cari pekerjaan</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="<?= site_url('applicant/my_applications') ?>" class="text-decoration-none">
                <div class="card shadow border-0 rounded-4 text-center h-100">
                    <div class="card-body">
                        <h5>📄 Lamaran Saya</h5>
                        <p class="text-muted">Status aplikasi</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="<?= site_url('applicant/profile') ?>" class="text-decoration-none">
                <div class="card shadow border-0 rounded-4 text-center h-100">
                    <div class="card-body">
                        <h5>👤 Profil</h5>
                        <p class="text-muted">Edit data diri</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="<?= site_url('auth/logout') ?>" class="text-decoration-none">
                <div class="card shadow border-0 rounded-4 text-center h-100 bg-danger text-white">
                    <div class="card-body">
                        <h5>🚪 Logout</h5>
                        <p class="mb-0">Keluar sistem</p>
                    </div>
                </div>
            </a>
        </div>

    </div>

</div>