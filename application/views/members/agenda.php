<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-2">Selamat datang, <?= $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name'); ?></h1>
            <!-- start content -->
            <?= $this->session->flashdata('message'); ?>
            <!-- Tabel Agenda -->
            <div class="card mt-2 bg-secondary bg-opacity-10 border-dark shadow-lg">
                <div class="card-header d-flex align-middle">
                    <div class="col-sm-12 col-md-6 float-start">
                        <h3 class="">Daftar Agenda</h3>
                    </div>
                    <!-- Modal Button -->
                    <div class="col-sm-12 col-md-6 float-end">
                        <button type="button" class="btn btn-primary shadow float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Agenda Baru</button>
                        <!-- Modal -->
                        <?php $this->load->view('members/templates/addagenda'); ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="agenda" class="table table-striped table-hover text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="text-center">Nomor Agenda</th>
                                    <th scope="col" class="text-center">Agenda</th>
                                    <th scope="col" class="text-center">Tanggal</th>
                                    <th scope="col" class="text-center">Waktu</th>
                                    <th scope="col" class="text-center">Tempat</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($agenda as $a) : ?>
                                    <tr>
                                        <th scope="row"><?= $a['agenda_number']; ?></th>
                                        <td><?= $a['agenda_program']; ?></td>
                                        <td><?= $a['agenda_date']; ?></td>
                                        <td><?= $a['agenda_time']; ?></td>
                                        <td><?= $a['agenda_place']; ?></td>
                                        <td>
                                            <div class="d-inline-flex">
                                                <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit<?= $a['id']; ?>" title="Edit Agenda" <?= $a['is_verified'] == 'accepted'  ? 'hidden' : ($a['is_verified'] == 'declined' ? 'hidden' : ' '); ?>><i class="fa-xl fa-solid fa-edit" style="color: #eb7d00;"></i></button>
                                                <?php $this->load->view('members/templates/editagenda'); ?>
                                                <?= form_open('member/delete'); ?>
                                                <?= form_hidden('id', $a['id']); ?>
                                                <button type="submit" class="btn btn-sm" onclick="return confirm('Anda anda yakin akan menghapus data agenda ini?')" <?= $a['is_verified'] == 'accepted'  ? 'hidden' : ($a['is_verified'] == 'declined' ? 'hidden' : ' '); ?> title="Hapus Agenda"><i class="fa-xl fa-solid fa-trash-can" style="color: #a80000;"></i></button>
                                            </div>
                                            <?= form_close(); ?>
                                        </td>
                                        <td><i class="fa-solid <?= $a['is_verified'] == 'not_verified' ? 'fa-hourglass-start ' : ($a['is_verified'] == 'accepted' ? 'fa-square-check ' : 'fa-ban'); ?>fa-xl mt-1" style="<?= $a['is_verified'] == 'not_verified' ? 'color: #005eff;' : ($a['is_verified'] == 'accepted' ? 'color: #026100;' : 'color: #ff0000;'); ?>" title="<?= $a['is_verified'] == 'not_verified' ? 'Dalam Proses Verifikasi' : ($a['is_verified'] == 'accepted' ? 'Disetujui' : 'Ditolak'); ?>"></i></td>
                                        <td></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end content -->
        </div>
    </main>
</div>
</div>