<?php foreach ($agenda as $ag) : ?>
    <div class="modal fade" id="staticBackdropEdit<?= $ag['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Agenda</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    <div class="container">
                        <?= form_open('member/edit'); ?>
                        <?= form_hidden('id', $ag['id']); ?>
                        <?= form_hidden('AgendaTaskperson', $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name')); ?>
                        <?= form_hidden('AgendaNumber', $ag['agenda_number']); ?>
                        <div class="row mb-3">
                            <label for="inputAgendaNumber" class="col-sm-3 col-form-label">Nomor Agenda</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" disabled value="<?= $ag['agenda_number']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputAgendaProgram" class="col-sm-3 col-form-label">Agenda</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputAgendaProgram" name="AgendaProgram" value="<?= $ag['agenda_program']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="inputDate" name="Date" min="<?= date("Y-m-d"); ?>" value="<?= $ag['agenda_date']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputTime" class="col-sm-3 col-form-label">Waktu</label>
                            <div class="col-sm-3">
                                <input type="time" class="form-control" id="inputTime" name="Time" value="<?= $ag['agenda_start']; ?>">
                            </div>
                            <label for="inputTimee" class="col-sm-3 col-form-label text-center">s/d</label>
                            <div class="col-sm-3">
                                <input type="time" class="form-control" id="inputTimee" name="Time1" value="<?= $ag['agenda_end']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputAgendaPlace" class="col-sm-3 col-form-label">Tempat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputAgendaPlace" name="AgendaPlace" value="<?= $ag['agenda_place']; ?>">
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