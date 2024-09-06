<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content>
    <meta name="author" content>

    <title>AccessTrack</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Menambahkan favicon -->
    <link rel="icon" href="assets/img/Unjani.png" type="">
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('dashboard'); ?>">
                <div class="sidebar-brand-icon d-inline-block">
                    <img src="assets/img/Unjani.png">
                </div>
                <div class="sidebar-brand-text">
                    Access Track
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Home -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url('dashboard'); ?>">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>

            <!-- Nav Item - Dashboard Akses -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('Dashboard_akses'); ?>">
                    <i class="fas fa-id-card"></i>
                    <span>Data Kartu Akses</span>
                </a>
            </li>


            <!-- Nav Item - Laporan Keluhan -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('DashboardCSIRT'); ?>">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>Laporan Keluhan</span>
                </a>
            </li>

            <!-- Nav Item - Pengajuan Email -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('DashboardPengajuanEmail'); ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Pengajuan Email</span>
                </a>
            </li>

            <!-- Nav Item - Pengajuan Domain -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('DashboardPengajuanDomain'); ?>">
                    <i class="fas fa-globe"></i>
                    <span>Pengajuan Domain</span>
                </a>
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new
                                            monthly report is ready to
                                            download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small username-text"><?= $username; ?></span>
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
                        <h1 class="h3 mb-0 text-gray-800">DASHBOARD</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Kartu Akses -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2 border-left-primary"
                                style="border-left: 5px solid #f8bbd0;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kartu
                                                Akses
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dashboard_data['kartu_akses']; ?></div>
                                            <div class="text-xs">Total</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-id-card fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <a href="#" id="detailKartuAkses" class="btn btn-link text-xs text-decoration-none">Lihat Detail <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- CSIRT -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2 border-left-success"
                                style="border-left: 5px solid #f48fb1;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Laporan Keluhan
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dashboard_data['laporan_keluhan']; ?></div>
                                            <div class="text-xs">Total</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shield-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <a href="#" id="detailLaporanKeluhan" class="btn btn-link text-xs text-decoration-none">Lihat Detail <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Pengajuan Email -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2 border-left-warning"
                                style="border-left: 5px solid #ce93d8;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pengajuan Email</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dashboard_data['pengajuan_email']; ?></div>
                                            <div class="text-xs">Total</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <a href="#" id="detailPengajuanEmail" class="btn btn-link text-xs text-decoration-none">Lihat Detail <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Pengajuan Domain -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2 border-left-info"
                                style="border-left: 5px solid #b39ddb;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Pengajuan Domain</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dashboard_data['pengajuan_domain']; ?></div>
                                            <div class="text-xs">Total</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-globe fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <a href="#" id="detailPengajuanDomain" class="btn btn-link text-xs text-decoration-none">Lihat Detail <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dropdown Button beside "Total Laporan" -->
                    <div class="row">
                        <!-- Bar Chart Card -->
                        <!-- Button untuk Lihat Semua Data -->
                        <div class="col-12 mb-4">
                            <button id="showAllData" class="btn btn-primary">Lihat Semua Data</button>
                        </div>

                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 font-weight-bold text-success">Total Laporan</h6>
                                    <!-- Dropdown Button -->
                                    <!-- Dropdown Container -->
                                    <div class="d-flex align-items-center">
                                        <!-- First Dropdown Button -->
                                        <div class="dropdown mr-2"> <!-- Add margin-right -->
                                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Fakultas
                                            </button>
                                            <!-- Dropdown Menu -->
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
                                                <a class="dropdown-item" href="#">Teknik (FT)</a>
                                                <a class="dropdown-item" href="#">Teknologi Manufaktur (FTM)</a>
                                                <a class="dropdown-item" href="#">Ekonomi dan Bisnis (FEB)</a>
                                                <a class="dropdown-item" href="#">Ilmu Sosial dan Ilmu Politik (FISIP)</a>
                                                <a class="dropdown-item" href="#">Sains dan Informatika (FSI)</a>
                                                <a class="dropdown-item" href="#">Psikologi</a>
                                                <a class="dropdown-item" href="#">Farmasi</a>
                                                <a class="dropdown-item" href="#">Kedokteran</a>
                                                <a class="dropdown-item" href="#">Kedokteran Gigi</a>
                                                <a class="dropdown-item" href="#">FITKES</a>
                                                <!-- Tambahkan lebih banyak opsi sesuai kebutuhan -->
                                            </div>
                                        </div>

                                        <!-- Second Dropdown Button -->
                                        <div class="dropdown">
                                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Jurusan
                                            </button>
                                            <!-- Dropdown Menu -->
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">
                                                <a class="dropdown-item" href="#">Teknik Elektro S-1</a>
                                                <a class="dropdown-item" href="#">Teknik Kimia S-1</a>
                                                <a class="dropdown-item" href="#">Teknik Sipil S-1</a>
                                                <a class="dropdown-item" href="#">Magister Teknik Sipil S-2</a>
                                                <a class="dropdown-item" href="#">Teknik Geomatika S-1</a>

                                                <a class="dropdown-item" href="#">Teknik Mesin S-1</a>
                                                <a class="dropdown-item" href="#">Teknik Industri S-1</a>
                                                <a class="dropdown-item" href="#">Teknik Metalurgi S-1</a>
                                                <a class="dropdown-item" href="#">Magister Manajemen Teknologi S-2</a>

                                                <a class="dropdown-item" href="#">Akuntansi S-1</a>
                                                <a class="dropdown-item" href="#">Manajemen S-1</a>
                                                <a class="dropdown-item" href="#">Magister Manajemen S-2</a>

                                                <a class="dropdown-item" href="#">Ilmu Pemerintahan S-1</a>
                                                <a class="dropdown-item" href="#">Ilmu Hub. Internasional S-1</a>
                                                <a class="dropdown-item" href="#">Magister Hub. Internasional S-2</a>
                                                <a class="dropdown-item" href="#">Ilmu Hukum S-1</a>
                                                <a class="dropdown-item" href="#">Magister Ilmu Pemerintahan S-2</a>

                                                <a class="dropdown-item" href="#">Kimia S-1</a>
                                                <a class="dropdown-item" href="#">Magister Kimia S-2</a>
                                                <a class="dropdown-item" href="#">Teknik Informatika S-1</a>
                                                <a class="dropdown-item" href="#">Sistem Informasi S-1</a>

                                                <a class="dropdown-item" href="#">Psikologi S-1</a>

                                                <a class="dropdown-item" href="#">Farmasi S-1</a>
                                                <a class="dropdown-item" href="#">Profesi Apoteker</a>
                                                <a class="dropdown-item" href="#">Magister Farmasi S-2</a>

                                                <a class="dropdown-item" href="#">Pendidikan Dokter S-1</a>
                                                <a class="dropdown-item" href="#">Profesi Dokter</a>
                                                <a class="dropdown-item" href="#">Administrasi Rumah Sakit S-1</a>
                                                <a class="dropdown-item" href="#">Magister Penuaan Kulit dan Estetika S-2</a>

                                                <a class="dropdown-item" href="#">Kedokteran Gigi S-1</a>
                                                <a class="dropdown-item" href="#">Profesi Dokter Gigi</a>

                                                <a class="dropdown-item" href="#">Magister Keperawatan S-2</a>
                                                <a class="dropdown-item" href="#">Profesi Ners</a>
                                                <a class="dropdown-item" href="#">Ilmu Keperawatan S-1</a>
                                                <a class="dropdown-item" href="#">Keperawatan D-3</a>
                                                <a class="dropdown-item" href="#">Kesehatan Masyarakat S-1</a>
                                                <a class="dropdown-item" href="#">Teknologi Laboraturium Medis D-4</a>
                                                <a class="dropdown-item" href="#">Teknologi Laboraturium Medis D-3</a>
                                                <a class="dropdown-item" href="#">Kebidanan S-1</a>
                                                <a class="dropdown-item" href="#">Profesi Bidan</a>
                                                <a class="dropdown-item" href="#">Kebidanan D-3</a>
                                                <a class="dropdown-item" href="#">Magister Kesehatan Masyarakat S-2</a>
                                                <!-- Tambahkan lebih banyak opsi sesuai kebutuhan -->
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <canvas id="my3DBarChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Untuk Keluar ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Keluar" di bawah jika Anda siap mengakhiri sesi Anda saat ini.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Keluar</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Bootstrap core JavaScript-->
        <script src="js/jquery/jquery.min.js"></script>
        <script src="js/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="js/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="js/chart.js/Chart.min.js"></script>

        <!-- Chart.js and Chart.js 3D plugin -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-3d"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var ctx = document.getElementById('my3DBarChart').getContext('2d');

                // Data awal (semua data)
                var initialData = {
                    labels: ['Kartu Akses', 'Laporan Keluhan', 'Pengajuan Email', 'Pengajuan Domain'],
                    datasets: [{
                        label: 'Total',
                        data: [
                            <?= $dashboard_data['kartu_akses']; ?>,
                            <?= $dashboard_data['laporan_keluhan']; ?>,
                            <?= $dashboard_data['pengajuan_email']; ?>,
                            <?= $dashboard_data['pengajuan_domain']; ?>
                        ],
                        backgroundColor: [
                            'rgba(78, 115, 223, 0.6)',
                            'rgba(28, 200, 138, 0.6)',
                            'rgba(255, 193, 7, 0.6)',
                            'rgba(54, 185, 204, 0.6)'
                        ],
                        borderColor: [
                            'rgba(78, 115, 223, 1)',
                            'rgba(28, 200, 138, 1)',
                            'rgba(255, 193, 7, 1)',
                            'rgba(54, 185, 204, 1)'
                        ],
                        borderWidth: 1
                    }]
                };

                // Inisialisasi chart
                var my3DBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: initialData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        aspectRatio: 2,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                stacked: true
                            },
                            y: {
                                stacked: true,
                                beginAtZero: true
                            }
                        },
                        elements: {
                            bar: {
                                borderWidth: 1,
                                borderRadius: 4
                            }
                        },
                        layout: {
                            padding: 20
                        },
                        animation: {
                            duration: 2000
                        }
                    }
                });

                // Event listener untuk Kartu Akses
                document.getElementById('detailKartuAkses').addEventListener('click', function(e) {
                    e.preventDefault();
                    my3DBarChart.data = {
                        labels: ['Kartu Akses'],
                        datasets: [{
                            label: 'Total',
                            data: [<?= $dashboard_data['kartu_akses']; ?>],
                            backgroundColor: ['rgba(78, 115, 223, 0.6)'],
                            borderColor: ['rgba(78, 115, 223, 1)'],
                            borderWidth: 1
                        }]
                    };
                    my3DBarChart.update();
                });

                // Event listener untuk Laporan Keluhan
                document.getElementById('detailLaporanKeluhan').addEventListener('click', function(e) {
                    e.preventDefault();
                    my3DBarChart.data = {
                        labels: ['Laporan Keluhan'],
                        datasets: [{
                            label: 'Total',
                            data: [<?= $dashboard_data['laporan_keluhan']; ?>],
                            backgroundColor: ['rgba(28, 200, 138, 0.6)'],
                            borderColor: ['rgba(28, 200, 138, 1)'],
                            borderWidth: 1
                        }]
                    };
                    my3DBarChart.update();
                });

                // Event listener untuk Pengajuan Email
                document.getElementById('detailPengajuanEmail').addEventListener('click', function(e) {
                    e.preventDefault();
                    my3DBarChart.data = {
                        labels: ['Pengajuan Email'],
                        datasets: [{
                            label: 'Total',
                            data: [<?= $dashboard_data['pengajuan_email']; ?>],
                            backgroundColor: ['rgba(255, 193, 7, 0.6)'],
                            borderColor: ['rgba(255, 193, 7, 1)'],
                            borderWidth: 1
                        }]
                    };
                    my3DBarChart.update();
                });

                // Event listener untuk Pengajuan Domain
                document.getElementById('detailPengajuanDomain').addEventListener('click', function(e) {
                    e.preventDefault();
                    my3DBarChart.data = {
                        labels: ['Pengajuan Domain'],
                        datasets: [{
                            label: 'Total',
                            data: [<?= $dashboard_data['pengajuan_domain']; ?>],
                            backgroundColor: ['rgba(54, 185, 204, 0.6)'],
                            borderColor: ['rgba(54, 185, 204, 1)'],
                            borderWidth: 1
                        }]
                    };
                    my3DBarChart.update();
                });

                // Event listener untuk "Lihat Semua Data"
                document.getElementById('showAllData').addEventListener('click', function(e) {
                    e.preventDefault();
                    // Kembalikan chart ke data awal (semua data)
                    my3DBarChart.data = initialData;
                    my3DBarChart.update();
                });

                window.addEventListener('resize', function() {
                    my3DBarChart.resize();
                });
            });
        </script>
        
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

        <!-- Popper.js -->
        <!-- jQuery pertama -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Kemudian Bootstrap JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>


</body>

</html>