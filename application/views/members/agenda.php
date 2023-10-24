<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <!-- start content -->
            <h1 class="mt-2">Tambah Agenda</h1>
            <div class="table-responsive shadow mt-2">
                <table class="table table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">Nomor Agenda</th>
                            <th scope="col">Agenda</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Tempat</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php foreach ($agenda as $a) : ?>
                            <tr>
                                <th scope="row"><?= $a['agenda_number']; ?></th>
                                <td><?= $a['agenda_program']; ?></td>
                                <td><?= $a['agenda_date']; ?></td>
                                <td><?= $a['agenda_time']; ?></td>
                                <td><?= $a['agenda_place']; ?></td>
                                <td>
                                    <button class="fa-solid fa-pen-to-square" style="color: #ff7300;"></button>
                                    <a href="<?= base_url('member'); ?>" onclick="return false" <?= $a['is_verified'] == 1 ? 'hidden' : ''; ?>><i class="fa-solid fa-trash-can" style="color: #ff0000;"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <!-- end content -->
        </div>
    </main>
</div>
</div>