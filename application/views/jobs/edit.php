<div class="container-fluid p-4">

    <h2>Edit Lowongan</h2>

    <form method="post" action="<?= site_url('jobs/update/'.$job->id) ?>">

        <div class="mb-3">
            <label>Posisi</label>
            <input type="text" 
                   name="title"
                   value="<?= $job->title ?>"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Perusahaan</label>
            <input type="text"
                   name="company"
                   value="<?= $job->company ?>"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control"><?= $job->description ?></textarea>
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text"
                   name="location"
                   value="<?= $job->location ?>"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Gaji</label>
            <input type="text"
                   name="salary"
                   value="<?= $job->salary ?>"
                   class="form-control">
        </div>

        <button type="submit" class="btn btn-success">
            Update
        </button>

    </form>

</div>

</div>