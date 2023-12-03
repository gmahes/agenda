<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <!-- start content -->
            <h1 class="mt-2">Selamat datang, <?= $this->session->userdata('first_name') . $this->session->userdata('last_name'); ?></h1>
            <?= $this->session->flashdata('message'); ?>
            <div class="card mt-2 bg-secondary bg-opacity-10 border-dark shadow-lg">
                <div class="card-header d-flex align-middle">
                    <div class="col-sm-12 col-md-6 float-start">
                        <h3 class="">Riwayat Pengajuan Agenda</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover text-center" id="agenda_history">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="text-center align-middle">Nomor Agenda</th>
                                    <th scope="col" class="text-center align-middle">Agenda</th>
                                    <th scope="col" class="text-center align-middle">Tanggal</th>
                                    <th scope="col" class="text-center align-middle">Waktu</th>
                                    <th scope="col" class="text-center align-middle">Tempat</th>
                                    <th scope="col" class="text-center align-middle">Pembuat Agenda</th>
                                    <th scope="col" class="text-center align-middle">Status</th>
                                    <th scope="col" class="text-center align-middle">Validator Agenda</th>
                                    <th scope="col" class="text-center align-middle">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php foreach ($agenda as $a) : ?>
                                    <tr>
                                        <th scope="row" class="align-middle"><?= $a['agenda_number']; ?></th>
                                        <td class="align-middle"><?= $a['agenda_program']; ?></td>
                                        <td class="align-middle"><?= date("d/m/Y", strtotime($a['agenda_date'])); ?></td>
                                        <td class="align-middle">
                                            <?= date('H:i', strtotime($a['agenda_start'])); ?><p class="d-inline"> s/d </p><?= date('H:i', strtotime($a['agenda_end'])); ?>
                                        </td>
                                        <td class="align-middle"><?= $a['agenda_place']; ?></td>
                                        <td class="align-middle"><?= $a['agenda_taskperson']; ?></td>
                                        <td class="align-middle"><i class="fa-solid <?= $a['is_verified'] == 'not_verified' ? 'fa-hourglass-start ' : ($a['is_verified'] == 'accepted' ? 'fa-square-check ' : 'fa-ban '); ?>fa-xl mt-1" style="<?= $a['is_verified'] == 'not_verified' ? 'color: #005eff;' : ($a['is_verified'] == 'accepted' ? 'color: #026100;' : 'color: #ff0000;'); ?>" title="<?= $a['is_verified'] == 'not_verified' ? 'Dalam Proses Verifikasi' : ($a['is_verified'] == 'accepted' ? 'Disetujui' : 'Ditolak'); ?>"></i></td>
                                        <td class="align-middle"><?= $a['agenda_validator']; ?></td>
                                        <td class="align-middle"><?= $a['agenda_annotation']; ?></td>
                                    </tr>
                                    <?php $this->load->view('administrators/templates/rejectagenda'); ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end content -->
                </div>
            </div>
        </div>
    </main>
</div>
</div>