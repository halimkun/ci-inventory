<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="<?= base_url() ?>/styles/vendors/core/core.css">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= base_url() ?>/styles/vendors/simplemde/simplemde.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/styles/vendors/select2/select2.min.css">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url() ?>/styles/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="<?= base_url() ?>/styles/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url() ?>/styles/css/style.css">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="<?= base_url() ?>/styles/images/favicon.png" />
</head>

<body>
    <div class="main-wrapper">

        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                    UMPP
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="sidebar-body">
                <ul class="nav">
                    <li class="nav-item nav-category">Main</li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>" class="nav-link">
                            <i class="link-icon" data-feather="box"></i>
                            <span class="link-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Inventory</li>
                    <li class="nav-item <?= in_array('barang', $segment) ? 'active' : '' ?>">
                        <a class="nav-link" data-bs-toggle="collapse" href="#barang" role="button" aria-expanded="false" aria-controls="barang">
                            <i class="link-icon" data-feather="box"></i>
                            <span class="link-title">Barang</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse show" id="barang">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="<?= base_url('/barang') ?>" class="nav-link <?= end($segment) == 'barang' ? 'active' : '' ?>">Data Barang</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/barang/add') ?>" class="nav-link <?= end($segment) == 'add' ? 'active' : '' ?>"><i class="me-2 icon-md" data-feather="plus-circle"></i> Stok</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/barang/min') ?>" class="nav-link <?= end($segment) == 'min' ? 'active' : '' ?>"><i class="me-2 icon-md" data-feather="minus-circle"></i> Stok</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item <?= in_array('notification', $segment) ? 'active' : '' ?>">
                        <a href="<?= base_url('/notification') ?>" class="nav-link">
                            <i class="link-icon" data-feather="bell"></i>
                            <span class="link-title">Notifikasi</span>
                        </a>
                    </li>
                    <li class="nav-item <?= in_array('activity', $segment) ? 'active' : '' ?>">
                        <a href="<?= base_url('/activity') ?>" class="nav-link">
                            <i class="link-icon" data-feather="activity"></i>
                            <span class="link-title">Aktifitas</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- partial -->

        <div class="page-wrapper">
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="bell"></i>
                                <div class="indicator">
                                    <div class="circle"></div>
                                </div>
                            </a>
                            <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
                                <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                                    <p>6 New Notifications</p>
                                    <a href="javascript:;" class="text-muted">Clear all</a>
                                </div>
                                <div class="p-1">
                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                                        <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                            <i class="icon-sm text-white" data-feather="gift"></i>
                                        </div>
                                        <div class="flex-grow-1 me-2">
                                            <p>New Order Recieved</p>
                                            <p class="tx-12 text-muted">30 min ago</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                                        <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                            <i class="icon-sm text-white" data-feather="alert-circle"></i>
                                        </div>
                                        <div class="flex-grow-1 me-2">
                                            <p>Server Limit Reached!</p>
                                            <p class="tx-12 text-muted">1 hrs ago</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                                        <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                            <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                                        </div>
                                        <div class="flex-grow-1 me-2">
                                            <p>New customer registered</p>
                                            <p class="tx-12 text-muted">2 sec ago</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                                        <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                            <i class="icon-sm text-white" data-feather="layers"></i>
                                        </div>
                                        <div class="flex-grow-1 me-2">
                                            <p>Apps are ready for update</p>
                                            <p class="tx-12 text-muted">5 hrs ago</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                                        <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                            <i class="icon-sm text-white" data-feather="download"></i>
                                        </div>
                                        <div class="flex-grow-1 me-2">
                                            <p>Download completed</p>
                                            <p class="tx-12 text-muted">6 hrs ago</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                                    <a href="javascript:;">View all</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="profile">
                            </a>
                            <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                    <div class="mb-3">
                                        <img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80" alt="">
                                    </div>
                                    <div class="text-center">
                                        <p class="tx-16 fw-bolder">Amiah Burton</p>
                                        <p class="tx-12 text-muted">amiahburton@gmail.com</p>
                                    </div>
                                </div>
                                <ul class="list-unstyled p-1">
                                    <li class="dropdown-item py-2">
                                        <a href="../../pages/general/profile.html" class="text-body ms-0">
                                            <i class="me-2 icon-md" data-feather="user"></i>
                                            <span>Profile</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-item py-2">
                                        <a href="javascript:;" class="text-body ms-0">
                                            <i class="me-2 icon-md" data-feather="edit"></i>
                                            <span>Edit Profile</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-item py-2">
                                        <a href="javascript:;" class="text-body ms-0">
                                            <i class="me-2 icon-md" data-feather="repeat"></i>
                                            <span>Switch User</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-item py-2">
                                        <a href="javascript:;" class="text-body ms-0">
                                            <i class="me-2 icon-md" data-feather="log-out"></i>
                                            <span>Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- partial -->

            <div class="page-content">
                <?= $this->renderSection('content'); ?>
            </div>

            <!-- partial:../../partials/_footer.html -->
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
                <p class="text-muted mb-1 mb-md-0">Copyright © 2021 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>.</p>
                <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
            </footer>
            <!-- partial -->

        </div>
    </div>

    <!-- core:js -->
    <script src="<?= base_url() ?>/styles/vendors/core/core.js"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="<?= base_url() ?>/styles/vendors/simplemde/simplemde.min.js"></script>
    <script src="<?= base_url() ?>/styles/vendors/select2/select2.min.js"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="<?= base_url() ?>/styles/vendors/feather-icons/feather.min.js"></script>
    <script src="<?= base_url() ?>/styles/js/template.js"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="<?= base_url() ?>/styles/js/simplemde.js"></script>
    <script src="<?= base_url() ?>/styles/js/select2.js"></script>
    <!-- End custom js for this page -->
</body>

</html>