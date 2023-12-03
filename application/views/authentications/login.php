<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title; ?></title>
    <link href="<?= base_url(); ?>trash/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-black bg-gradient">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-dark bg-opacity-75">
                                    <h3 class="text-center text-light font-weight-light my-4">Login</h3>
                                    <?= $this->session->flashdata('message'); ?>
                                </div>
                                <div class="card-body bg-dark bg-opacity-75">
                                    <?= form_open('auth'); ?>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputUsername" type="text" placeholder="Username" name="username" />
                                        <label for="inputUsername">Username</label>
                                        <?= form_error('username', '<small class="text-warning">', '</small>'); ?>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password" />
                                        <label for="inputPassword">Password</label>
                                        <?= form_error('password', '<small class="text-warning">', '</small>'); ?>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                        <button type="submit" class="btn btn-success">Login</button>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-black bg-opacity-25 mt-auto">
                <div class="container-fluid px-4">
                    <div class="text-light align-items-center text-center small">Copyright &copy; Kelompok 3 (<?= date('Y'); ?>)</div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>trash/js/scripts.js"></script>
</body>

</html>