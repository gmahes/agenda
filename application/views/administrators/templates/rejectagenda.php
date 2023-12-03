<?php foreach ($agenda as $ag) : ?>
    <div class="modal fade" id="staticBackdropReject<?= $ag['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tolak Agenda</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    <div class="container">
                        <?= form_open('administrator/reject'); ?>
                        <?= form_hidden('id', $ag['id']); ?>
                        <?= form_hidden('AgendaNumber', $ag['agenda_number']); ?>
                        <div class="row mb-3">
                            <label for="inputAgendaNumber" class="col-sm-4 col-form-label">Nomor Agenda</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" disabled value="<?= $ag['agenda_number']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputAgendaProgram" class="col-sm-4 col-form-label">Keterangan</label>
                            <div class="form-floating col-sm-8">
                                <textarea class="form-control" id="floatingTextarea2" style="height: 100px" name="annotation"></textarea>
                                <label for="floatingTextarea2">&nbsp;&nbsp;Isi Keterangan Penolakan Agenda</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger float-end">Tolak</button>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>