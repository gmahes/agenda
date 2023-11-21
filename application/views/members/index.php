<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <!-- start content -->
            <h1 class="mt-2">Selamat datang, <?= $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name'); ?></h1>
            <?= $this->session->flashdata('message'); ?>
            <hr>
            <?php foreach ($agenda as $a) : ?>
                <div class="card text-bg-info bg-opacity-100 mb-3">
                    <div class="card-header d-flex justify-content-center"><b><?= $a['agenda_number']; ?></b></div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $a['agenda_program']; ?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            <?php endforeach ?>
            <!-- end content -->
        </div>
    </main>
</div>
</div>