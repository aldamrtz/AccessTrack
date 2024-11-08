<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Pengajuan Kartu Akses</title>
    <!-- Bootstrap CSS dari CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f3f6;
            font-family: 'Roboto', sans-serif;
        }
        .sidebar {
            background-color: #343a40;
            height: 100vh;
            padding: 20px;
            color: white;
        }
        .sidebar-header h3 {
            margin-bottom: 30px;
            color: #ffc107;
            text-transform: uppercase;
            font-size: 20px;
            letter-spacing: 2px;
        }
        .sidebar a {
            color: white;
            font-weight: bold;
            display: block;
            padding: 10px;
            text-decoration: none;
            transition: all 0.3s;
            margin-bottom: 10px;
            font-size: 16px;
        }
        .sidebar a:hover {
            background-color: #495057;
            border-radius: 8px;
        }
        .container-fluid {
            padding: 40px;
        }
        h2 {
            font-size: 28px;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 30px;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-approve {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 50px;
            transition: all 0.3s;
            box-shadow: 0px 4px 10px rgba(40, 167, 69, 0.3);
        }
        .btn-approve:hover {
            background-color: #218838;
            box-shadow: 0px 6px 12px rgba(40, 167, 69, 0.5);
            transform: translateY(-2px);
        }
        .btn-reject {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 50px;
            transition: all 0.3s;
            box-shadow: 0px 4px 10px rgba(220, 53, 69, 0.3);
        }
        .btn-reject:hover {
            background-color: #c82333;
            box-shadow: 0px 6px 12px rgba(220, 53, 69, 0.5);
            transform: translateY(-2px);
        }
        .table {
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
            padding: 15px;
        }
        .thead-dark th {
            background-color: #6c757d;
            color: white;
            font-size: 16px;
        }
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
        .nav-tabs .nav-link {
            color: #495057;
            font-weight: bold;
            border: none;
            transition: all 0.3s;
        }
        .nav-tabs .nav-link.active {
            background-color: #343a40;
            color: white;
            border-radius: 8px;
        }
        .search-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .search-box input {
            width: 100%;
            margin-right: 15px;
            border-radius: 10px;
            padding: 10px;
        }
        .search-box select {
            width: 100%;
            border-radius: 10px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php $this->load->view('templates/sidebar'); ?>
            </div>
            <div class="col-md-9">
                <h2>Daftar Pengajuan Kartu Akses</h2>
                <div class="search-box">
                    <div class="col-md-6">
                        <input type="text" id="search" class="form-control" placeholder="Cari berdasarkan nama...">
                    </div>
                    <div class="col-md-3">
                        <select id="filterStatus" class="form-control">
                            <option value="all">Semua Status</option>
                            <option value="pending">Menunggu Persetujuan</option>
                            <option value="approved">Disetujui</option>
                        </select>
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
                                    <th>Program Studi</th>
                                    <th>Jenis Pengajuan</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pending as $pnd): ?>
                                <tr>
                                    <td><?= $pnd['id_KA']; ?></td>
                                    <td><?= $pnd['nama_lengkap']; ?></td>
                                    <td><?= $pnd['email']; ?></td>
                                    <td><?= $pnd['faculty_department']; ?></td>
                                    <td><?= $pnd['program_studi']; ?></td>
                                    <td><?= ucfirst($pnd['applicant_type']); ?></td>
                                    <td>
                                        <?php if ($pnd['applicant_type'] == 'Mahasiswa' && !empty($pnd['bukti_pembayaran'])): ?>
                                            <a href="<?= base_url('uploads/payment_proofs/'.$pnd['bukti_pembayaran']); ?>" target="_blank">Lihat Bukti</a>
                                        <?php else: ?>
                                            Tidak Ada Bukti
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('access/approve/'.$pnd['id_KA']); ?>" class="btn btn-success btn-sm btn-approve">
                                            <i class="fas fa-check"></i> Approve
                                        </a>
                                        <a href="<?= base_url('access/reject/'.$pnd['id_KA']); ?>" class="btn btn-danger btn-sm btn-reject">
                                            <i class="fas fa-times"></i> Reject
                                        </a>
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
                                    <th>Program Studi</th>
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
                                    <td><?= $app['faculty_department']; ?></td>
                                    <td><?= ucfirst($app['applicant_type']); ?></td>
                                    <td><?= ucfirst($app['status']); ?></td>
                                    <td>
                                        <a href="<?= base_url('access/hapus_pengajuan/'.$app['id_KA']); ?>" class="btn btn-danger btn-sm btn-reject" onclick="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?');">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </a>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                var activeTab = $("#approvalTabs .nav-link.active").attr("id");
                var tableId = activeTab === "pending-tab" ? "#pendingTable" : "#approvedTable";

                $(tableId + " tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            $("#filterStatus").on("change", function() {
                var status = $(this).val();
                var activeTab = $("#approvalTabs .nav-link.active").attr("id");
                var tableId = activeTab === "pending-tab" ? "#pendingTable" : "#approvedTable";

                $(tableId + " tbody tr").each(function() {
                    var rowStatus = $(this).find('td:nth-child(6)').text().toLowerCase(); // Pastikan ini menyesuaikan kolom Status
                    if (status === "all" || rowStatus.indexOf(status) > -1) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

            $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
                $("#search").val("");
                $("#filterStatus").val("all");
                $("#pendingTable tbody tr, #approvedTable tbody tr").show();
            });
        });
    </script>
</body>
</html>
