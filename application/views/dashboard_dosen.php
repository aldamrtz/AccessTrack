<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content>
    <meta name="author" content>

    <title>DS Dosen</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="assets/css/card-dashboard.css" rel="stylesheet">
    <!-- Menambahkan favicon -->
    <link rel="icon" href="assets/img/Unjani.png" type="img/png">

    <style>
        body {
            background-color: #f8f9fc;
        }
    </style>
</head>

<body id="page-top">
    <!-- Loading Spinner -->
    <div id="loading-spinner" style="position: fixed; width: 100%; height: 100%; background: white; top: 0; left: 0; z-index: 9999; display: flex; justify-content: center; align-items: center;">
        <div class="spinner-border text-success" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-gradient-success topbar mb-4 static-top shadow">
        <!-- Logo dan Teks di Topbar Kiri -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <div class="d-inline-block">
                <img src="assets/img/Unjani.png" alt="Logo" style="height: 40px;">
            </div>

            <!-- Garis Vertikal -->
            <div class="mx-2" style="border-left: 2px solid white; height: 60px;"></div>

            <!-- Teks Access Track -->
            <div class="text-white">
                Access Track (Dosen)
            </div>
        </a>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <span class="mr-2 d-none d-lg-inline text-white-600 small username-text">NID</span>
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
            <div class="row justify-content-center align-items-center" style="min-height: 60vh;">
                <div class="col-md-4">
                    <div class="card text-center p-4 shadow-sm hover-card" onclick="selectCard(this, 0)">
                        <div class="mx-auto mb-3">
                            <img src="assets/img/access.png" class="card-icon" alt="Access Card Icon">
                        </div>
                        <h3 class="card-title">Pengajuan Kartu Akses</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center p-4 shadow-sm hover-card" onclick="selectCard(this, 1)">
                        <div class="mx-auto mb-3">
                            <img src="assets/img/domain.png" class="card-icon" alt="Domain Icon">
                        </div>
                        <h3 class="card-title">Pengajuan Sub-Domain</h3>
                    </div>
                </div>
            </div>
        </div>

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

                switch (index) {
                    case 0:
                        window.location.href = '';
                        break;
                    case 1:
                        window.location.href = 'SubDomainController';
                        break;
                    default:
                        console.log('Invalid selection');
                }

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