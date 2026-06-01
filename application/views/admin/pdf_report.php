<h2>Laporan Pelamar</h2>

<table border="1"
       width="100%"
       cellspacing="0"
       cellpadding="5">

    <tr>

        <th>No</th>
        <th>Nama</th>
        <th>Lowongan</th>
        <th>Status</th>
        <th>Catatan</th>

    </tr>

    <?php $no = 1; ?>

    <?php foreach($applications as $app): ?>

    <tr>

        <td><?= $no++ ?></td>

        <td><?= $app->username ?></td>

        <td><?= $app->title ?></td>

        <td><?= $app->status ?></td>

        <td><?= $app->notes ?></td>

    </tr>

    <?php endforeach; ?>

</table>