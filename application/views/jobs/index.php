<div class="container-fluid p-4">

    <div class="d-flex justify-content-between mb-3">
        <h2>Data Lowongan</h2>

        <a href="<?= site_url('jobs/create') ?>" class="btn btn-primary">
            Tambah Lowongan
        </a>
    </div>

    <form method="get"
        action="<?= site_url('jobs') ?>"
        class="mb-3">

        <div class="row">

            <div class="col-md-4">

                <input type="text"
                    name="keyword"
                    class="form-control"
                    placeholder="Cari posisi atau perusahaan..."
                    value="<?= $this->input->get('keyword') ?>">

            </div>

            <div class="col-md-2">

                <button type="submit"
                        class="btn btn-primary">

                    Search

                </button>

                <a href="<?= site_url('jobs') ?>"
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
                <th>Posisi</th>
                <th>Perusahaan</th>
                <th>Lokasi</th>
                <th>Gaji</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php
            $no = $this->uri->segment(3) + 1;
                foreach($jobs as $job):
        ?>

            <tr>
                <td><?= $no++ ?></td>
                <td><?= $job->title ?></td>
                <td><?= $job->company ?></td>
                <td><?= $job->location ?></td>
                <td><?= $job->salary ?></td>
                <td>
                    <a href="<?= site_url('jobs/edit/'.$job->id) ?>" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <a href="<?= site_url('jobs/delete/'.$job->id) ?>" 
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin hapus data?')">
                        Delete
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

</div>