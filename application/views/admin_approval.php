<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Pengajuan Kartu Akses</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>
    <div class="container">
        <h2>Approval Pengajuan Kartu Akses</h2>
        <table class="table table-bordered">
            <thead>
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
                        <a href="<?= base_url('access/approve/'.$pnd['id_KA']); ?>" class="btn btn-success">Approve</a>
                        <a href="<?= base_url('access/reject/'.$pnd['id_KA']); ?>" class="btn btn-danger">Reject</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php if(empty($pending)): ?>
            <p class="text-center">Tidak ada pengajuan yang menunggu persetujuan.</p>
        <?php endif; ?>
    </div>
</body>
</html>
