<div class="container mt-5">

    <h2 class="mb-4">Status Lamaran Saya</h2>

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>No</th>
                <th>Lowongan</th>
                <th>Status</th>
                <th>Catatan Hrd</th>

            </tr>

        </thead>

        <tbody>

        <?php $no = 1; ?>

        <?php foreach($applications as $app): ?>

            <tr>

                <td><?= $no++ ?></td>

                <td><?= $app->title ?></td>

                <td>

                    <?php if($app->status == 'pending'): ?>

                        <span class="badge bg-secondary">
                            Pending
                        </span>

                    <?php elseif($app->status == 'reviewed'): ?>

                        <span class="badge bg-info">
                            Reviewed
                        </span>

                    <?php elseif($app->status == 'interview'): ?>

                        <span class="badge bg-warning">
                            Interview
                        </span>

                    <?php elseif($app->status == 'accepted'): ?>

                        <span class="badge bg-success">
                            Accepted
                        </span>

                    <?php elseif($app->status == 'rejected'): ?>

                        <span class="badge bg-danger">
                            Rejected
                        </span>

                    <?php endif; ?>

                </td>

                <td>
                    <?= $app->notes ? $app->notes : '-' ?>
                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>