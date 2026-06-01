<div class="container-fluid p-4">

    <h2>Tambah Lowongan</h2>

    <form method="post" action="<?= site_url('jobs/store') ?>">

        <div class="mb-3">
            <label>Posisi</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label>Perusahaan</label>
            <input type="text" name="company" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="location" class="form-control">
        </div>

        <div class="mb-3">
            <label>Gaji</label>
            <input type="text" name="salary" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">
            Simpan
        </button>

    </form>

</div>

</div>