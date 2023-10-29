<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <!-- start content -->
            <h1 class="mt-2">Agenda</h1>
            <!-- Modal Button -->
            <button type="button" class="btn btn-primary btn-sm shadow" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Agenda Baru</button>
            <!-- Modal -->
            <?php $this->load->view('members/templates/modal'); ?>
            <?= $this->session->flashdata('message'); ?>
            <!-- Tabel Agenda -->
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
                            <?php $i = 1 ?>
                            <tr>
                                <th scope="row"><?= $a['agenda_number']; ?></th>
                                <td><?= $a['agenda_program']; ?></td>
                                <td><?= $a['agenda_date']; ?></td>
                                <td><?= $a['agenda_time']; ?></td>
                                <td><?= $a['agenda_place']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm text-nowrap" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit<?= $a['id']; ?>"><i class="fa-xl fa-solid fa-edit" style="color: #eb7d00;"></i></button>
                                    <?php $this->load->view('members/templates/modal_edit'); ?>
                                    <?= form_open('member/delete', 'class="d-inline"'); ?>
                                    <?= form_hidden('id', $a['id']); ?>
                                    <button type="submit" class="btn btn-sm text-nowrap" onclick="return confirm('Anda anda yakin akan menghapus data agenda ini?')" <?= $a['is_verified'] == 1 ? 'hidden' : ''; ?>><i class="fa-xl fa-solid fa-trash-can" style="color: #a80000;"></i></button>
                                    <?= form_close(); ?>
                                </td>
                                <td><?= $a['is_verified'] == 0 ? '<i class="mt-1 fa-solid fa-hourglass-start fa-xl" style="color: #005eff;" title="Dalam Proses Verifikasi"></i>' : '<i class="fa-solid fa-square-check fa-xl" style="color: #026100;"title="Sudah Terverifikasi"></i>'; ?></td>
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