<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <!-- start content -->
            <h1 class="mt-2">Master Data Karyawan</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm shadow" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Karyawan Baru</button>
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
                                <?= form_open('administrator/create'); ?>
                                <div class="row mb-3">
                                    <label for="inputUsername" class="col-sm-4 col-form-label">Username</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputUsername" name="username">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-4 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="inputPassword3" name="password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputFirstname" class="col-sm-4 col-form-label">Nama Depan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputFirstname" name="first_name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputLastname" class="col-sm-4 col-form-label">Nama Belakang</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputLastname" name="last_name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputLastname" class="col-sm-4 col-form-label">Jabatan</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" aria-label=".form-select-sm example" name="role">
                                            <option selected>Silahkan pilih jabatan</option>
                                            <option value="0">Member</option>
                                            <option value="1">Administrator</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-end">Tambah</button>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <div class="table-responsive shadow-lg mt-2">
                <?php $i = 1; ?>
                <table class="table table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Nama Depan</th>
                            <th scope="col">Nama Belakang</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php foreach ($user as $u) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $u['first_name']; ?></td>
                                <td><?= $u['last_name']; ?></td>
                                <td><?= $u['role'] == 1 ? 'Administrator' : 'Member'; ?></td>
                                <td><button class="btn btn-danger btn-sm">Hapus</button></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
</div>