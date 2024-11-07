<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?= base_url('assets/img/logo-unjani.png'); ?>" rel="icon" type="image/png">
    <title>Admin - Subdomain Terdaftar</title>

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

        .admin-name {
            margin-right: 8px;
            display: inline;
            font-size: 15px;
            font-weight: bold;
            color: #333;
        }

        .img-profile {
            width: 30px !important;
            height: 30px !important;
            margin-left: 7px;
            border-radius: 50%;
            background-color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 15px;
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

        .table th,
        .table td {
            padding: 0;
            margin: 0;
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

        .btn-ya {
            background-color: #dc3545;
            color: #ffffff;
            width: 70px;
            margin-top: 30px;
        }

        .btn-ya:hover {
            background-color: #c82333;
            color: #ffffff;
            transition: background-color 0.3s ease;
        }

        .btn-tidak {
            background-color: #13855c;
            color: #ffffff;
            width: 70px;
            margin-top: 30px;
        }

        .btn-tidak:hover {
            background-color: #0e6b47;
            color: #ffffff;
            transition: background-color 0.3s ease;
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

        .dataTables_paginate .paginate_button:hover {}

        .dataTables_paginate .paginate_button.current {}

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
            color: green;
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
            <div class="sidebar-heading" style="font-size: 12px; margin-bottom: -7px;">DATA PENGAJUAN</div>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('AdminPengajuanController/data_pengajuan_email'); ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Pengajuan Email</span>
                </a>
            </li>
            <li class="nav-item" style="margin-top: -10px;">
                <a class="nav-link" href="<?= site_url('AdminPengajuanController/data_pengajuan_subdomain'); ?>">
                    <i class="fas fa-globe"></i>
                    <span>Pengajuan Subdomain</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading" style="font-size: 12px; margin-bottom: -7px;">DATA TERDAFTAR</div>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('AdminPengajuanController/data_email_terdaftar'); ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Email Terdaftar</span>
                </a>
            </li>
            <li class="nav-item active" style="margin-top: -10px;">
                <a class="nav-link" href="<?= site_url('AdminPengajuanController/data_subdomain_terdaftar'); ?>">
                    <i class="fas fa-globe"></i>
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
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="admin-name"><?= $this->session->userdata('admin_name'); ?></span>
                                <div class="img-profile">
                                    <i class="fas fa-user"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">DASHBOARD</h1>
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
                                <li class="text-center"><a class="dropdown-item" href="#" id="printAll">Cetak</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="emailTabsContent">
                        <table id="subdomainterdaftarTable" class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Unit Kerja</th>
                                    <th>Nomor Induk</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Subdomain</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($subdomain_terdaftar as $subdomain): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $subdomain['unit_kerja']; ?></td>
                                        <td><?= $subdomain['nomor_induk']; ?></td>
                                        <td><?= $subdomain['penanggung_jawab']; ?></td>
                                        <td><?= $subdomain['sub_domain']; ?></td>
                                        <td><?= $subdomain['tgl_selesai']; ?></td>
                                        <td>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="<?= $subdomain['id_subdomain']; ?>">Hapus</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
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
                        <form id="deleteForm" method="post" action="<?= site_url('AdminPengajuanController/deleteSubdomainTerdaftar'); ?>">
                            <input type="hidden" name="id" id="deleteId">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 350px;">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <i class="fas fa-exclamation-circle" style="color: #dc3545; font-size: 100px; margin-top: 30px;"></i>
                        <p class="status-text">Konfirmasi Logout</p>
                        <p>Apakah Anda yakin ingin keluar dari halaman ini?</p>
                        <a class="btn btn-ya" href="<?= site_url('LoginPengajuanController/logout'); ?>">Ya</a>
                        <button type="button" class="btn btn-tidak" data-bs-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-easing@1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.0.5/js/sb-admin-2.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#deleteModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var id = button.data('id');
                    var modal = $(this);
                    modal.find('#deleteId').val(id);
                });

                var formToSubmit;
                $('#confirmActionBtn').on('click', function() {
                    formToSubmit.submit();
                    $('#confirmModal').modal('hide');
                });

                $('#subdomainterdaftarTable').DataTable({
                    "pagingType": "simple_numbers",
                    "lengthMenu": [5, 10, 25, 50, 100],
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
                const table = $('#emailterdaftarTable').DataTable();
                const data = prepareDataForPrint(table, monthYear);

                data.sort((a, b) => new Date(b.tanggalPengajuan) - new Date(a.tanggalPengajuan));
                data.forEach((item, index) => {
                    item.no = index + 1;
                });

                createPrintDocument(data, 'Semua', monthYear);
            }

            function prepareDataForPrint(table, monthYear) {
                const data = table.rows().data();
                const formattedData = [];

                if (monthYear) {
                    const selectedYear = monthYear.split(" ")[1];
                    const selectedMonth = monthYear.split(" ")[0];

                    data.each((row, index) => {
                        const tanggalPengajuan = new Date(row[6]); // Index 6 untuk tgl_selesai
                        const year = tanggalPengajuan.getFullYear();
                        const month = tanggalPengajuan.toLocaleString('default', {
                            month: 'long'
                        });

                        if (year == selectedYear && month.toLowerCase() === selectedMonth.toLowerCase()) {
                            formattedData.push({
                                no: index + 1,
                                unit_kerja: row[1],
                                nomor_induk: row[2],
                                penanggung_jawab: row[3],
                                sub_domain: row[4],
                                tgl_selesai: row[5]
                            });
                        }
                    });
                } else {
                    data.each((row, index) => {
                        formattedData.push({
                            no: index + 1,
                            unit_kerja: row[1],
                            nomor_induk: row[2],
                            penanggung_jawab: row[3],
                            sub_domain: row[4],
                            tgl_selesai: row[5]
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
    <hr style="font-weight: bold;"/>
    <h4 style="margin-top: 35px; margin-bottom: 35px;">Data Email Terdaftar- ${title} Pada Bulan ${monthYear}</h4>
</div>
<table border="1" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th>No</th>
            <th>Unit Kerja</th>
            <th>Nomor Induk</th>
            <th>Penanggung Jawab</th>
            <th>Subdomain</th>
            <th>Tanggal Selesai Pengajuan</th>
        </tr>
    </thead>
    <tbody>`;

                data.forEach(item => {
                    printContent += `
    <tr>
        <td>${item.no}</td>
        <td>${item.unit_kerja}</td>
        <td>${item.nomor_induk}</td>
        <td>${item.penanggung_jawab}</td>
        <td>${item.sub_domain}</td>
        <td>${item.tgl_selesai}</td>
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
        </script>
</body>

</html>