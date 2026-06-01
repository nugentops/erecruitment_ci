<!DOCTYPE html>
<html>
<head>

    <title>Register Applicant</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

</head>
<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-body">

                    <h3 class="mb-4 text-center">
                        Register Applicant
                    </h3>

                    <form method="post">

                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text"
                                name="full_name"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email"
                                name="email"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>No HP</label>
                            <input type="text"
                                name="phone"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>Username</label>

                            <input type="text"
                                   name="username"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Password</label>

                            <input type="password"
                                   name="password"
                                   class="form-control">
                        </div>

                        <button type="submit"
                                class="btn btn-primary w-100">
                            Register
                        </button>

                    </form>

                    <p class="mt-3 text-center">
                        Sudah punya akun?

                        <a href="<?= site_url('auth/login') ?>">
                            Login
                        </a>
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>