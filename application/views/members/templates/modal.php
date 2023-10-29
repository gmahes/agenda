<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Agenda Baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <?= form_open('member/create'); ?>
                    <?= form_hidden('AgendaTaskperson', $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name')); ?>
                    <?php foreach ($count as $c) : ?>
                        <?= form_hidden('AgendaNumber', date('Y') . date('m') . date('d') . $c['AUTO_INCREMENT']); ?>
                        <div class="row mb-3">
                            <label for="inputAgendaNumber" class="col-sm-4 col-form-label">Nomor Agenda</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" disabled value="<?= date('Y') . date('m') . date('d') . $c['AUTO_INCREMENT']; ?>">
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
                    <?php endforeach ?>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>