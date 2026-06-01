<!-- Content -->
<div class="container-fluid p-4">

    <h1 class="mb-4">Dashboard Admin</h1>

    <div class="alert alert-success">
        Selamat datang, <?= $this->session->userdata('username'); ?>
    </div>

    <div class="row">

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Total Lowongan</h5>
                    <h2><?= $total_jobs ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Total Pelamar</h5>
                    <h2><?= $total_applicants ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Total Lamaran</h5>
                    <h2><?= $total_applications ?></h2>
                </div>
            </div>
        </div>

    </div>

    <hr>
        <div class="card shadow mt-4">

            <div class="card-body" style="height:250px;">

                <h4>Statistik Status Lamaran</h4>
                <canvas id="statusChart"></canvas>

            </div>

        </div>

</div>

<script>

window.onload = function(){

    const ctx =
    document.getElementById('statusChart');

    console.log(Chart);

    new Chart(ctx, {

        type: 'bar',

        data: {

            labels: [

                <?php foreach($status_chart as $s): ?>

                    '<?= ucfirst($s->status) ?>',

                <?php endforeach; ?>

            ],

            datasets: [{

                label: 'Jumlah Lamaran',

                data: [

                    <?php foreach($status_chart as $s): ?>

                        <?= $s->total ?>,

                    <?php endforeach; ?>

                ]

            }]

        }

    });

};

</script>

</div>