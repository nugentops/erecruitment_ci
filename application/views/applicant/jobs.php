<div class="container mt-5">

    <h2 class="mb-4">Daftar Lowongan</h2>

    <form method="get"
      action="<?= site_url('applicant/jobs') ?>"
      class="mb-4">

        <div class="row">

            <div class="col-md-10">

                <input type="text"
                    name="keyword"
                    class="form-control"
                    placeholder="Cari lowongan...">

            </div>

            <div class="col-md-2">

                <button type="submit"
                        class="btn btn-primary w-100">

                    Search

                </button>

            </div>

        </div>

    </form>

    <?php if($this->session->flashdata('success')): ?>

        <div class="alert alert-success">

            <?= $this->session->flashdata('success'); ?>

        </div>

    <?php endif; ?>


    <?php if($this->session->flashdata('error')): ?>

        <div class="alert alert-danger">

            <?= $this->session->flashdata('error'); ?>

        </div>

    <?php endif; ?>

    <div class="row"></div>


    <div class="row">

    <?php foreach($jobs as $job): ?>

        <div class="col-md-4 mb-4">

            <div class="card shadow">

                <div class="card-body">

                    <h4><?= $job->title ?></h4>

                    <p><?= $job->company ?></p>

                    <p><?= $job->location ?></p>

                    <p><?= $job->salary ?></p>

                    <form action="<?= site_url('applicant/apply/'.$job->id) ?>"
                        method="post"
                        enctype="multipart/form-data">

                        <div class="mb-2">

                            <input type="file"
                                name="cv_file"
                                class="form-control"
                                required>

                        </div>

                        <button type="submit"
                                class="btn btn-primary">

                            Apply

                        </button>

                    </form>

                </div>

            </div>

        </div>

    <?php endforeach; ?>

    </div>

</div>
<div class="mt-4">

    <?= $links ?>

</div>