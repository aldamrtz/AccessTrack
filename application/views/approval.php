<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Pengajuan Kartu Akses</title>
    <!-- Bootstrap CSS dari CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            background-color: #343a40;
            height: 100vh;
            padding: 20px;
            color: white;
        }

        .sidebar-header h3 {
            margin-bottom: 30px;
        }

        .sidebar a {
            color: white;
            font-weight: bold;
            display: block;
            padding: 10px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .sidebar a:hover {
            background-color: #495057;
            border-radius: 5px;
        }

        .container-fluid {
            padding: 20px;
        }

        h2 {
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: bold;
            color: #343a40;
        }

        .btn-success, .btn-danger {
            width: 100px;
            padding: 10px;
        }

        table {
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .thead-dark th {
            background-color: #343a40;
            color: white;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .form-control {
            border-radius: 5px;
        }

        .nav-tabs .nav-link {
            color: #495057;
            font-weight: bold;
        }

        .nav-tabs .nav-link.active {
            background-color: #343a40;
            color: white;
            border-radius: 5px;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-success:hover, .btn-danger:hover {
            opacity: 0.8;
        }

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Panggil sidebar -->
                <?php $this->load->view('templates/sidebar'); ?>
            </div>
            <div class="col-md-9">
                <h2 class="mt-4">Daftar Pengajuan Kartu Akses</h2>

                <!-- Pencarian -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <input type="text" id="search" class="form-control" placeholder="Cari berdasarkan nama...">
                    </div>
                    <div class="col-md-4">
                        <select id="filterStatus" class="form-control">
                            <option value="all">Semua Status</option>
                            <option value="pending">Menunggu Persetujuan</option>
                            <option value="approved">Disetujui</option>
                        </select>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="<?= base_url('access/export_excel'); ?>" class="btn btn-success">Export ke Excel</a>
                    </div>
                </div>

                <ul class="nav nav-tabs" id="approvalTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="true">Menunggu Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="approved-tab" data-toggle="tab" href="#approved" role="tab" aria-controls="approved" aria-selected="false">Disetujui</a>
                    </li>
                </ul>
                <div class="tab-content" id="approvalTabContent">
                    <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                        <table class="table table-bordered mt-3" id="pendingTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Jenis Pengajuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pending as $pnd): ?>
                                <tr>
                                    <td><?= $pnd['id_KA']; ?></td>
                                    <td><?= $pnd['nama_lengkap']; ?></td>
                                    <td><?= $pnd['email']; ?></td>
                                    <td><?= ucfirst($pnd['applicant_type']); ?></td>
                                    <td>
                                        <a href="<?= base_url('access/approve/'.$pnd['id_KA']); ?>" class="btn btn-success btn-sm">Approve</a>
                                        <a href="<?= base_url('access/reject/'.$pnd['id_KA']); ?>" class="btn btn-danger btn-sm">Reject</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php if(empty($pending)): ?>
                            <p class="text-center">Tidak ada pengajuan yang menunggu persetujuan.</p>
                        <?php endif; ?>
                    </div>
                    <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                        <table class="table table-bordered mt-3" id="approvedTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Jenis Pengajuan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($approved as $app): ?>
                                <tr>
                                    <td><?= $app['id_KA']; ?></td>
                                    <td><?= $app['nama_lengkap']; ?></td>
                                    <td><?= $app['email']; ?></td>
                                    <td><?= ucfirst($app['applicant_type']); ?></td>
                                    <td><?= ucfirst($app['status']); ?></td>
                                    <td>
                                        <a href="<?= base_url('access/hapus_pengajuan/'.$app['id_KA']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?');">Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php if(empty($approved)): ?>
                            <p class="text-center">Tidak ada pengajuan yang sudah disetujui.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery dan Bootstrap JS dari CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Tambahan Script untuk Pencarian dan Filter -->
    <script>
        $(document).ready(function(){
            // Pencarian Nama
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#pendingTable tbody tr, #approvedTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            // Filter Status
            $("#filterStatus").on("change", function() {
                var status = $(this).val();
                if (status === "all") {
                    $("#pendingTable tbody tr, #approvedTable tbody tr").show();
                } else {
                    $("#pendingTable tbody tr, #approvedTable tbody tr").filter(function() {
                        $(this).toggle($(this).find('td:nth-child(5)').text().toLowerCase().indexOf(status) > -1);
                    });
                }
            });
        });
    </script>
</body>
</html>
