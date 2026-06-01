<div class="container-fluid p-4">

    <h2 class="mb-4">
        Data Pelamar
    </h2>

    <form method="get"
      action="<?= site_url('admin/applicants') ?>"
        class="mb-3">

        <div class="row">

            <div class="col-md-4">

                <input type="text"
                    name="keyword"
                    class="form-control"
                    placeholder="Cari nama, username atau email..."
                    value="<?= $this->input->get('keyword') ?>">

            </div>

            <div class="col-md-2">

                <button class="btn btn-primary">
                    Search
                </button>

                <a href="<?= site_url('admin/applicants') ?>"
                class="btn btn-secondary">

                    Reset

                </a>

            </div>

        </div>

    </form>

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>

            </tr>

        </thead>

        <tbody>

        <?php
            $no = $this->uri->segment(3) + 1;
        ?>

        <?php foreach($applicants as $a): ?>

            <tr>

                <td><?= $no++ ?></td>

                <td><?= $a->full_name ?></td>

                <td><?= $a->username ?></td>

                <td><?= $a->email ?></td>

                <td><?= $a->phone ?></td>

                <td>
                    <a href="<?= site_url('admin/detail_applicant/'.$a->id) ?>"
                    class="btn btn-info btn-sm">
                        Detail
                    </a>
                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

    <div class="mt-3">
        <?= $links ?>
    </div>  

</div>