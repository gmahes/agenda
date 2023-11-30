<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <!-- start content -->
            <h1 class="mt-2">Selamat datang, <?= $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name'); ?></h1>
            <?= $this->session->flashdata('message'); ?>
            <hr>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card text-bg-warning bg-opacity-100">
                        <div class="card-header">
                            <h5 class="card-title text-center">Total Pengajuan Agenda</h5>
                        </div>
                        <div class="card-body d-inline-flex mx-auto">
                            <h3 class="card-text">2</h3>
                            <h5 class="mt-2"> &nbsp; Agenda</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-bg-success bg-opacity-100">
                        <div class="card-header">
                            <h5 class="card-title text-center">Total Agenda Di Approve</h5>
                        </div>
                        <div class="card-body d-inline-flex mx-auto">
                            <h3 class="card-text">2</h3>
                            <h5 class="mt-2"> &nbsp; Agenda</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-bg-primary bg-opacity-100">
                        <div class="card-header">
                            <h5 class="card-title text-center">Total Agenda Terjadwal</h5>
                        </div>
                        <div class="card-body d-inline-flex mx-auto">
                            <h3 class="card-text">2</h3>
                            <h5 class="mt-2"> &nbsp; Agenda</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end content -->
        </div>
    </main>
</div>
</div>