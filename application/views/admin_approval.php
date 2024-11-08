<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Pengajuan Kartu Akses</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #343a40;
            font-weight: bold;
        }
        .table thead {
            background-color: #343a40;
            color: #ffffff;
        }
        .btn {
            margin: 2px;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <h2 class="text-center mb-4">Approval Pengajuan Kartu Akses</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Fakultas/Departemen</th> <!-- Kolom Fakultas/Departemen -->
                    <th>Program Studi</th> <!-- Kolom Program Studi -->
                    <th>Jenis Pengajuan</th>
                    <th>Bukti Pembayaran</th> <!-- Kolom Bukti Pembayaran -->
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pending as $pnd): ?>
                <tr>
                    <td><?= $pnd['id_KA']; ?></td>
                    <td><?= $pnd['nama_lengkap']; ?></td>
                    <td><?= $pnd['email']; ?></td>
                    <td><?= $pnd['faculty_department'] ?? 'Tidak ada data'; ?></td> <!-- Menampilkan fakultas/department -->
                    <td><?= $pnd['program_studi'] ?? 'Tidak ada data'; ?></td> <!-- Menampilkan program studi -->
                    <td><?= ucfirst($pnd['applicant_type']); ?></td>
                    <td>
                        <?php if (!empty($pnd['payment_proof'])): ?> <!-- Menampilkan bukti pembayaran jika ada -->
                            <a href="<?= base_url('uploads/' . $pnd['payment_proof']); ?>" target="_blank">Lihat Bukti</a>
                        <?php else: ?>
                            Tidak ada bukti
                        <?php endif; ?>
                    </td>
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

    <!-- Script Bootstrap -->
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
