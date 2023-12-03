<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <i class="fa-solid fa-building fa-xl ps-3" style="color: #ffffff;"></i>
    <!-- Navbar Brand-->
    <a class="btn text-light fs-4" href="<?= base_url('member'); ?>">SIMANDA</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm ms-4" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <ul class="navbar-nav d-md-inline-block ms-auto me-0 me-md-3 my-2 my-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <!-- Button trigger modal -->
                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdropPasswd">
                        Ganti Password
                    </button>
                </li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="<?= base_url('member/logout'); ?>">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<?php $this->load->view('members/templates/changepassword') ?>