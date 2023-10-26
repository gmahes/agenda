<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <!-- start content -->
            <h1 class="mt-2">Agenda</h1>
            <button type="button" class="btn btn-primary btn-sm shadow" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Agenda Baru</button>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Karyawan Baru</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <?= form_open('member/create'); ?>
                                <?= form_hidden('AgendaTaskperson', $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name')); ?>
                                <div class="row mb-3">
                                    <label for="inputAgendaNumber" class="col-sm-4 col-form-label">Nomor Agenda</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputAgendaNumber" name="AgendaNumber">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputAgendaProgram" class="col-sm-4 col-form-label">Agenda</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputAgendaProgram" name="AgendaProgram">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-4 col-form-label">Tanggal</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" id="inputDate" name="Date">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputTime" class="col-sm-4 col-form-label">Waktu</label>
                                    <div class="col-sm-8">
                                        <input type="time" class="form-control" id="inputTime" name="Time">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputAgendaPlace" class="col-sm-4 col-form-label">Tempat</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputAgendaPlace" name="AgendaPlace">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-end">Tambah</button>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                    <a class="fa-solid fa-pen-to-square fa-lg" style="color: #ff7300;" <?= $a['is_verified'] == 1 ? 'hidden' : ''; ?>></a>
                                    <a <?= $a['is_verified'] == 1 ? 'hidden' : ''; ?>><i class="fa-solid fa-trash-can fa-lg" style="color: #ff0000;"></i></a>
                                </td>
                                <td><?= $a['is_verified'] == 0 ? '<i class="fa-solid fa-hourglass-start fa-xl" style="color: #005eff;" title="Dalam Proses Verifikasi"></i>' : '<i class="fa-solid fa-square-check fa-xl" style="color: #026100;"title="Sudah Terverifikasi"></i>'; ?></td>
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