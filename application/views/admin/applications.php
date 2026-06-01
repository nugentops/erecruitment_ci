<div class="container mt-5">

    <h2 class="mb-4">Data Lamaran</h2>

    <a href="<?= site_url('admin/export_pdf') ?>"
        class="btn btn-danger mb-3">
            Export PDF
    </a>

    <a href="<?= site_url('admin/export_excel') ?>"
        class="btn btn-success mb-3">
            Export Excel
    </a>

    <table class="table table-bordered">

        <thead>

            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Pelamar</th>
                <th>Lowongan</th>
                <th>Status</th>
                <th>Catatan Hrd</th>
                <th>CV</th>
                <th>Action</th>
            </tr>

        </thead>

        <tbody>

        <?php $no = 1; ?>

        <?php foreach($applications as $app): ?>

            <tr>

                <td><?= $no++ ?></td>

                <td class="text-center">

                    <?php if(!empty($app->photo)): ?>

                        <img src="<?= base_url('uploads/profile/'.$app->photo) ?>"
                            width="60"
                            height="60"
                            class="rounded-circle shadow">

                    <?php else: ?>

                        <img src="https://via.placeholder.com/60"
                            class="rounded-circle">

                    <?php endif; ?>

                </td>

                <td>
                    <strong><?= $app->full_name ?></strong>
                    <br>
                    <small class="text-muted">
                        <?= $app->username ?>
                    </small>
                </td>

                <td><?= $app->title ?></td>

                <td><?= $app->status ?></td>

                <td><?= $app->notes ?></td>

                <td>

                    <form action="<?= site_url('admin/update_status') ?>"
                        method="post">

                        <input type="hidden"
                            name="id"
                            value="<?= $app->id ?>">

                        <select name="status"
                                class="form-control mb-2">

                            <option value="pending">Pending</option>

                            <option value="reviewed">Reviewed</option>

                            <option value="interview">Interview</option>

                            <option value="accepted">Accepted</option>

                            <option value="rejected">Rejected</option>

                        </select>

                        <textarea name="notes"
                                class="form-control mb-2"
                                placeholder="Catatan HRD"></textarea>

                        <button type="submit"
                                class="btn btn-primary btn-sm">

                            Update

                        </button>

                    </form>

                    </td>

                <td>

                    <a href="<?= base_url('uploads/'.$app->cv_file) ?>"
                       target="_blank"
                       class="btn btn-success btn-sm">

                       Lihat CV

                    </a>

                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>