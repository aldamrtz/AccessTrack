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
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small username-text"><?= $id_user; ?></span>
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
                                    <h6 class="m-0 font-weight-bold text-success">Total Data</h6>
                                    <?php
                                    // Jumlahkan data dari array $dashboard_data
                                    $total_data = $dashboard_data['kartu_akses']
                                        + $dashboard_data['laporan_keluhan']
                                        + $dashboard_data['pengajuan_email']
                                        + $dashboard_data['pengajuan_domain'];
                                    ?>
                                    <!-- Tampilkan Total Data -->
                                    <span class="text-primary font-weight-bold">Total: <?= $total_data; ?></span>
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
                            title: {
                                display: true,
                                text: "Total Data",
                                font: {
                                    size: 17
                                }
                            },
                            padding: {
                                top: 1,
                                bottom: 1
                            },
                            legend: {
                                position: 'top',
                                display: false
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
                        labels: ['Kartu Diajukan', 'Kartu Diproses', 'Kartu Terverifikasi'],
                        datasets: [{
                            label: 'Total',
                            data: [
                                <?= $dashboard_data['kartu_akses_rejected']; ?>,
                                <?= $dashboard_data['kartu_akses_pending']; ?>,
                                <?= $dashboard_data['kartu_akses_approved']; ?>
                            ],
                            backgroundColor: [
                                'rgba(78, 115, 223, 0.6)', // Color for Kartu Diajukan
                                'rgba(28, 200, 138, 0.6)', // Color for Kartu Diproses
                                'rgba(255, 193, 7, 0.6)' // Color for Kartu Terverifikasi
                            ],
                            borderColor: [
                                'rgba(78, 115, 223, 1)', // Border color for Kartu Diajukan
                                'rgba(28, 200, 138, 1)', // Border color for Kartu Diproses
                                'rgba(255, 193, 7, 1)' // Border color for Kartu Terverifikasi
                            ],
                            borderWidth: 1
                        }]
                    };
                    my3DBarChart.options.plugins.title.text = 'Kartu Akses';
                    my3DBarChart.update();
                });

                // Event listener untuk Laporan Keluhan
                document.getElementById('detailLaporanKeluhan').addEventListener('click', function(e) {
                    e.preventDefault();
                    my3DBarChart.data = {
                        labels: ['Laporan Diajukan', 'Laporan Diproses', 'Laporan Diatasi'],
                        datasets: [{
                            label: 'Total',
                            data: [
                                <?= $dashboard_data['laporan_keluhan_rejected']; ?>,
                                <?= $dashboard_data['laporan_keluhan_pending']; ?>,
                                <?= $dashboard_data['laporan_keluhan_approved']; ?>
                            ],
                            backgroundColor: [
                                'rgba(78, 115, 223, 0.6)', // Color for Kartu Diajukan
                                'rgba(28, 200, 138, 0.6)', // Color for Kartu Diproses
                                'rgba(255, 193, 7, 0.6)' // Color for Kartu Terverifikasi
                            ],
                            borderColor: [
                                'rgba(78, 115, 223, 1)', // Border color for Kartu Diajukan
                                'rgba(28, 200, 138, 1)', // Border color for Kartu Diproses
                                'rgba(255, 193, 7, 1)' // Border color for Kartu Terverifikasi
                            ],
                            borderWidth: 1
                        }]
                    };
                    my3DBarChart.options.plugins.title.text = 'Laporan Keluhan';
                    my3DBarChart.update();
                });

                // Event listener untuk Pengajuan Email
                document.getElementById('detailPengajuanEmail').addEventListener('click', function(e) {
                    e.preventDefault();
                    my3DBarChart.data = {
                        labels: ['Email Diajukan', 'Email Diproses', 'Email Terverifikasi', 'Email Dikirimkan'],
                        datasets: [{
                            label: 'Pengajuan Email',
                            data: [
                                <?= $dashboard_data['pengajuan_email_diajukan']; ?>,
                                <?= $dashboard_data['pengajuan_email_diproses']; ?>,
                                <?= $dashboard_data['pengajuan_email_diverifikasi']; ?>,
                                <?= $dashboard_data['pengajuan_email_dikirim']; ?>,
                            ],
                            backgroundColor: [
                                'rgba(255, 193, 7, 0.6)', // Warna untuk Jenis 1
                                'rgba(54, 162, 235, 0.6)', // Warna untuk Jenis 2
                                'rgba(75, 192, 192, 0.6)', // Warna untuk Jenis 3
                                'rgba(153, 102, 255, 0.6)' // Warna untuk Jenis 4
                            ],
                            borderColor: [
                                'rgba(255, 193, 7, 1)', // Warna border untuk Jenis 1
                                'rgba(54, 162, 235, 1)', // Warna border untuk Jenis 2
                                'rgba(75, 192, 192, 1)', // Warna border untuk Jenis 3
                                'rgba(153, 102, 255, 1)' // Warna border untuk Jenis 4
                            ],
                            borderWidth: 1
                        }]

                    };
                    my3DBarChart.options.plugins.title.text = 'Pengajuan Email';
                    my3DBarChart.update();
                });

                // Event listener untuk Pengajuan Domain
                document.getElementById('detailPengajuanDomain').addEventListener('click', function(e) {
                    e.preventDefault();
                    my3DBarChart.data = {
                        labels: ['Domain Diajukan', 'Domain Diproses', 'Domain Terverifikasi', 'Domain Dikirimkan'],
                        datasets: [{
                            label: 'Pengajuan Domain',
                            data: [
                                <?= $dashboard_data['pengajuan_domain_diajukan']; ?>,
                                <?= $dashboard_data['pengajuan_domain_diproses']; ?>,
                                <?= $dashboard_data['pengajuan_domain_diverifikasi']; ?>,
                                <?= $dashboard_data['pengajuan_domain_dikirim']; ?>,
                            ],
                            backgroundColor: [
                                'rgba(255, 193, 7, 0.6)', // Warna untuk Jenis 1
                                'rgba(54, 162, 235, 0.6)', // Warna untuk Jenis 2
                                'rgba(75, 192, 192, 0.6)', // Warna untuk Jenis 3
                                'rgba(153, 102, 255, 0.6)' // Warna untuk Jenis 4
                            ],
                            borderColor: [
                                'rgba(255, 193, 7, 1)', // Warna border untuk Jenis 1
                                'rgba(54, 162, 235, 1)', // Warna border untuk Jenis 2
                                'rgba(75, 192, 192, 1)', // Warna border untuk Jenis 3
                                'rgba(153, 102, 255, 1)' // Warna border untuk Jenis 4
                            ],
                            borderWidth: 1
                        }]
                    };
                    my3DBarChart.options.plugins.title.text = 'Pengajuan Domain';
                    my3DBarChart.update();
                });

                // Event listener untuk "Lihat Semua Data"
                document.getElementById('showAllData').addEventListener('click', function(e) {
                    e.preventDefault();
                    // Kembalikan chart ke data awal (semua data)
                    my3DBarChart.data = initialData;
                    my3DBarChart.options.plugins.title.text = 'Total Data';
                    my3DBarChart.update();

                    // Reset Fakultas dropdown
                    dropdownFakultasButton.textContent = 'Fakultas';
                    fakultasDropdown.innerHTML = ''; // Clear existing options

                    // Reset Jurusan dropdown
                    dropdownJurusanButton.textContent = 'Jurusan';
                    jurusanDropdown.innerHTML = ''; // Clear existing options

                    // Re-populate Fakultas dropdown
                    Object.keys(fakultasJurusan).forEach(fakultasName => {
                        var item = document.createElement('a');
                        item.className = 'dropdown-item';
                        item.href = '#';
                        item.dataset.fakultas = fakultasName;
                        item.textContent = fakultasName;
                        fakultasDropdown.appendChild(item);
                    });
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