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
    <link href="<?= base_url(); ?>trash/DataTables/DataTables-1.13.6/css/dataTables.bootstrap5.css" rel="stylesheet">
    <!-- <link href="<?= base_url(); ?>trash/DataTables/datatables.css" rel="stylesheet"> -->
    <script src="<?= base_url(); ?>trash/DataTables/datatables.js"></script>
    <link href="<?= base_url(); ?>trash/DataTables/Select-1.7.0/css/select.bootstrap5.css" rel="stylesheet">
    <script src="<?= base_url(); ?>trash/DataTables/Select-1.7.0/js/dataTables.select.js"></script>
    <script>
        $(document).ready(function() {
            $('#agenda').DataTable({
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                },
                order: [
                    [1, 'asc']
                ],
            });

        });
    </script>
</head>

<body class="sb-nav-fixed bg-secondary bg-opacity-25">