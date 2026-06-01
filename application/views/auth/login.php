<!DOCTYPE html>
<html>
<head>

    <title>Login E-Recruitment</title>

    <link rel="stylesheet"
          href="<?= base_url('assets/css/bootstrap.min.css') ?>">

</head>

<body style="background:#f4f6f9;">

<div class="container">

    <div class="row justify-content-center align-items-center"
         style="min-height:100vh;">

        <div class="col-md-5">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-body p-5">

                    <div class="text-center mb-4">

                        <h2 class="fw-bold text-primary">
                            E-Recruitment
                        </h2>

                        <p class="text-muted">
                            Silakan login ke sistem
                        </p>

                    </div>

                    <form method="post">

                        <div class="mb-3">

                            <label>Username</label>

                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label>Password</label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   required>

                        </div>

                        <button type="submit"
                                class="btn btn-primary w-100">

                            Login

                        </button>

                    </form>

                    <hr>

                    <div class="text-center">

                        Belum punya akun?

                        <a href="<?= site_url('auth/register') ?>">
                            Register Applicant
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>