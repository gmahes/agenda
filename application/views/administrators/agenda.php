<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <!-- start content -->
            <h1 class="mt-2">Selamat datang, <?= $this->session->userdata('first_name') . $this->session->userdata('last_name'); ?></h1>
            <?= $this->session->flashdata('message'); ?>
            <div class="card mt-2 bg-secondary bg-opacity-10 border-dark shadow-lg">
                <div class="card-header d-flex align-middle">
                    <div class="col-sm-12 col-md-6 float-start">
                        <h3 class="">Daftar Pengajuan Agenda</h3>
                    </div>
                    <div class="col-sm-12 col-md-6 float-end text-end">
                        <a href="<?= base_url('administrator/history'); ?>" class="btn btn-primary">Riwayat Agenda</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover text-center" id="agenda">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="text-center align-middle">Nomor Agenda</th>
                                    <th scope="col" class="text-center align-middle">Agenda</th>
                                    <th scope="col" class="text-center align-middle">Tanggal</th>
                                    <th scope="col" class="text-center align-middle">Waktu</th>
                                    <th scope="col" class="text-center align-middle">Tempat</th>
                                    <th scope="col" class="text-center align-middle">Pembuat Agenda</th>
                                    <th scope="col" class="text-center align-middle">Aksi</th>
                                    <th scope="col" class="text-center align-middle">Status</th>
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
                                        <td class="align-middle">
                                            <div class="dropdown-center">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Pilih Aksi
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <?= form_open('administrator/approve'); ?>
                                                        <?= form_hidden('id', $a['id']); ?>
                                                        <button type="submit" class="dropdown-item text-success text-center" onclick="return confirm('Apakah anda yakin akan menyetujui agenda ini?')">Setuju</button>
                                                        <?= form_close(); ?>
                                                    </li>
                                                    <hr class="dropdown-divider">
                                                    <li>
                                                        <?= form_open('administrator/reject'); ?>
                                                        <?= form_hidden('id', $a['id']); ?>
                                                        <button type="button" class="btn dropdown-item text-center text-danger" data-bs-toggle="modal" data-bs-target="#staticBackdropReject<?= $a['id']; ?>">Tolak</button>
                                                        <?= form_close(); ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="align-middle"><?= $a['is_verified'] == 'not_verified' ? '<i class="fa-solid fa-hourglass-start fa-xl" style="color: #005eff;" title="Menunggu Verifikasi"></i>' : '<i class="fa-solid fa-square-check fa-xl" style="color: #026100;"title="Sudah Terverifikasi"></i>'; ?></td>
                                        <td></td>
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