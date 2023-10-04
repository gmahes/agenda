<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <!-- start content -->
            <h1 class="mt-4">Master Data Karyawan</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Karyawan Baru</button>
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
                                        <input type="text" class="form-control" id="inputUsername">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-4 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="inputPassword3">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputFirstname" class="col-sm-4 col-form-label">Nama Depan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputFirstname">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputLastname" class="col-sm-4 col-form-label">Nama Belakang</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputLastname">
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
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <?= form_close(); ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                    </tbody>
                </table>
            </div>
            <!-- end content -->
        </div>
    </main>
</div>
</div>