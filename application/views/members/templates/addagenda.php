<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Agenda Baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <?= form_open('member/create'); ?>
                    <?= form_hidden('user_id', $this->session->userdata('id')); ?>
                    <?= form_hidden('AgendaTaskperson', $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name')); ?>
                    <?php foreach ($count as $c) : ?>
                        <?= form_hidden('AgendaNumber', date('Y') . date('m') . date('d') . $c['AUTO_INCREMENT']); ?>
                        <div class="row mb-3">
                            <label for="inputAgendaNumber" class="col-sm-3 col-form-label">Nomor Agenda</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" disabled value="<?= date('Y') . date('m') . date('d') . $c['AUTO_INCREMENT']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputAgendaProgram" class="col-sm-3 col-form-label">Agenda</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputAgendaProgram" name="AgendaProgram">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="inputDate" name="Date" min="<?= date("Y-m-d"); ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputTime" class="col-sm-3 col-form-label">Waktu</label>
                            <div class="col-sm-3">
                                <input type="time" class="form-control" id="inputTime" name="Time">
                            </div>
                            <label for="inputTimee" class="col-sm-3 col-form-label text-center">s/d</label>
                            <div class="col-sm-3">
                                <input type="time" class="form-control" id="inputTimee" name="Time1">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputAgendaPlace" class="col-sm-3 col-form-label">Tempat</label>
                            <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" id="inputAgendaPlace" name="AgendaPlace"> -->
                                <select class="form-select" aria-label="Default select example" name="AgendaPlace">
                                    <option selected>Silahkan pilih...</option>
                                    <option value="Ruang Rapat">Ruang Rapat</option>
                                    <option value="Ruang Aula">Ruang Aula</option>
                                    <option value="Ruang Direksi">Ruang Direksi</option>
                                </select>
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