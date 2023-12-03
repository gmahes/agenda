<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <!-- start content -->
            <h1 class="mt-2">Selamat datang, <?= $this->session->userdata('first_name') . $this->session->userdata('last_name'); ?></h1>
            <?= $this->session->flashdata('message'); ?>
            <hr>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card text-bg-warning bg-opacity-100">
                        <div class="card-header">
                            <h5 class="card-title text-center">Total Pengajuan Agenda</h5>
                        </div>
                        <div class="card-body mx-auto text-center">
                            <h1 class="card-text"><?= $agenda_count; ?></h1>
                            <h6 class="card-text">AGENDA</h6>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-bg-success bg-opacity-100">
                        <div class="card-header">
                            <h5 class="card-title text-center">Total Agenda Disetujui</h5>
                        </div>
                        <div class="card-body mx-auto text-center">
                            <h1 class="card-text"><?= $agenda_approve; ?></h1>
                            <h6 class="card-text">AGENDA</h6>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-bg-danger bg-opacity-100">
                        <div class="card-header">
                            <h5 class="card-title text-center">Total Agenda Ditolak</h5>
                        </div>
                        <div class="card-body mx-auto text-center">
                            <h1 class="card-text"><?= $agenda_reject; ?></h1>
                            <h6 class="card-text">AGENDA</h6>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card mt-2 bg-secondary bg-opacity-10 border-dark shadow-lg">
                <div class="card-header d-inline text-center">
                    <h3 class="">Agenda Terjadwal</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover text-center" id="agenda_index">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="text-center align-middle">Nomor Agenda</th>
                                    <th scope="col" class="text-center align-middle">Agenda</th>
                                    <th scope="col" class="text-center align-middle">Tanggal</th>
                                    <th scope="col" class="text-center align-middle">Waktu</th>
                                    <th scope="col" class="text-center align-middle">Tempat</th>
                                    <th scope="col" class="text-center align-middle">Pembuat Agenda</th>
                                    <th scope="col" class="text-center align-middle">Validator Agenda</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php foreach ($agenda_scheduled as $a) : ?>
                                    <tr>
                                        <th scope="row" class="align-middle"><?= $a['agenda_number']; ?></th>
                                        <td class="align-middle"><?= $a['agenda_program']; ?></td>
                                        <td class="align-middle"><?= date("d/m/Y", strtotime($a['agenda_date'])); ?></td>
                                        <td class="align-middle">
                                            <?= date('H:i', strtotime($a['agenda_start'])); ?><p class="d-inline"> s/d </p><?= date('H:i', strtotime($a['agenda_end'])); ?>
                                        </td>
                                        <td class="align-middle"><?= $a['agenda_place']; ?></td>
                                        <td class="align-middle"><?= $a['agenda_taskperson']; ?></td>
                                        <td class="align-middle"><?= $a['agenda_validator']; ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end content -->
                </div>
            </div>
            <!-- end content -->
        </div>
    </main>
</div>
</div>