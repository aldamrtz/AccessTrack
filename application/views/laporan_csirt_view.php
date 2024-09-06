<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan CSIRT</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan_csirt.css'); ?>">
</head>
<body>
    <div class="container">
        <h2>Laporan CSIRT</h2>
        <?php if (empty($reports)) : ?>
            <p>Tidak ada laporan yang ditemukan saat ini.</p>
        <?php else : ?>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th class="column-id">ID</th>
                            <th>Nama Pelapor</th>
                            <th>NIP</th>
                            <th>Fakultas</th>
                            <th>Jurusan</th>
                            <th>Bagian</th>
                            <th>Nama Website</th>
                            <th class="column-deskripsi">Deskripsi Masalah</th>
                            <th>Tanggal Pelaporan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reports as $report) : ?>
                            <tr>
                                <td class="column-id"><?php echo $report['id']; ?></td>
                                <td><?php echo $report['nama_pelapor']; ?></td>
                                <td><?php echo $report['nip']; ?></td>
                                <td><?php echo $report['fakultas']; ?></td>
                                <td><?php echo $report['jurusan']; ?></td>
                                <td><?php echo $report['bagian']; ?></td>
                                <td><?php echo $report['nama_website']; ?></td>
                                <td class="column-deskripsi" id="desc-<?php echo $report['id']; ?>">
                                    <span class="short-text"><?php echo nl2br(htmlspecialchars(substr($report['deskripsi_masalah'], 0, 100))); ?></span>
                                    <?php if (strlen($report['deskripsi_masalah']) > 100): ?>
                                        <span class="more-text"><?php echo nl2br(htmlspecialchars(substr($report['deskripsi_masalah'], 100))); ?></span>
                                        <a href="#" class="toggle-more" onclick="toggleMoreText(event, '<?php echo $report['id']; ?>')">Selanjutnya</a>
                                    <?php endif; ?>
                                </td>
                                <!-- Menampilkan Tanggal Pelaporan dengan Zona Waktu Indonesia -->
                                <td><?php echo date('d M Y', strtotime($report['tanggal_pelaporan'])); ?></td>
                                <td><?php echo ucfirst($report['status']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <!-- JavaScript untuk toggle teks "Selanjutnya" -->
    <script src="<?php echo base_url('assets/js/laporan_csirt.js'); ?>"></script>
</body>
</html>