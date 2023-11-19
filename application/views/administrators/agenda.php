<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <!-- start content -->
            <h1 class="mt-2">Selamat datang, <?= $this->session->userdata('last_name'); ?></h1>
            <div class="card mt-2 bg-secondary bg-opacity-10 border-dark shadow-lg">
                <div class="card-header d-flex align-middle">
                    <div class="col-sm-12 col-md-6 float-start">
                        <h3 class="">Daftar Agenda</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover text-center" id="agenda">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="text-center">Nomor Agenda</th>
                                    <th scope="col" class="text-center">Agenda</th>
                                    <th scope="col" class="text-center">Tanggal</th>
                                    <th scope="col" class="text-center">Waktu</th>
                                    <th scope="col" class="text-center">Tempat</th>
                                    <th scope="col" class="text-center">Pembuat Agenda</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php foreach ($agenda as $a) : ?>
                                    <tr>
                                        <th scope="row"><?= $a['agenda_number']; ?></th>
                                        <td><?= $a['agenda_program']; ?></td>
                                        <td><?= $a['agenda_date']; ?></td>
                                        <td><?= $a['agenda_time']; ?></td>
                                        <td><?= $a['agenda_place']; ?></td>
                                        <td><?= $a['agenda_taskperson']; ?></td>
                                        <td>
                                            <div class="dropdown-center">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Pilih Aksi
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <?= form_open('administrator/approve'); ?>
                                                        <?= form_hidden('id', $a['id']); ?>
                                                        <button type="submit" class="dropdown-item text-success text-center" onclick="return confirm('Anda anda yakin akan mennyetujui agenda ini?')">Setuju</button>
                                                        <?= form_close(); ?>
                                                    </li>
                                                    <hr class="dropdown-divider">
                                                    <li><button class="dropdown-item text-center text-danger" href="#">Tolak</button></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td><?= $a['is_verified'] == 0 ? '<i class="fa-solid fa-hourglass-start fa-xl" style="color: #005eff;" title="Menunggu Verifikasi"></i>' : '<i class="fa-solid fa-square-check fa-xl" style="color: #026100;"title="Sudah Terverifikasi"></i>'; ?></td>
                                        <td></td>
                                    </tr>
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