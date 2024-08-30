<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Laporan CSIRT</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin_approval.css'); ?>">
</head>
<body>
    <div class="container">
        <h2>Laporan Laporan CSIRT</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pelapor</th>
                    <th>NIP</th>
                    <th>Fakultas</th>
                    <th>Jurusan</th>
                    <th>Bagian</th>
                    <th>Nama Website</th>
                    <th>Deskripsi Masalah</th>
                    <th>Bukti File</th>
                    <th>Status</th>
                    <th>Tanggal Pelaporan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reports as $report) : ?>
                    <tr>
                        <td><?php echo $report['id']; ?></td>
                        <td><?php echo $report['nama_pelapor']; ?></td>
                        <td><?php echo $report['nip']; ?></td>
                        <td><?php echo $report['fakultas']; ?></td>
                        <td><?php echo $report['jurusan']; ?></td>
                        <td><?php echo $report['bagian']; ?></td>
                        <td><?php echo $report['nama_website']; ?></td>
                        <td><?php echo $report['deskripsi_masalah']; ?></td>
                        <td>
                            <?php if (!empty($report['bukti_file'])): ?>
                                <a href="<?php echo base_url('uploads/' . $report['bukti_file']); ?>" target="_blank">Lihat Bukti</a>
                            <?php else: ?>
                                Tidak Ada Bukti
                            <?php endif; ?>
                        </td>
                        <td><?php echo ucfirst($report['status']); ?></td>
                        <td><?php echo $report['tanggal_pelaporan']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>