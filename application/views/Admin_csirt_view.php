<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Laporan CSIRT</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin_approval.css'); ?>">
</head>
<body>
    <div class="container">
        <h2>Approval Laporan CSIRT</h2>
        <?php if (empty($reports)) : ?>
            <p>Tidak ada laporan yang perlu disetujui saat ini.</p>
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
                            <th>Bukti File</th>
                            <th>Status</th>
                            <th>Aksi</th>
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
                                <td>
                                    <?php if (!empty($report['bukti_file'])): ?>
                                        <a href="#" onclick="showModal('<?php echo base_url('uploads/' . $report['bukti_file']); ?>', '<?php echo pathinfo($report['bukti_file'], PATHINFO_EXTENSION); ?>')">Lihat</a>
                                    <?php else: ?>
                                        Tidak Ada Bukti
                                    <?php endif; ?>
                                </td>
                                <td><?php echo ucfirst($report['status']); ?></td>
                                <td>
                                    <div class="btn-container">
                                        <a href="<?php echo site_url('admin_csirt/approve_report/' . $report['id']); ?>" class="btn btn-approve">Setujui</a>
                                        <a href="<?php echo site_url('admin_csirt/reject_report/' . $report['id']); ?>" class="btn btn-reject">Tolak</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <!-- Modal untuk menampilkan file -->
    <div id="fileModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-content">
            <img id="fileImage" src="" alt="Bukti File" style="display:none; max-width: 100%;">
            <iframe id="filePDF" src="" style="display:none; width: 100%; height: 500px;"></iframe>
            <a id="downloadLink" href="" download style="display: none;">Unduh File</a>
        </div>
    </div>

    <!-- JavaScript untuk modal -->
    <script src="<?php echo base_url('assets/js/admin_csirt.js'); ?>"></script>
    <script>
        function showModal(filePath, fileType) {
            var fileImage = document.getElementById('fileImage');
            var filePDF = document.getElementById('filePDF');
            var downloadLink = document.getElementById('downloadLink');
            
            // Reset tampilannya
            fileImage.style.display = 'none';
            filePDF.style.display = 'none';
            downloadLink.style.display = 'none';

            // Jika file adalah PDF, tampilkan dalam iframe
            if (fileType === 'pdf') {
                filePDF.src = filePath;
                filePDF.style.display = 'block';
            } else {
                // Jika file adalah gambar, tampilkan dalam tag img
                fileImage.src = filePath;
                fileImage.style.display = 'block';
            }

            // Tampilkan tombol unduh
            downloadLink.href = filePath;
            downloadLink.style.display = 'block';

            // Tampilkan modal
            document.getElementById('fileModal').style.display = 'block';
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            document.getElementById('fileModal').style.display = 'none';
        }

        // Tutup modal ketika mengklik di luar modal
        window.onclick = function(event) {
            var modal = document.getElementById('fileModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html>