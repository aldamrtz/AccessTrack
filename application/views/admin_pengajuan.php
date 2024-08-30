<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content>
    <meta name="author" content>
    <title>Admin</title>
    <!-- FontAwesome from CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- SB Admin 2 CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.0.5/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="./assets/img/Unjani.png" type="image/png">
    <style></style>
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon d-inline-block">
                    <img src="./assets/img/Unjani.png" style="width: 50px; height: auto;">
                </div>
                <div class="sidebar-brand-text">Access Track</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="admin_pengajuan">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Laporan</div>
            <li class="nav-item">
                <a class="nav-link" href="data_pengajuan_email.php">
                    <i class="fas fa-envelope"></i>
                    <span>Data Pengajuan Email</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data_pengajuan_domain.php">
                    <i class="fas fa-globe"></i>
                    <span>Pengajuan Domain</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
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
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas
                                    McGee</span>
                                <img class="img-profile rounded-circle" src="https://yourdomain.com/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>
                            Cetak Laporan</a>
                    </div>
                    <ul class="nav nav-tabs" id="emailTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="diajukan-tab" data-bs-toggle="tab" data-bs-target="#diajukan" type="button" role="tab" aria-controls="diajukan" aria-selected="true">Email Diajukan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="diproses-tab" data-bs-toggle="tab" data-bs-target="#diproses" type="button" role="tab" aria-controls="diproses" aria-selected="false">Email Diproses</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="diverifikasi-tab" data-bs-toggle="tab" data-bs-target="#diverifikasi" type="button" role="tab" aria-controls="diverifikasi" aria-selected="false">Email Diverifikasi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="dikirim-tab" data-bs-toggle="tab" data-bs-target="#dikirim" type="button" role="tab" aria-controls="dikirim" aria-selected="false">Email Dikirim</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="emailTabsContent">
                        <!-- Tab Email Diajukan -->
                        <div class="tab-pane fade show active" id="diajukan" role="tabpanel" aria-labelledby="diajukan-tab">
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Program Studi</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Email yang Diajukan</th>
                                        <th>Email Pengguna</th>
                                        <th>KTM</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($email_diajukan as $email): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $email['prodi']; ?></td>
                                        <td><?= $email['nim']; ?></td>
                                        <td><?= $email['nama_depan'] . ' ' . $email['nama_belakang']; ?></td>
                                        <td><?= $email['email_diajukan']; ?></td>
                                        <td><?= $email['email_pengguna']; ?></td>
                                        <td><a href="<?= base_url('uploads/' . $email['ktm']); ?>" target="_blank">Lihat KTM</a></td>
                                        <td><?= $email['tgl_pengajuan']; ?></td>
                                        <td>
                                            <form method="post" action="<?= site_url('AdminController/updateStatus'); ?>">
                                                <input type="hidden" name="id" value="<?= $email['nim']; ?>">
                                                <input type="hidden" name="status_pengajuan" value="Email Diproses">
                                                <button type="submit" class="btn btn-primary">Proses Email</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Tab Email Diproses -->
                        <div class="tab-pane fade" id="diproses" role="tabpanel" aria-labelledby="diproses-tab">
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Program Studi</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Email yang Diajukan</th>
                                        <th>Email Pengguna</th>
                                        <th>KTM</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($email_diproses as $email): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $email['prodi']; ?></td>
                                        <td><?= $email['nim']; ?></td>
                                        <td><?= $email['nama_depan'] . ' ' . $email['nama_belakang']; ?></td>
                                        <td><?= $email['email_diajukan']; ?></td>
                                        <td><?= $email['email_pengguna']; ?></td>
                                        <td><a href="<?= base_url('uploads/' . $email['ktm']); ?>" target="_blank">Lihat KTM</a></td>
                                        <td><?= $email['tgl_pengajuan']; ?></td>
                                        <td>
                                            <form method="post" action="<?= site_url('AdminController/updateStatus'); ?>">
                                                <input type="hidden" name="id" value="<?= $email['nim']; ?>">
                                                <input type="hidden" name="status_pengajuan" value="Email Diverifikasi">
                                                <button type="submit" class="btn btn-warning">Verifikasi Email</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Tab Email Diverifikasi -->
                        <div class="tab-pane fade" id="diverifikasi" role="tabpanel" aria-labelledby="diverifikasi-tab">
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Program Studi</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Email yang Diajukan</th>
                                        <th>Email Pengguna</th>
                                        <th>KTM</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($email_diverifikasi as $email): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $email['prodi']; ?></td>
                                        <td><?= $email['nim']; ?></td>
                                        <td><?= $email['nama_depan'] . ' ' . $email['nama_belakang']; ?></td>
                                        <td><?= $email['email_diajukan']; ?></td>
                                        <td><?= $email['email_pengguna']; ?></td>
                                        <td><a href="<?= base_url('uploads/' . $email['ktm']); ?>" target="_blank">Lihat KTM</a></td>
                                        <td><?= $email['tgl_pengajuan']; ?></td>
                                        <td>
                                            <form method="post" action="<?= site_url('AdminController/updateStatus'); ?>">
                                                <input type="hidden" name="id" value="<?= $email['nim']; ?>">
                                                <input type="hidden" name="status_pengajuan" value="Email Dikirim">
                                                <button type="submit" class="btn btn-success">Kirim Email</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Tab Email Dikirim -->
                        <div class="tab-pane fade" id="dikirim" role="tabpanel" aria-labelledby="dikirim-tab">
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Program Studi</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Email yang Diajukan</th>
                                        <th>Email Pengguna</th>
                                        <th>KTM</th>
                                        <th>Tanggal Pengajuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($email_dikirim as $email): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $email['prodi']; ?></td>
                                        <td><?= $email['nim']; ?></td>
                                        <td><?= $email['nama_depan'] . ' ' . $email['nama_belakang']; ?></td>
                                        <td><?= $email['email_diajukan']; ?></td>
                                        <td><?= $email['email_pengguna']; ?></td>
                                        <td><a href="<?= base_url('uploads/' . $email['ktm']); ?>" target="_blank">Lihat KTM</a></td>
                                        <td><?= $email['tgl_pengajuan']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <!-- /.container-fluid -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/jquery-easing@1.4.1/jquery.easing.min.js"></script>
    <!-- SB Admin 2 JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.0.5/js/sb-admin-2.min.js"></script>
</body>
</html>
