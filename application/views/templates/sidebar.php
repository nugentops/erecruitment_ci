<div class="d-flex">

    <!-- Sidebar -->
    <div class="bg-dark text-white p-3 vh-100" style="width:250px;">

        <h3>E-Recruitment</h3>
        <hr>

        <ul class="nav flex-column">

            <li class="nav-item mb-2">
                <a href="<?= site_url('admin/dashboard') ?>" class="nav-link text-white">
                    Dashboard
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="<?= site_url('jobs') ?>" class="nav-link text-white">
                    Data Lowongan
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="<?= site_url('admin/applicants') ?>" class="nav-link text-white">
                    Data Pelamar
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="<?= site_url('admin/applications') ?>" class="nav-link text-white">
                Data Lamaran
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="<?= site_url('auth/logout') ?>" class="nav-link text-danger">
                    Logout
                </a>
            </li>

        </ul>

    </div>