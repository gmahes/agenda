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
    <link href="<?= base_url(); ?>trash/DataTables/DataTables-1.13.7/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link href="<?= base_url(); ?>trash/DataTables/Responsive-2.5.0/css/responsive.bootstrap5.css" rel="stylesheet">
    <script src="<?= base_url(); ?>trash/DataTables/jQuery-3.7.0/jquery-3.7.0.js"></script>
    <script src="<?= base_url(); ?>trash/DataTables/DataTables-1.13.7/js/jquery.dataTables.js"></script>
    <script src="<?= base_url(); ?>trash/DataTables/DataTables-1.13.7/js/dataTables.bootstrap5.js"></script>
    <script src="<?= base_url(); ?>trash/DataTables/Responsive-2.5.0/js/dataTables.responsive.js"></script>
    <script src="<?= base_url(); ?>trash/DataTables/Responsive-2.5.0/js/responsive.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            $('#agenda').DataTable({
                responsive: false
            });
        });
        $(document).ready(function() {
            $('#employees').DataTable({
                responsive: false
            });
        });
    </script>
</head>

<body class="sb-nav-fixed bg-secondary bg-opacity-25">