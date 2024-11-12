<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content>
    <meta name="author" content>

    <title>Pengajuan Email</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="assets/js/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Menambahkan favicon -->
    <link rel="icon" href="assets/img/Unjani.png" type="img/png">

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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('Dashboard_akses'); ?>">
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
                <a class="nav-link" href="<?php echo site_url('Dashboard'); ?>">
                    <i class="fas fa-home"></i>
                    <span>Home</span></a>
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
            <li class="nav-item active">
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
                        <h1 class="h3 mb-0 text-gray-800">DATA PENGAJUAN EMAIL</h1>
                        <button id="printButton" class="btn btn-primary"> <i class="fas fa-print"></i> Cetak Laporan</button>
                    </div>

                    <!-- Content row -->
                    <div class="row">

                        <!-- Email Diajukan -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2 border-left-info"
                                style="border-left: 5px solid #f48fb1;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Email Diajukan
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="SubmitCount">0</div>
                                            <div class="text-xs">Total
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-envelope fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Email diproses -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2 border-left-warning"
                                style="border-left: 5px solid #f8bbd0;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Email Diproses
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="ProcessCount">0</div>
                                            <div class="text-xs">Total</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-cogs fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Email Terverifikasi -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2 border-left-success"
                                style="border-left: 5px solid #f48fb1;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Email Terverifikasi
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="ApprovedCount">0</div>
                                            <div class="text-xs">Total Pengajuan
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-check-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Email Dikirimkan -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2 border-left-primary"
                                style="border-left: 5px solid #f8bbd0;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Email Dikirimkan
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="SendCount">0</div>
                                            <div class="text-xs">Total</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-paper-plane fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- DataTables -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 font-weight-bold text-success">Tabel Pengajuan Email</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>NIM</th>
                                                    <th>Fakultas</th>
                                                    <th>Prodi</th>
                                                    <th>E-mail Pengguna</th>
                                                    <th>E-mail Diajukan</th>
                                                    <th>Tanggal Pengajuan</th>
                                                    <th>Status Pengajuan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($pengajuan_email as $data) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?php echo $data['nama_depan'] . ' ' . $data['nama_belakang']; ?></td>
                                                        <td><?php echo $data['nim']; ?></td>
                                                        <td><?php echo $data['fakultas']; ?></td>
                                                        <td><?php echo $data['prodi']; ?></td>
                                                        <td><?php echo $data['email_pengguna']; ?></td>
                                                        <td><?php echo $data['email_diajukan']; ?></td>
                                                        <td><?php echo $data['tgl_pengajuan']; ?></td>
                                                        <td><?php echo $data['status_pengajuan']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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

            <!-- jQuery pertama -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <!-- Kemudian Bootstrap JavaScript -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

            <!-- Script berfungsi pada searchbar untuk menghighlight huruf yang dicar-->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const table = $('#dataTable').DataTable({
                        ordering: false, // Aktifkan sorting
                        order: [
                            [0, 'asc']
                        ], // Mengurutkan berdasarkan kolom pertama (ID KA)
                        language: {
                            search: "Search:"
                        }
                    });

                    // Fungsi untuk menghapus semua highlight
                    function clearHighlight() {
                        $('td').each(function() {
                            let originalText = $(this).data('original-text');
                            if (originalText) {
                                $(this).html(originalText); // Kembalikan ke teks asli
                            }
                        });
                    }

                    // Fungsi untuk menyoroti teks
                    function highlightText(text) {
                        if (!text) {
                            clearHighlight(); // Hapus highlight jika tidak ada teks
                            return;
                        }

                        try {
                            // Escape special characters for regex
                            text = text.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
                            const regex = new RegExp(`(${text})`, 'gi');

                            $('td').each(function() {
                                let originalText = $(this).html();
                                if (!$(this).data('original-text')) {
                                    $(this).data('original-text', originalText); // Simpan teks asli jika belum
                                }

                                // Clear previous highlights
                                const cleanText = originalText.replace(/<span class="highlight">|<\/span>/g, '');
                                // Highlight new text
                                const newText = cleanText.replace(regex, '<span class="highlight">$1</span>');
                                $(this).html(newText);
                            });
                        } catch (e) {
                            console.error('Error highlighting text:', e);
                            alert('Gagal menyoroti teks. Silakan coba lagi.');
                        }
                    }

                    // Event Listener untuk pencarian
                    $('#dataTable_filter input').on('input', function() {
                        const searchValue = this.value;
                        try {
                            table.search(searchValue).draw();
                            highlightText(searchValue); // Menyoroti teks setelah pencarian
                        } catch (e) {
                            console.error('Error during search:', e);
                            alert('Gagal melakukan pencarian. Silakan coba lagi.');
                        }
                    });

                    // Event Listener untuk menyoroti teks ketika DataTable diupdate
                    table.on('draw', function() {
                        const searchValue = $('#dataTable_filter input').val();
                        try {
                            highlightText(searchValue);
                            updateCardCounts(); // Perbarui card counts setelah DataTable di-render ulang
                        } catch (e) {
                            console.error('Error during DataTable draw:', e);
                            alert('Gagal memperbarui highlight teks. Silakan coba lagi.');
                        }
                    });
                    // Function to update card counts based on status
                    function updateCardCounts() {
                        let SubmitCount = 0;
                        let ProcessCount = 0;
                        let ApprovedCount = 0;
                        let SendCount = 0;

                        // Iterate through each row in the table
                        table.rows().nodes().to$().each(function(index, tr) {
                            const status = $(tr).find('td').eq(8).text().trim();

                            if (status === 'Email Diajukan') {
                                SubmitCount++;
                            } else if (status === 'Email Diproses') {
                                ProcessCount++;
                            } else if (status === 'Email Diverifikasi') {
                                ApprovedCount++;
                            } else if (status === 'Email Dikirim') {
                                SendCount++;
                            }
                        });

                        // Update card counts
                        $('#SubmitCount').text(SubmitCount);
                        $('#ProcessCount').text(ProcessCount);
                        $('#ApprovedCount').text(ApprovedCount);
                        $('#SendCount').text(SendCount);
                    }

                    // Update card counts on page load
                    updateCardCounts();

                    // Update card counts on DataTable draw
                    table.on('draw', function() {
                        updateCardCounts();
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

            <!-- Loading-->
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
                        }, 500);
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
                document.getElementById('printButton').addEventListener('click', function() {
                    // Get the table content to print
                    var contentToPrint = document.querySelector('.dataTable').innerHTML;

                    // Open a new window for printing
                    var printWindow = window.open('', '_blank');

                    // Write HTML structure to the new window
                    printWindow.document.open();
                    printWindow.document.write(`
            <html>
            <head>
                <title>Cetak Laporan CSIRT</title>
                <style>
                    body {
                        font-family: 'Nunito', sans-serif;
                        color: #000;
                        margin: 20px;
                    }
                    .header {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin-bottom: 20px;
                    }
                    .header img {
                        max-height: 100px;
                    }
                    .header .left {
                        text-align: left;
                    }
                    .header .center {
                        text-align: center;
                        flex-grow: 2;
                    }
                    .header .center h1 {
                        margin: 0;
                        font-size: 24px;
                        font-weight: bold;
                    }
                    .header .center p {
                        margin: 0;
                        font-size: 14px;
                    }
                    .header .right {
                        text-align: right;
                    }
                    hr.divider {
                        border: 0;
                        border-top: 2px solid #000;
                        margin-top: 20px;
                    }                            
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-top: 20px;
                    }
                    table, th, td {
                        border: 1px solid black;
                    }
                    th, td {
                        padding: 8px;
                        text-align: left;
                    }
                    th {
                        background-color: #f2f2f2;
                    }
                    h1 {
                        text-align: center;
                        margin-bottom: 20px;
                    }
                </style>
            </head>
            <body>
                <div class="header">
                    <div class="left">
                        <img src="assets/img/YKEP.png" alt="Logo Left" onerror="this.style.display='none'">
                    </div>
                    <div class="center">
                        <h1>YAYASAN KARTIKA EKA PAKSI</h1>
                        <p>UNIVERSITAS JENDERAL ACHMAD YANI (UNJANI)</p>
                        <p>Kampus Cimahi: Jl. Terusan Jend. Sudirman www.unjani.ac.id Cimahi Telp. (022) 6631861-8656190 Fax. (022) 6652069</p>
                        <p>Kampus Bandung: Jl. Gatot Subroto www.unjani.ac.id Bandung Telp. (022) 7312741 Fax. (022) 7312741</p>
                    </div>
                    <div class="right">
                        <img src="assets/img/Unjani.png" alt="Logo Right" onerror="this.style.display='none'">
                    </div>
                </div>
                <hr class="divider"> 
                <h1>Laporan Pengajuan Email</h1>
                <table>
                    ${contentToPrint}
                </table>
            </body>
            </html>
        `);
                    printWindow.document.close();

                    // Print the new window's content
                    printWindow.print();

                    // Close the print window after printing
                    printWindow.onafterprint = function() {
                        printWindow.close();
                    };
                });
            </script>
            <!-- DataTables JS -->
            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


</body>

</html>