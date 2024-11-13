<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?= base_url('assets/img/logo-unjani.png'); ?>" rel="icon" type="image/png">
    <title>Admin - Pengajuan Email</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.0.5/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .sidebar {
            background: linear-gradient(135deg, #13855c, #13855c, #1cc88a);
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            z-index: 1000;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-brand-icon img {
            display: inline-block;
            width: 40px;
            height: auto;
        }

        .sidebar-brand-text {
            margin-left: 7px;
            margin-right: 3px;
            color: #ffffff;
            text-decoration: none !important;
            font-size: 18px;
        }

        .sidebar-collapsed .navbar {
            width: calc(100% - 104px);
        }

        .sidebar-collapsed #content-wrapper {
            margin-left: 104px;
        }

        .sidebar-divider {
            height: 0px;
            background-color: #ffffff !important;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: calc(100% - 224px);
            z-index: 1000;
        }

        .navbar-nav .nav-item {
            display: flex;
            align-items: center;
        }

        #content {
            padding-top: 100px;
            background-color: #e0f5ec;
        }

        #content-wrapper {
            margin-left: 224px;
            z-index: 999;
        }

        .nav-tabs {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            border-bottom: none;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .nav-tabs .nav-link {
            background-color: #e0f5ec;
            margin-bottom: 15px;
            margin-right: 10px;
            color: #13855c;
            outline: none;
            font-size: 15px;
        }

        .nav-tabs .nav-link.active {
            background-color: #1cc88a;
            color: #ffffff;
            outline: none;
        }

        .nav-tabs .nav-link:hover {
            background-color: #13855c;
            color: #ffffff;
        }

        .btn-cetak {
            background-color: #13855c;
            color: #ffffff;
        }

        .btn-cetak:hover {
            background-color: #0e6b47;
            color: #ffffff;
        }

        .dropdown-cetak {
            min-width: 250px;
            left: -7px !important;
        }

        .dropdown-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            padding: 0px 15px;
        }

        .text-center {
            grid-column: span 2;
            padding: 10px 15px;
        }

        .dropdown-cetak .dropdown-item {
            padding: 7px 20px;
            font-size: 15px;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .dropdown-cetak .dropdown-item:hover {
            background-color: #e0f5ec;
            color: #0e6b47;
            font-weight: bold;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .tab-content {
            border-radius: 5px;
            padding: 25px;
            background-color: #ffffff;
            margin-bottom: 30px;
            overflow-x: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .table {
            width: 100%;
            table-layout: auto;
            overflow-x: auto;
            border: 1px solid #ddd;
            width: 100%;
        }

        .table-bordered {
            border: 1px solid #ddd;
        }

        .table th {
            font-size: 13px;
            text-align: center !important;
            vertical-align: middle !important;
            background-color: #13855c;
            color: #ffffff;
            width: 100%;
        }

        .table td {
            font-size: 13px;
            background-color: #1cc88a;
            color: #333333;
            width: 100%;
        }

        .table tbody tr:nth-child(odd) td {
            background-color: #e0f5ec;
            color: #333333;
        }

        .table tbody tr:nth-child(even) td {
            background-color: #ffffff;
            color: #333333;
        }

        .table td:nth-child(1) {
            text-align: center;
            width: 5%;
        }

        .table td:nth-child(2),
        .table td:nth-child(3) {
            width: 30%;
        }

        .table td:nth-child(1),
        .table td:nth-child(7),
        .table td:nth-child(9),
        .table td:nth-child(10) {
            text-align: center;
        }

        .ktm-icon {
            cursor: pointer;
            color: #333;
        }

        .ktm-icon:hover {
            color: #0e6b47;
        }

        .custom-process-btn {
            background-color: #00aaff;
            color: #ffffff;
            border: none;
        }

        .custom-process-btn:hover {
            background-color: #0088cc;
            color: #ffffff;
            border: none;
        }

        .btn-aksi-ya {
            background-color: #00aaff;
            color: #ffffff;
            border: none;
        }

        .btn-aksi-ya:hover {
            background-color: #0088cc;
            color: #ffffff;
            border: none;
        }

        .custom-verify-btn {
            background-color: #00aaff;
            color: #ffffff;
            border: none;
        }

        .custom-verify-btn:hover {
            background-color: #0088cc;
            color: #ffffff;
            border: none;
        }

        .send-email-btn,
        .send-email-btn:focus {
            background-color: #00aaff;
            color: #ffffff;
            border: none;
        }

        .send-email-btn:hover {
            background-color: #0088cc;
            color: #ffffff;
            border: none;
        }

        .send-btn {
            background-color: #00aaff;
            color: #ffffff;
            border: none;
        }

        .send-btn:hover {
            background-color: #0088cc;
            color: #ffffff;
            border: none;
        }

        .btn-edit-simpan {
            background-color: #ffc107;
            color: #ffffff;
            border: none;
        }

        .btn-edit-simpan:hover {
            background-color: #e0a800;
            color: #ffffff;
            border: none;
        }

        .modal-ktm {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .modal-ktm .modal-header,
        .modal-ktm .modal-footer {
            padding: 15px;
        }

        .modal-ktm .modal-body {
            overflow: hidden;
            padding: 0;
        }

        .modal-ktm .modal-body img {
            max-width: 100%;
            max-height: 70vh;
            transition: transform 0.3s ease;
            position: relative;
            cursor: default;
        }

        .modal-ktm .modal-header .dropdown-toggle,
        .modal-ktm .modal-footer .btn {
            color: #fff;
            border: none;
            transition: background-color 0.3s ease;
        }

        #dropdownDownload {
            background-color: #0e6b47;
        }

        #dropdownDownload:hover {
            background-color: #1cc88a;
        }

        #zoomIn,
        #zoomOut {
            background-color: #0e6b47;
        }

        #zoomIn:hover,
        #zoomOut:hover {
            background-color: #1cc88a;
        }

        #rotateLeft,
        #rotateRight {
            background-color: #0e6b47;
        }

        #rotateLeft:hover,
        #rotateRight:hover {
            background-color: #1cc88a;
        }

        .modal-dialog {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            max-width: 400px;
            width: 100%;
        }

        .modal-content {
            border: none;
            border-radius: 10px;
        }

        .btn-close {
            position: absolute;
            top: 15px;
            right: 20px;
            color: #aaa;
            font-size: 15px;
            cursor: pointer;
        }

        .modal-body {
            padding: 30px;
        }

        .modal-body i {
            font-size: 100px;
            margin-top: 30px;
        }

        .modal-body p {
            font-size: 17px;
            color: #333;
        }

        .modal-body .status-text {
            font-size: 25px;
            margin-top: 15px;
            color: #333;
            font-weight: bold;
        }

        .btn-kembali {
            margin-left: auto;
            background-color: #333333;
            color: #ffffff;
        }

        .btn-kembali:hover {
            background-color: #555555;
            color: #ffffff;
        }

        .dataTables_filter input {
            border-radius: 5px;
            width: 200px;
        }

        .dataTables_filter input:focus {
            border-color: #13855c;
            box-shadow: 0 0 0 0.25rem rgba(19, 133, 92, 0.25);
            outline: none;
        }

        .dataTables_length select {
            border: 2px solid #ccc;
            border-radius: 5px;
        }

        .dataTables_length select:focus {
            border-color: #13855c;
            box-shadow: 0 0 0 0.25rem rgba(19, 133, 92, 0.25);
            outline: none;
        }

        .dataTables_paginate .paginate_button {
            border-radius: 5px !important;
            padding: 5px 10px !important;
            margin: 5px 5px !important;
            background-color: #fff !important;
            color: #13855c !important;
            transition: background-color 0.3s !important;
        }

        .modal-content .form-group label {
            color: #0e6b47;
            margin-bottom: 5px;
        }

        .modal-content .form-control,
        .modal-content .form-select {
            border: 1px solid #0e6b47;
        }

        .modal-content .form-control:focus,
        .modal-content .form-select:focus {
            border-color: #00aaff;
            box-shadow: 0 0 0 0.25rem rgba(0, 170, 255, 0.25);
        }

        input[type="file"]::-webkit-file-upload-button {
            background-color: #e0f5ec;
            cursor: pointer;
            color: #0e6b47;
            transition: background-color 0.3s;
        }

        .form-group input.error-border,
        .form-group select.error-border {
            border-color: #d9534f;
        }

        .form-group input.error-border:focus,
        .form-group select.error-border:focus {
            box-shadow: 0 0 0 0.2rem rgba(217, 83, 79, 0.25);
            border-color: #d9534f;
        }

        .form-group input.error-border+label,
        .form-group select.error-border+label {
            color: #d9534f !important;
        }

        .form-group input.shake+label,
        .form-group select.shake+label {
            color: #d9534f !important;
            box-shadow: none;
        }

        .feedback {
            font-size: 12px;
            margin-top: 5px;
            margin-bottom: -5px;
            white-space: nowrap;
        }

        .feedback.success {
            margin-top: 7px !important;
            color: #0e6b47;
        }

        .feedback.error {
            color: #d9534f;
        }

        .error-border {
            border-color: #d9534f;
        }

        input[type="file"].error-border {
            border-color: #d9534f;
        }

        .shake {
            animation: shake 0.5s;
            border-color: #d9534f;
            box-shadow: 0 0 0 0.2rem rgba(217, 83, 79, 0.25);
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            50% {
                transform: translateX(5px);
            }

            75% {
                transform: translateX(-5px);
            }
        }

        #scrollToTopBtn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            background-color: #333333;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            width: 40px;
            font-size: 14px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 99999 !important;
        }

        #scrollToTopBtn:hover {
            background-color: #555555;
        }

        .not-allowed {
            cursor: not-allowed !important;
            pointer-events: none !important;
        }

        .not-allowed {
            cursor: not-allowed !important;
            pointer-events: none !important;
        }

        .loading {
            position: relative;
            pointer-events: none;
        }

        .loading::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            border: 3px solid transparent;
            border-top: 3px solid #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            transform: translate(-50%, -50%);
        }

        @keyframes spin {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        .loading span {
            opacity: 0;
        }

        .loading.btn {
            background-color: #1cc88a;
            color: #1cc88a;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand" href="<?= site_url('AdminPengajuanController'); ?>">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url('assets/img/logo-unjani.png') ?>">
                </div>
                <div class="sidebar-brand-text">ACCESS TRACK</div>
            </a>
            <hr class="sidebar-divider">
            <div class="sidebar-heading" style="font-size: 12px; margin-bottom: -7px;">EMAIL</div>
            <li class="nav-item active">
                <a class="nav-link" href="<?= site_url('AdminPengajuanController/data_pengajuan_email'); ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Pengajuan Email</span>
                </a>
            </li>
            <li class="nav-item" style="margin-top: -10px;">
                <a class="nav-link" href="<?= site_url('AdminPengajuanController/data_email_terdaftar'); ?>">
                    <i class="fas fa-envelope-open-text"></i>
                    <span>Email Terdaftar</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading" style="font-size: 12px; margin-bottom: -7px;">SUBDOMAIN</div>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('AdminPengajuanController/data_pengajuan_subdomain'); ?>">
                    <i class="fas fa-globe"></i>
                    <span>Pengajuan Subdomain</span>
                </a>
            </li>
            <li class="nav-item" style="margin-top: -10px;">
                <a class="nav-link" href="<?= site_url('AdminPengajuanController/data_subdomain_terdaftar'); ?>">
                    <i class="fas fa-sitemap"></i>
                    <span>Subdomain Terdaftar</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="text-center d-md-inline">
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
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <a href="<?= site_url('DashboardAdmin'); ?>" class="btn btn-kembali">
                            <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                        </a>
                    </ul>
                </nav>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="dropdown">
                            <button class="btn btn btn-cetak dropdown-toggle" type="button" id="dropdownCetakLaporan" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-download fa-sm" style="color: #ffffff; margin-right: 5px;"></i> Cetak Laporan
                            </button>
                            <ul class="dropdown-menu dropdown-cetak" aria-labelledby="dropdownCetakLaporan">
                                <li>
                                    <div class="px-3 py-2">
                                        <div class="input-group">
                                            <input type="text" id="monthYearPicker" class="form-control" placeholder="Pilih Bulan dan Tahun" readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <div class="dropdown-grid">
                                    <li><a class="dropdown-item" href="#" id="printDiajukan">Cetak Diajukan</a></li>
                                    <li><a class="dropdown-item" href="#" id="printDiproses">Cetak Diproses</a></li>
                                    <li><a class="dropdown-item" href="#" id="printDiverifikasi">Cetak Diverifikasi</a></li>
                                    <li><a class="dropdown-item" href="#" id="printDikirim">Cetak Dikirim</a></li>
                                </div>
                                <li class="text-center"><a class="dropdown-item" href="#" id="printAll">Cetak Semua</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="emailTabsContent">
                        <ul class="nav nav-tabs" id="emailTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="diajukan-tab" data-bs-toggle="tab" data-bs-target="#diajukan" type="button" role="tab" aria-controls="diajukan" aria-selected="true">Diajukan</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="diproses-tab" data-bs-toggle="tab" data-bs-target="#diproses" type="button" role="tab" aria-controls="diproses" aria-selected="false">Diproses</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="diverifikasi-tab" data-bs-toggle="tab" data-bs-target="#diverifikasi" type="button" role="tab" aria-controls="diverifikasi" aria-selected="false">Diverifikasi</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="dikirim-tab" data-bs-toggle="tab" data-bs-target="#dikirim" type="button" role="tab" aria-controls="dikirim" aria-selected="false">Dikirim</button>
                            </li>
                        </ul>
                        <div class="tab-pane fade show active" id="diajukan" role="tabpanel" aria-labelledby="diajukan-tab">
                            <table id="diajukanTable" class="table table-bordered table-responsive">
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
                                        <th>Status</th>
                                        <th>Aksi</th>
                                        <th>Edit</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($email_diajukan as $email): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $email['prodi']; ?></td>
                                            <td><?= $email['nim']; ?></td>
                                            <td><?= $email['nama_lengkap']; ?></td>
                                            <td><?= $email['email_diajukan']; ?></td>
                                            <td><?= $email['email_pengguna']; ?></td>
                                            <td>
                                                <a href="#" class="ktm-icon" data-img="<?= $email['ktm']; ?>" data-type="<?= pathinfo($email['ktm'], PATHINFO_EXTENSION); ?>">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                            <td><?= $email['tgl_pengajuan']; ?></td>
                                            <td><?= $email['status_pengajuan']; ?></td>
                                            <td>
                                                <form method="post" action="<?= site_url('AdminPengajuanController/updateStatusEmail'); ?>">
                                                    <input type="hidden" name="id" value="<?= $email['nim']; ?>">
                                                    <input type="hidden" name="status_pengajuan" value="Diproses">
                                                    <button type="submit" class="btn custom-process-btn">Proses</button>
                                                </form>
                                            </td>
                                            <td>
                                                <button class="btn btn-warning" style="color: #ffffff;" data-toggle="modal" data-target="#editModal"
                                                    data-id="<?= $email['nim']; ?>"
                                                    data-prodi="<?= $email['prodi']; ?>"
                                                    data-nama-lengkap="<?= $email['nama_lengkap']; ?>"
                                                    data-email="<?= $email['email_diajukan']; ?>"
                                                    data-email-pengguna="<?= $email['email_pengguna']; ?>"
                                                    data-ktm="<?= $email['ktm']; ?>">Edit</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="<?= $email['nim']; ?>">Hapus</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="diproses" role="tabpanel" aria-labelledby="diproses-tab">
                            <table id="diprosesTable" class="table table-bordered table-responsive">
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
                                        <th>Status</th>
                                        <th>Aksi</th>
                                        <th>Edit</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($email_diproses as $email): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $email['prodi']; ?></td>
                                            <td><?= $email['nim']; ?></td>
                                            <td><?= $email['nama_lengkap']; ?></td>
                                            <td><?= $email['email_diajukan']; ?></td>
                                            <td><?= $email['email_pengguna']; ?></td>
                                            <td>
                                                <a href="#" class="ktm-icon" data-img="<?= $email['ktm']; ?>" data-type="<?= pathinfo($email['ktm'], PATHINFO_EXTENSION); ?>">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                            <td><?= $email['tgl_pengajuan']; ?></td>
                                            <td><?= $email['status_pengajuan']; ?></td>
                                            <td>
                                                <form method="post" action="<?= site_url('AdminPengajuanController/updateStatusEmail'); ?>">
                                                    <input type="hidden" name="id" value="<?= $email['nim']; ?>">
                                                    <input type="hidden" name="status_pengajuan" value="Diverifikasi">
                                                    <button type="submit" class="btn custom-verify-btn">Verifikasi</button>
                                                </form>
                                            </td>
                                            <td>
                                                <button class="btn btn-warning" style="color: #ffffff;" data-toggle="modal" data-target="#editModal"
                                                    data-id="<?= $email['nim']; ?>"
                                                    data-prodi="<?= $email['prodi']; ?>"
                                                    data-nama-lengkap="<?= $email['nama_lengkap']; ?>"
                                                    data-email="<?= $email['email_diajukan']; ?>"
                                                    data-email-pengguna="<?= $email['email_pengguna']; ?>"
                                                    data-ktm="<?= $email['ktm']; ?>">Edit</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="<?= $email['nim']; ?>">Hapus</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="diverifikasi" role="tabpanel" aria-labelledby="diverifikasi-tab">
                            <table id="diverifikasiTable" class="table table-bordered table-responsive">
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
                                        <th>Status</th>
                                        <th>Aksi</th>
                                        <th>Edit</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($email_diverifikasi as $email): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $email['prodi']; ?></td>
                                            <td><?= $email['nim']; ?></td>
                                            <td><?= $email['nama_lengkap']; ?></td>
                                            <td><?= $email['email_diajukan']; ?></td>
                                            <td><?= $email['email_pengguna']; ?></td>
                                            <td>
                                                <a href="#" class="ktm-icon" data-img="<?= $email['ktm']; ?>" data-type="<?= pathinfo($email['ktm'], PATHINFO_EXTENSION); ?>">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                            <td><?= $email['tgl_pengajuan']; ?></td>
                                            <td><?= $email['status_pengajuan']; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn send-email-btn dropdown-toggle" type="button" id="dropdownFormButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Kirim Email
                                                    </button>
                                                    <div class="dropdown-menu p-4 dropdown-kirim" aria-labelledby="dropdownFormButton">
                                                        <form id="passwordForm" method="post" action="<?= site_url('AdminPengajuanController/sendEmailWithPassword'); ?>">
                                                            <input type="hidden" name="id" value="<?= $email['nim']; ?>">
                                                            <div class="mb-3">
                                                                <label for="emailDiajukan-<?= $email['nim']; ?>" class="form-label">Email yang Diajukan</label>
                                                                <input type="text" class="form-control" id="emailDiajukan-<?= $email['nim']; ?>" value="<?= $email['email_diajukan']; ?>" disabled style="width: calc(<?= strlen($email['email_diajukan']); ?>ch - 2ch); box-sizing: border-box;">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="password-<?= $email['nim']; ?>" class="form-label">Password</label>
                                                                <input type="text" class="form-control" id="password-<?= $email['nim']; ?>" name="password" required>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary send-btn w-100">Kirim</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-warning" style="color: #ffffff;" data-toggle="modal" data-target="#editModal"
                                                    data-id="<?= $email['nim']; ?>"
                                                    data-prodi="<?= $email['prodi']; ?>"
                                                    data-nama-lengkap="<?= $email['nama_lengkap']; ?>"
                                                    data-email="<?= $email['email_diajukan']; ?>"
                                                    data-email-pengguna="<?= $email['email_pengguna']; ?>"
                                                    data-ktm="<?= $email['ktm']; ?>">Edit</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="<?= $email['nim']; ?>">Hapus</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="dikirim" role="tabpanel" aria-labelledby="dikirim-tab">
                            <table id="dikirimTable" class="table table-bordered table-responsive">
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
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($email_dikirim as $email): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $email['prodi']; ?></td>
                                            <td><?= $email['nim']; ?></td>
                                            <td><?= $email['nama_lengkap']; ?></td>
                                            <td><?= $email['email_diajukan']; ?></td>
                                            <td><?= $email['email_pengguna']; ?></td>
                                            <td>
                                                <a href="#" class="ktm-icon" data-img="<?= $email['ktm']; ?>" data-type="<?= pathinfo($email['ktm'], PATHINFO_EXTENSION); ?>">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                            <td><?= $email['tgl_pengajuan']; ?></td>
                                            <td><?= $email['status_pengajuan']; ?></td>
                                            <td>
                                                <button class="btn btn-warning" style="color: #ffffff;" data-toggle="modal" data-target="#editModal"
                                                    data-id="<?= $email['nim']; ?>"
                                                    data-nama-lengkap="<?= $email['nama_lengkap']; ?>"
                                                    data-email="<?= $email['email_diajukan']; ?>"
                                                    data-email-pengguna="<?= $email['email_pengguna']; ?>"
                                                    data-prodi="<?= $email['prodi']; ?>"
                                                    data-ktm="<?= $email['ktm']; ?>">Edit</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="<?= $email['nim']; ?>">Hapus</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ktmModal" tabindex="-1" aria-labelledby="ktmModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-ktm modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownDownload" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-download"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownDownload" style="min-width: 250px;">
                                <li><a class="dropdown-item" href="#" id="downloadPng">Download PNG</a></li>
                                <li><a class="dropdown-item" href="#" id="downloadJpg">Download JPG</a></li>
                                <li><a class="dropdown-item" href="#" id="downloadJpeg">Download JPEG</a></li>
                            </ul>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="ktmImage" src="" class="img-fluid" alt="KTM">
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button id="zoomIn" class="btn btn-light">
                            <i class="fas fa-search-plus"></i>
                        </button>
                        <button id="zoomOut" class="btn btn-light">
                            <i class="fas fa-search-minus"></i>
                        </button>
                        <button id="rotateLeft" class="btn btn-light">
                            <i class="fas fa-undo"></i>
                        </button>
                        <button id="rotateRight" class="btn btn-light">
                            <i class="fas fa-redo"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document" style="width: 100%; max-width: 700px; margin-top: 150px; margin-bottom: 150px;">
                <div class="modal-content">
                    <div class="modal-header" style="background: linear-gradient(135deg, #13855c, #13855c, #1cc88a); color: #ffffff;">
                        <h5 class="modal-title" id="editModalLabel">Edit Pengajuan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #ffffff;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editForm" method="post" enctype="multipart/form-data" action="<?= site_url('AdminPengajuanController/editPengajuanEmail'); ?>">
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="editNim">Nomor Induk Mahasiswa (NIM)</label>
                                        <input type="text" class="form-control" id="editNim" disabled style="background-color: #e0f5ec;">
                                        <input type="hidden" name="nim" id="hiddenEditNim">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="editProdi">Program Studi</label>
                                        <select class="form-select" id="editProdi" name="prodi" required>
                                            <option value=""></option>
                                            <?php foreach ($program_studi as $value => $label): ?>
                                                <option value="<?= $value; ?>"><?= $label; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="editNamaLengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="editNamaLengkap" name="nama_lengkap" required>
                                        <div id="namaLengkapFeedback" class="feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="editEmail">Email yang Diajukan</label>
                                        <input type="email" class="form-control" id="editEmail" name="email_diajukan" required>
                                        <div id="emailValidationFeedback" class="feedback"></div>
                                        <div id="emailAvailabilityFeedback" class="feedback" style="margin-top: 10px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="editEmailPengguna">Email Pengguna</label>
                                        <input type="email" class="form-control" id="editEmailPengguna" name="email_pengguna" required>
                                        <div id="emailPenggunaFeedback" class="feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ktmPreview">KTM Saat Ini</label>
                                        <input type="hidden" name="current_ktm" id="hiddenEditKtm">
                                        <div id="ktmPreviewContainer">
                                            <img id="ktmPreview" src="" alt="KTM Preview" class="img-thumbnail" style="max-width: 300px; border-color: #0e6b47;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="editKtm">Ganti KTM</label>
                                        <input type="file" class="form-control" id="editKtm" name="ktm" accept="image/jpeg, image/jpg, image/png">
                                        <div id="ktmFeedback" class="feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border: none;">Batal</button>
                            <button type="submit" class="btn btn-primary btn-edit-simpan">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="width: 430px; max-width: 430px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus pengajuan ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <form id="deleteForm" method="post" action="<?= site_url('AdminPengajuanController/deletePengajuanEmail'); ?>">
                            <input type="hidden" name="id" id="deleteId">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Konfirmasi Aksi -->
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="width: 450px; max-width: 450px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Aksi</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modalBody">
                        Apakah Anda yakin ingin melanjutkan aksi ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border: none;">Batal</button>
                        <button type="button" class="btn btn-primary btn-aksi-ya" id="confirmActionBtn">Ya</button>
                    </div>
                </div>
            </div>
        </div>

        <button id="scrollToTopBtn" title="Go to top" class="btn btn-primary">
            <i class="fas fa-arrow-up"></i>
        </button>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-easing@1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.0.5/js/sb-admin-2.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

        <script>
            $(document).ready(function() {
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 200) {
                        $('#scrollToTopBtn').fadeIn();
                    } else {
                        $('#scrollToTopBtn').fadeOut();
                    }
                });

                $('#scrollToTopBtn').click(function() {
                    $('html, body').scrollTop(0);
                });

                $('#deleteModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var id = button.data('id');
                    var modal = $(this);
                    modal.find('#deleteId').val(id);
                });

                $('#editModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var nim = button.data('id');
                    var prodi = button.data('prodi');
                    var nama_lengkap = button.data('nama-lengkap');
                    var email = button.data('email');
                    var emailPengguna = button.data('email-pengguna');
                    var ktm = button.data('ktm');

                    var modal = $(this);
                    modal.find('#editNim').val(nim);
                    modal.find('#hiddenEditNim').val(nim);
                    modal.find('#editProdi').val(prodi);
                    modal.find('#editNamaLengkap').val(nama_lengkap);
                    modal.find('#editEmail').val(email);
                    modal.find('#editEmailPengguna').val(emailPengguna);

                    modal.find('#ktmPreview').attr('src', ktm);
                    modal.find('#hiddenEditKtm').val(ktm);
                    $('#editKtm').on('change', function() {
                        const file = this.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                $('#ktmPreview').attr('src', e.target.result);
                            };
                            reader.readAsDataURL(file);
                        }
                    });
                });

                $('#editModal').on('hide.bs.modal', function() {
                    $('#namaLengkapFeedback').text('').removeClass('feedback error success');
                    $('#emailAvailabilityFeedback').text('').removeClass('feedback error success');
                    $('#emailValidationFeedback').text('').removeClass('feedback error success');
                    $('#emailPenggunaFeedback').text('').removeClass('feedback error success');
                    $('#ktmFeedback').text('').removeClass('feedback error success');

                    $('#editNamaLengkap').removeClass('error-border');
                    $('#editEmail').removeClass('error-border');
                    $('#editEmailPengguna').removeClass('error-border');
                    $('#editKtm').removeClass('error-border');

                    $('#ktmPreview').attr('src', '');
                    $('#editKtm').val('');
                });

                var formToSubmit;
                var clickedButton;
                var actionConfirmed = false;
                $('.custom-process-btn, .custom-verify-btn').on('click', function(e) {
                    e.preventDefault();

                    formToSubmit = $(this).closest('form');
                    var actionText = '';
                    clickedButton = $(this);
                    actionConfirmed = false;

                    if ($(this).hasClass('custom-process-btn')) {
                        actionText = 'Apakah anda yakin ingin memproses pengajuan ini?';
                    } else if ($(this).hasClass('custom-verify-btn')) {
                        actionText = 'Apakah anda yakin ingin memverifikasi pengajuan ini?';
                    }
                    $('#modalBody').text(actionText);
                    $('#confirmModal').modal('show');
                });

                $('.send-btn').on('click', function(e) {
                    formToSubmit = $(this).closest('form');
                    var passwordField = formToSubmit.find('input[name="password"]');
                    var password = passwordField.val().trim();
                    if (password === '') {
                        e.stopImmediatePropagation();
                        return;
                    }

                    e.preventDefault();
                    var actionText = 'Apakah Anda yakin ingin mengirimkan email ini?';
                    $('#modalBody').text(actionText);
                    $('#confirmModal').modal('show');

                    clickedButton = $(this);
                    actionConfirmed = false;
                });

                $('#confirmActionBtn').on('click', function() {
                    actionConfirmed = true;
                    formToSubmit.submit();
                    $('#confirmModal').modal('hide');
                });

                $('#confirmModal').on('hidden.bs.modal', function() {
                    var passwordField = $('.send-btn').closest('form').find('input[name="password"]');
                    passwordField.val('');

                    $('.custom-process-btn, .custom-verify-btn, .send-btn, .btn-warning, .btn-danger').addClass('not-allowed');

                    if (actionConfirmed && clickedButton) {
                        passwordField.prop('disabled', true);
                        clickedButton.addClass('loading not-allowed');
                    }

                    if (!actionConfirmed && clickedButton) {
                        clickedButton.removeClass('loading not-allowed');
                        passwordField.prop('disabled', false);
                    }

                    actionConfirmed = false;
                });

                $('#diajukanTable, #diprosesTable, #diverifikasiTable, #dikirimTable').DataTable({
                    "pagingType": "simple_numbers",
                    "lengthMenu": [10, 25, 50, 100],
                    "language": {
                        "search": "Cari:",
                        "lengthMenu": "Tampilkan _MENU_ entri per halaman",
                        "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                        "infoEmpty": "Tidak ada entri tersedia",
                        "infoFiltered": "(disaring dari _MAX_ total entri)",
                        "paginate": {
                            "next": "Selanjutnya",
                            "previous": "Sebelumnya"
                        }
                    }
                });

                document.getElementById('sidebarToggle').addEventListener('click', function() {
                    document.body.classList.toggle('sidebar-collapsed');
                });

                $('#monthYearPicker').datepicker({
                    format: 'MM yyyy',
                    startView: 'months',
                    minViewMode: 'months',
                    autoclose: true
                });

                document.getElementById('printDiajukan').onclick = function() {
                    const monthYear = document.getElementById('monthYearPicker').value;
                    printTable('diajukanTable', 'Diajukan', monthYear);
                    $('#monthYearPicker').val('');
                };

                document.getElementById('printDiproses').onclick = function() {
                    const monthYear = document.getElementById('monthYearPicker').value;
                    printTable('diprosesTable', 'Diproses', monthYear);
                    $('#monthYearPicker').val('');
                };

                document.getElementById('printDiverifikasi').onclick = function() {
                    const monthYear = document.getElementById('monthYearPicker').value;
                    printTable('diverifikasiTable', 'Diverifikasi', monthYear);
                    $('#monthYearPicker').val('');
                };

                document.getElementById('printDikirim').onclick = function() {
                    const monthYear = document.getElementById('monthYearPicker').value;
                    printTable('dikirimTable', 'Dikirim', monthYear);
                    $('#monthYearPicker').val('');
                };

                document.getElementById('printAll').onclick = function() {
                    const monthYear = document.getElementById('monthYearPicker').value;
                    printAllTables(monthYear);
                    $('#monthYearPicker').val('');
                };
            });

            function printTable(tableId, status, monthYear) {
                const table = $(`#${tableId}`).DataTable();
                const data = prepareDataForPrint(table, status, monthYear);
                createPrintDocument(data, status, monthYear);
            }

            function printAllTables(monthYear) {
                const allData = [];
                ['diajukanTable', 'diprosesTable', 'diverifikasiTable', 'dikirimTable'].forEach(tableId => {
                    const table = $(`#${tableId}`).DataTable();
                    const data = prepareDataForPrint(table, null, monthYear);
                    allData.push(...data);
                });

                allData.sort((a, b) => new Date(b.tanggalPengajuan) - new Date(a.tanggalPengajuan));

                allData.forEach((item, index) => {
                    item.no = index + 1;
                });

                createPrintDocument(allData, 'Semua', monthYear);
            }

            function prepareDataForPrint(table, status, monthYear) {
                const data = table.rows().data();
                const formattedData = [];

                if (monthYear) {
                    const selectedYear = monthYear.split(" ")[1];
                    const selectedMonth = monthYear.split(" ")[0];

                    data.each((row, index) => {
                        const tanggalPengajuan = new Date(row[7]);
                        const year = tanggalPengajuan.getFullYear();
                        const month = tanggalPengajuan.toLocaleString('default', {
                            month: 'long'
                        });

                        if (year == selectedYear && month.toLowerCase() === selectedMonth.toLowerCase()) {
                            formattedData.push({
                                no: index + 1,
                                prodi: row[1],
                                nim: row[2],
                                nama: row[3],
                                emailDiajukan: row[4],
                                emailPengguna: row[5],
                                tanggalPengajuan: row[7],
                                status: status || row[8],
                            });
                        }
                    });
                } else {
                    data.each((row, index) => {
                        formattedData.push({
                            no: index + 1,
                            prodi: row[1],
                            nim: row[2],
                            nama: row[3],
                            emailDiajukan: row[4],
                            emailPengguna: row[5],
                            tanggalPengajuan: row[7],
                            status: status || row[8],
                        });
                    });
                }

                return formattedData;
            }

            function createPrintDocument(data, title, monthYear) {
                const currentDate = new Date();
                const options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                const formattedDate = currentDate.toLocaleDateString('id-ID', options);

                let printContent = `
    <div style="text-align: center;">
        <h2>Yayasan Kartika Eka Paksi</h2>
        <h3>Universitas Jenderal Achmad Yani (Unjani)</h3>
        <p>Kampus Cimahi: Jl. Terusan Jend. Sudirman, Cimahi Telp: (022) 1663186 - 6656, Fax: (022) 6652069</p>
        <p>Kampus Bandung: Jl. Gatot Subroto, Bandung Telp: (022) 7312741, Fax: (022) 7312741</p>
        <hr style=" ont-weight: bold;"/>
        <h4 style="margin-top: 35px; margin-bottom: 35px;">Data Pengajuan Pembuatan Email - ${title} Pada Bulan ${monthYear}</h4>
    </div>
    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>No</th>
                <th>Program Studi</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email yang Diajukan</th>
                <th>Email Pengguna</th>
                <th>Tanggal Pengajuan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>`;
                data.forEach(item => {
                    printContent += `
        <tr>
            <td>${item.no}</td>
            <td>${item.prodi}</td>
            <td>${item.nim}</td>
            <td>${item.nama}</td>
            <td>${item.emailDiajukan}</td>
            <td>${item.emailPengguna}</td>
            <td>${item.tanggalPengajuan}</td>
            <td>${item.status}</td>
        </tr>`;
                });
                printContent += `</tbody></table>`;
                printContent += `
    <div style="position: relative; right: 0; bottom: 0; text-align: right; margin-top: 35px;">
        <p>${formattedDate}</p>
        <img src="<?= base_url('assets/img/ttd.jpg') ?>" alt="Signature" style="width: 100px; height: auto; margin-top: 10px; margin-bottom: 15px;" />
        <p>Staf Administrasi SISFO UNJANI</p>
    </div>`;
                const printFrame = document.createElement('iframe');
                printFrame.style.display = 'none';
                document.body.appendChild(printFrame);
                const printWindow = printFrame.contentWindow || printFrame.contentDocument.parentWindow;
                printWindow.document.open();
                printWindow.document.write(`
    <html>
    <head>
        <title>Cetak Laporan</title>
        <style>
            body { font-family: Arial, sans-serif; position: relative;}
            table { width: 100%; border-collapse: collapse; }
            th, td { padding: 8px; text-align: left; }
            th { background-color: #f2f2f2; text-align: center; }
            @media print {
                @page { size: A4 landscape; margin: 9mm; }
            }
        </style>
    </head>
    <body onload="window.print(); window.parent.document.body.removeChild(window.frameElement);">
        ${printContent}
    </body>
    </html>`);
                printWindow.document.close();
            }

            document.addEventListener('DOMContentLoaded', function() {
                activateSavedTab();

                function saveActiveTab(tabId) {
                    localStorage.setItem('activeTab', tabId);
                }

                function activateSavedTab() {
                    const activeTabId = localStorage.getItem('activeTab');
                    if (activeTabId) {
                        const tabTrigger = document.querySelector(`button[data-bs-target="${activeTabId}"]`);
                        if (tabTrigger) {
                            const tab = new bootstrap.Tab(tabTrigger);
                            tab.show();

                            const tabPanes = document.querySelectorAll('.tab-pane');
                            tabPanes.forEach(pane => {
                                pane.classList.remove('show', 'active');
                            });
                            const activePane = document.querySelector(activeTabId);
                            if (activePane) {
                                activePane.classList.add('show', 'active');
                            }
                        }
                    }
                }

                document.addEventListener('shown.bs.tab', function(event) {
                    const tabId = event.target.getAttribute('data-bs-target');
                    saveActiveTab(tabId);
                });

                let zoomLevel = 1;
                let rotation = 0;
                let isDragging = false;
                let startX, startY, initialX, initialY;
                const ktmImage = document.getElementById('ktmImage');

                document.getElementById('zoomIn').addEventListener('click', function() {
                    zoomLevel += 0.1;
                    ktmImage.style.transform = `scale(${zoomLevel}) rotate(${rotation}deg)`;
                    ktmImage.style.cursor = 'grab';
                });
                document.getElementById('zoomOut').addEventListener('click', function() {
                    zoomLevel = Math.max(0.1, zoomLevel - 0.1);
                    ktmImage.style.transform = `scale(${zoomLevel}) rotate(${rotation}deg)`;
                    if (zoomLevel <= 1) {
                        ktmImage.style.cursor = 'default'; // Kembali ke cursor default saat zoom out
                    }
                });

                document.getElementById('rotateLeft').addEventListener('click', function() {
                    rotation -= 90;
                    ktmImage.style.transform = `scale(${zoomLevel}) rotate(${rotation}deg)`;
                });
                document.getElementById('rotateRight').addEventListener('click', function() {
                    rotation += 90;
                    ktmImage.style.transform = `scale(${zoomLevel}) rotate(${rotation}deg)`;
                });

                function downloadImage(format) {
                    const link = document.createElement('a');
                    link.download = `ktm-image.${format}`;
                    link.href = ktmImage.src;
                    link.click();
                }

                document.getElementById('downloadPng').addEventListener('click', function() {
                    downloadImage('png');
                });
                document.getElementById('downloadJpg').addEventListener('click', function() {
                    downloadImage('jpg');
                });
                document.getElementById('downloadJpeg').addEventListener('click', function() {
                    downloadImage('jpeg');
                });

                let lastTapTime = 0;
                ktmImage.addEventListener('click', function(e) {
                    const now = new Date().getTime();
                    if (now - lastTapTime < 300) {
                        if (zoomLevel > 1) {
                            zoomLevel = 1;
                            ktmImage.style.transform = `scale(${zoomLevel}) rotate(${rotation}deg)`;
                            ktmImage.style.cursor = 'default';
                        } else {
                            zoomLevel += 0.1;
                            ktmImage.style.transform = `scale(${zoomLevel}) rotate(${rotation}deg)`;
                            ktmImage.style.cursor = 'grab';
                        }
                    }
                    lastTapTime = now;
                });

                ktmImage.addEventListener('mousedown', function(e) {
                    if (zoomLevel > 1) {
                        isDragging = true;
                        startX = e.clientX;
                        startY = e.clientY;
                        initialX = ktmImage.offsetLeft;
                        initialY = ktmImage.offsetTop;
                        ktmImage.style.cursor = 'grabbing';
                    }
                });

                document.addEventListener('mousemove', function(e) {
                    if (isDragging) {
                        const dx = e.clientX - startX;
                        const dy = e.clientY - startY;
                        ktmImage.style.left = `${initialX + dx}px`;
                        ktmImage.style.top = `${initialY + dy}px`;
                    }
                });

                document.addEventListener('mouseup', function() {
                    isDragging = false;
                    ktmImage.style.cursor = 'grab';
                });

                document.getElementById('ktmModal').addEventListener('hide.bs.modal', function() {
                    zoomLevel = 1;
                    rotation = 0;
                    ktmImage.style.transform = 'scale(1) rotate(0deg)';
                    ktmImage.style.left = '0';
                    ktmImage.style.top = '0';
                    ktmImage.style.cursor = 'default';
                });

                const ktmIcons = document.querySelectorAll('.ktm-icon');
                ktmIcons.forEach(icon => {
                    icon.addEventListener('click', function() {
                        const imgSrc = this.getAttribute('data-img');
                        const imgLink = this.getAttribute('data-link');
                        document.getElementById('ktmImage').src = imgSrc;
                        const ktmModal = new bootstrap.Modal(document.getElementById('ktmModal'));
                        ktmModal.show();
                    });
                });

                const namaLengkapInput = document.getElementById('editNamaLengkap');
                const namaLengkapFeedback = document.getElementById('namaLengkapFeedback');
                namaLengkapInput.addEventListener('input', function() {
                    if (namaLengkapInput.value === '') {
                        namaLengkapFeedback.textContent = '';
                    } else if (!/^[A-Za-z\s]+$/.test(namaLengkapInput.value)) {
                        namaLengkapFeedback.textContent = 'Nama lengkap hanya boleh berisi huruf dan spasi.';
                        namaLengkapFeedback.className = 'feedback error';
                    } else {
                        namaLengkapFeedback.textContent = '';
                        namaLengkapInput.classList.remove('error-border');
                    }
                });

                const emailInput = document.getElementById('editEmail');
                const validationFeedback = document.getElementById('emailValidationFeedback');
                const availabilityFeedback = document.getElementById('emailAvailabilityFeedback');
                emailInput.addEventListener('input', function() {
                    const emailValue = emailInput.value;
                    const lengthPattern = /^.{6,30}$/;
                    const contentPattern = /^[a-z0-9.@]+$/;
                    const consecutiveDotPattern = /\.\./;
                    const startEndDotPattern = /^\.|\.$/;
                    const atSymbolPattern = /^([^@]*@{0,1}[^@]*)$/;
                    if (emailValue === '') {
                        validationFeedback.textContent = '';
                        availabilityFeedback.textContent = '';
                    } else if (!contentPattern.test(emailValue)) {
                        validationFeedback.textContent = 'Hanya huruf (a-z), angka (0-9), dan tanda titik (.) yang diizinkan.';
                        validationFeedback.className = 'feedback error';
                        availabilityFeedback.textContent = '';
                    } else if (startEndDotPattern.test(emailValue)) {
                        validationFeedback.textContent = 'Tanda titik (.) tidak boleh di awal atau di akhir username.';
                        validationFeedback.className = 'feedback error';
                        availabilityFeedback.textContent = '';
                    } else if (!lengthPattern.test(emailValue)) {
                        validationFeedback.textContent = 'Nama pengguna yang diajukan harus terdiri dari 6-30 karakter.';
                        validationFeedback.className = 'feedback error';
                        availabilityFeedback.textContent = '';
                    } else if (consecutiveDotPattern.test(emailValue)) {
                        validationFeedback.textContent = 'Tanda titik (.) tidak boleh berurutan.';
                        validationFeedback.className = 'feedback error';
                        availabilityFeedback.textContent = '';
                    } else {
                        validationFeedback.textContent = '';
                        checkEmailAvailability(emailValue);
                        emailInput.classList.remove('error-border');
                    }
                });

                function checkEmailAvailability(email) {
                    const emailInput = document.getElementById('editEmail');
                    const emailPrefix = email.split('@')[0];
                    const prodi = document.getElementById('editProdi').value;
                    const availabilityFeedback = document.getElementById('emailAvailabilityFeedback');

                    fetch('<?= site_url("AdminPengajuanController/check_email_availability"); ?>', {
                            method: 'POST',
                            body: new URLSearchParams({
                                'email_prefix': emailPrefix,
                                'prodi': prodi,
                                'nama_lengkap': document.getElementById('editNamaLengkap').value
                            }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'taken') {
                                availabilityFeedback.textContent = 'Username sudah terdaftar';
                                availabilityFeedback.className = 'feedback error';
                            } else {
                                availabilityFeedback.textContent = 'Username tersedia';
                                availabilityFeedback.className = 'feedback success';
                                emailInput.classList.remove('error-border');
                            }
                        })
                        .catch(error => {
                            availabilityFeedback.textContent = 'Terjadi kesalahan. Coba lagi.';
                            availabilityFeedback.className = 'feedback error';
                        });
                }

                const emailPenggunaInput = document.getElementById('editEmailPengguna');
                const emailPenggunaFeedback = document.getElementById('emailPenggunaFeedback');
                emailPenggunaInput.addEventListener('input', function() {
                    const emailValue = emailPenggunaInput.value;
                    const lengthPattern = /^.{6,30}$/;
                    const contentPattern = /^[a-z0-9.@]+$/;
                    const consecutiveDotPattern = /\.\./;
                    const startEndDotPattern = /^\.|\.$/;
                    if (emailValue === '') {
                        emailPenggunaFeedback.textContent = '';
                    } else if (!contentPattern.test(emailValue)) {
                        emailPenggunaFeedback.textContent = 'Hanya huruf (a-z), angka (0-9), dan tanda titik (.) yang diizinkan.';
                        emailPenggunaFeedback.className = 'feedback error';
                    } else if (startEndDotPattern.test(emailValue)) {
                        emailPenggunaFeedback.textContent = 'Tanda titik (.) tidak boleh di awal atau di akhir username.';
                        emailPenggunaFeedback.className = 'feedback error';
                    } else if (!lengthPattern.test(emailValue)) {
                        emailPenggunaFeedback.textContent = 'Email harus terdiri dari 6-30 karakter.';
                        emailPenggunaFeedback.className = 'feedback error';
                    } else if (consecutiveDotPattern.test(emailValue)) {
                        emailPenggunaFeedback.textContent = 'Tanda titik (.) tidak boleh berurutan.';
                        emailPenggunaFeedback.className = 'feedback error';
                    } else {
                        emailPenggunaFeedback.textContent = '';
                        emailPenggunaInput.classList.remove('error-border');
                    }
                });

                const ktmInput = document.getElementById('editKtm');
                const ktmFeedback = document.getElementById('ktmFeedback');
                ktmInput.addEventListener('change', function() {
                    const file = ktmInput.files[0];
                    const allowedExtensions = ['image/jpeg', 'image/png', 'image/jpg'];
                    const maxSize = 2 * 1024 * 1024;
                    if (file) {
                        if (!allowedExtensions.includes(file.type)) {
                            ktmFeedback.textContent = 'File KTM harus dalam format .png, .jpg, atau .jpeg.';
                            ktmFeedback.className = 'feedback error';
                        } else if (file.size > maxSize) {
                            ktmFeedback.textContent = 'Ukuran file KTM tidak boleh lebih dari 2MB.';
                            ktmFeedback.className = 'feedback error';
                        } else {
                            ktmFeedback.textContent = '';
                            ktmInput.classList.remove('error-border');
                        }
                    }
                });

                const form = document.getElementById('editForm');
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const namaLengkapInput = document.getElementById('editNamaLengkap');
                    const emailInput = document.getElementById('editEmail');
                    const emailPenggunaInput = document.getElementById('editEmailPengguna');
                    const ktmInput = document.getElementById('editKtm');

                    const namaLengkapFeedback = document.getElementById('namaLengkapFeedback');
                    const emailAvailabilityFeedback = document.getElementById('emailAvailabilityFeedback');
                    const emailPenggunaFeedback = document.getElementById('emailPenggunaFeedback');
                    const ktmFeedback = document.getElementById('ktmFeedback');
                    let hasError = false;

                    if (namaLengkapFeedback && namaLengkapFeedback.textContent.includes('Nama lengkap hanya boleh berisi huruf dan spasi.')) {
                        namaLengkapInput.classList.add('shake', 'error-border');
                        setTimeout(() => {
                            namaLengkapInput.classList.remove('shake');
                        }, 500);
                        hasError = true;
                    }

                    if (emailAvailabilityFeedback.textContent.includes('Username sudah terdaftar')) {
                        emailInput.classList.add('shake', 'error-border');

                        setTimeout(() => {
                            emailInput.classList.remove('shake');
                        }, 500);
                        hasError = true;
                    }

                    if (validationFeedback.textContent.includes('Nama pengguna yang diajukan harus terdiri dari 6-30 karakter.') ||
                        validationFeedback.textContent.includes('Hanya huruf (a-z), angka (0-9), dan tanda titik (.) yang diizinkan.') ||
                        validationFeedback.textContent.includes('Tanda titik (.) tidak boleh di awal atau di akhir username.') ||
                        validationFeedback.textContent.includes('Tanda titik (.) tidak boleh berurutan.')) {
                        emailInput.classList.add('shake', 'error-border');

                        setTimeout(() => {
                            emailInput.classList.remove('shake');
                        }, 500);

                        hasError = true;
                    }

                    if (emailPenggunaFeedback.textContent.includes('Hanya huruf (a-z), angka (0-9), dan tanda titik (.) yang diizinkan.') ||
                        emailPenggunaFeedback.textContent.includes('Tanda titik (.) tidak boleh di awal atau di akhir username.') ||
                        emailPenggunaFeedback.textContent.includes('Email harus terdiri dari 6-30 karakter.') ||
                        emailPenggunaFeedback.textContent.includes('Tanda titik (.) tidak boleh berurutan.')) {

                        emailPenggunaInput.classList.add('shake', 'error-border');
                        setTimeout(() => {
                            emailPenggunaInput.classList.remove('shake');
                        }, 500);
                        hasError = true;
                    }

                    if (ktmFeedback && ktmFeedback.textContent.includes('File KTM harus dalam format .png, .jpg, atau .jpeg.') ||
                        ktmFeedback.textContent.includes('Ukuran file KTM tidak boleh lebih dari 2MB.')) {
                        ktmInput.classList.add('shake', 'error-border');
                        setTimeout(() => {
                            ktmInput.classList.remove('shake');
                        }, 500);
                        hasError = true;
                    }

                    if (!hasError) {
                        const submitButton = form.querySelector('.btn-edit-simpan');
                        submitButton.classList.add('loading');
                        submitButton.disabled = true;
                        setTimeout(() => {
                            form.submit();
                        }, 1000);
                    }
                });
            });
        </script>
</body>

</html>