<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content>
    <meta name="author" content>

    <title>DS Tenaga Pendidik</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="assets/css/card-dashboard.css" rel="stylesheet">
    <!-- Menambahkan favicon -->
    <link rel="icon" href="assets/img/Unjani.png" type="img/png">


    <!-- Menambahkan favicon -->
    <link rel="icon" href="assets/img/Unjani.png" type="image/png">


</head>

<body id="page-top">
    <!-- Loading Spinner -->
    <div id="loading-spinner" style="position: fixed; width: 100%; height: 100%; background: white; top: 0; left: 0; z-index: 9999; display: flex; justify-content: center; align-items: center;">
        <div class="spinner-border text-success" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('DashboardTendik'); ?>">
                <div class="sidebar-brand-icon d-inline-block">
                    <img src="assets/img/Unjani.png">
                </div>
                <div class="sidebar-brand-text">
                    Access Track
                </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('DashboardTendik'); ?>">
                    <i class="fas fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkses"
                    aria-expanded="true" aria-controls="collapseAkses">
                    <i class="fas fa-id-card"></i>
                    <span>Menu Kartu Akses</span>
                </a>
                <div id="collapseAkses" class="collapse" aria-labelledby="headingAkses" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <div class="menu-list">
                            <a class="collapse-item" href="<?php echo site_url('Pengajuan_akses'); ?>">
                                <i class="fas fa-id-card mr-2"></i>Pengajuan Kartu Akses
                            </a>
                            <a class="collapse-item" href="<?php echo site_url('Pelaporan_keluhan'); ?>">
                                <i class="fas fa-exclamation-circle mr-2"></i>Pelaporan Keluhan
                            </a>
                            <a class="collapse-item" href="<?php echo site_url('Pengajuan_subdomain'); ?>">
                                <i class="fas fa-globe mr-2"></i>Pengajuan Sub Domain
                            </a>
                        </div>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small username-text">NIP</span>
                                    <img class="img-profile rounded-circle" src="assets/img/undraw_profile.svg" alt="Profile Picture">
                                </div>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" style="padding-left: 20px; padding-right: 20px;">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Selamat Datang, Nama</h1>
                    </div>

                    <!-- Card Container -->
                    <div class="container">
                        <div class="cards-container">
                            <div class="cards-grid">
                                <div class="card" onclick="selectCard(this, 0)">
                                    <img src="assets/img/kartuakses.png" class="card-icon icon-access" alt="Access Card Icon">
                                    <h3 class="card-title">Pengajuan Kartu Akses</h3>
                                </div>

                                <div class="card" onclick="selectCard(this, 1)">
                                    <img src="assets/img/Report.png" class="card-icon icon-report" alt="Report Icon">
                                    <h3 class="card-title">Pengajuan Keluhan/CSIRT</h3>
                                </div>

                                <div class="card" onclick="selectCard(this, 2)">
                                    <img src="assets/img/domain.png" class="card-icon icon-domain" alt="Domain Icon">
                                    <h3 class="card-title">Pengajuan Sub Domain</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    // JavaScript untuk toggle sidebar
                    document.addEventListener('DOMContentLoaded', function() {
                        var sidebarToggle = document.getElementById('sidebarToggle');
                        var sidebar = document.getElementById('accordionSidebar');

                        sidebarToggle.addEventListener('click', function() {
                            sidebar.classList.toggle('toggled');
                        });
                    });
                </script>

                <!-- Loading -->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Fungsi untuk menghapus spinner setelah halaman selesai dimuat
                        function hideLoadingSpinner() {
                            document.getElementById('loading-spinner').style.display = 'none';
                        }

                        // Menunggu hingga semua data selesai dimuat
                        var dashboardDataLoad = new Promise((resolve, reject) => {
                            setTimeout(() => {
                                resolve();
                            }, 2000);
                        });

                        dashboardDataLoad.then(() => {
                            // Menghilangkan spinner setelah data selesai dimuat
                            hideLoadingSpinner();
                        }).catch((error) => {
                            console.error('Error loading dashboard data:', error);
                            hideLoadingSpinner();
                        });
                    });
                </script>
                <script>
                    function selectCard(element, index) {
                        // Remove selected class from all cards
                        document.querySelectorAll('.card').forEach(card => {
                            card.classList.remove('selected');
                        });

                        // Add selected class to clicked card
                        element.classList.add('selected');

                        // You can add additional functionality here based on the selected card
                        const titles = [
                            'Pengajuan Kartu Akses',
                            'Pengajuan Keluhan/CSIRT',
                            'Pengajuan Sub Domain'
                        ];

                        console.log(`Selected: ${titles[index]}`);
                    }

                    // Add hover effect sound if needed
                    document.querySelectorAll('.card').forEach(card => {
                        card.addEventListener('mouseenter', () => {
                            // Add hover sound effect here if desired
                        });
                    });
                </script>
                <!-- jQuery pertama -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                <!-- Kemudian Bootstrap JavaScript -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                <!-- DataTables JS -->
                <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


</body>

</html>