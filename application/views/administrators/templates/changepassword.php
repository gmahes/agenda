<!-- Modal -->
<div class="modal fade" id="staticBackdropPasswd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelPasswd" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabelPasswd">Ganti Password Akun</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <div class="container">
                    <?= form_open('administrator/passwd'); ?>
                    <div class="row mb-3">
                        <label for="inputOldPasswd" class="col-sm-4 col-form-label">Password Lama</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control d-inline" id="inputOldPasswd" name="OldPassword">
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <label for="inputNewPasswd" class="col-sm-4 col-form-label">Password Baru</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="inputNewPasswd" name="NewPassword">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNewPasswd1" class="col-sm-4 col-form-label">Ulangi Password Baru</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="inputNewPasswd1" name="NewPassword1">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Simpan</button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>