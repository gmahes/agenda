<?php foreach ($user as $us) : ?>
    <div class="modal fade" id="staticBackdropEdit<?= $us['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Karyawan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    <div class="container">
                        <?= form_open('administrator/edit'); ?>
                        <?= form_hidden('username', $us['username']); ?>
                        <?= form_hidden('id', $us['id']); ?>
                        <div class="row mb-3">
                            <label for="inputUsername" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputUsername" name="username" value="<?= $us['username']; ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputFirstname" class="col-sm-4 col-form-label">Nama Depan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputFirstname" name="first_name" value="<?= $us['first_name']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputLastname" class="col-sm-4 col-form-label">Nama Belakang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputLastname" name="last_name" value="<?= $us['last_name']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputLastname" class="col-sm-4 col-form-label">Jabatan</label>
                            <div class="col-sm-8">
                                <select class="form-select" aria-label=".form-select-sm example" name="role">
                                    <option selected value="">Silahkan pilih jabatan</option>
                                    <option value="0">Member</option>
                                    <option value="1">Administrator</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Simpan</button>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>