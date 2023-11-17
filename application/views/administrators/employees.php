<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-2">Selamat datang, <?= $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name'); ?></h1>
            <!-- start content -->
            <?= $this->session->flashdata('message'); ?>
            <!-- Button trigger modal -->
            <div class="card mt-2 bg-secondary bg-opacity-10 border-dark shadow-lg">
                <div class="card-header d-flex align-middle">
                    <div class="col-sm-12 col-md-6 float-start">
                        <h3 class="">Daftar Agenda</h3>
                    </div>
                    <div class="col-sm-12 col-md-6 text-end">
                        <button type="button" class="btn btn-primary shadow mt-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Karyawan Baru</button>
                        <!-- Modal -->
                        <?php $this->load->view('administrators/templates/addemployee'); ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php $i = 1; ?>
                        <table id="employees" class="table table-striped table-hover text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="text-center">Nomor</th>
                                    <th scope="col" class="text-center">Nama Depan</th>
                                    <th scope="col" class="text-center">Nama Belakang</th>
                                    <th scope="col" class="text-center">Role</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user as $u) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $u['first_name']; ?></td>
                                        <td><?= $u['last_name']; ?></td>
                                        <td><?= $u['role'] == 1 ? 'Administrator' : 'Member'; ?></td>
                                        <td>
                                            <div class="d-inline-flex">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit<?= $u['id']; ?>">
                                                    <i class="fa-xl fa-solid fa-edit" style="color: #eb7d00;"></i>
                                                </button>
                                                <!-- Modal -->
                                                <?php $this->load->view('administrators/templates/editemployee'); ?>
                                                <?= form_open('administrator/delete'); ?>
                                                <?= form_hidden('id', $u['id']); ?>
                                                <button type="submit" class="btn btn-sm" onclick="return confirm('Anda anda yakin akan menghapus data karyawan ini?')"><i class="fa-xl fa-solid fa-trash-can" style="color: #a80000;"></i></button>
                                                <?= form_close(); ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</div>