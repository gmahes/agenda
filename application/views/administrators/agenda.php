<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <!-- start content -->
            <h1 class="mt-2">Agenda</h1>
            <div class="table-responsive shadow mt-2">
                <table class="table table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">Nomor Agenda</th>
                            <th scope="col">Agenda</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Tempat</th>
                            <th scope="col">Aksi</th>
                            <th scope="col">Status</th>
                            <th scope="col">Keterangan</th>
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
                                <td>
                                    <?= $a['is_verified'] == 0 ?
                                        '<div class="dropdown-center">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          Pilih
                                        </button>
                                        <ul class="dropdown-menu">
                                        <li><a class="dropdown-item text-success text-center" href="#">Setuju</a></li>
                                        <li><a class="dropdown-item text-center text-danger" href="#">Tolak</a></li>
                                        </ul>
                                        </div>' :
                                        ''; ?>
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
    </main>
</div>
</div>