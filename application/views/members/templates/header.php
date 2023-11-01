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
    <link href="<?= base_url(); ?>trash/DataTables/datatables.css" rel="stylesheet">
    <script src="<?= base_url(); ?>trash/DataTables/datatables.js"></script>
    <script>
        $(document).ready(function() {
            $('#agenda').DataTable();

        });
    </script>
</head>

<body class="sb-nav-fixed bg-secondary bg-opacity-25">