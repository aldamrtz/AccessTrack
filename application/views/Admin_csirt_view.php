<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Laporan CSIRT</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin_approval.css'); ?>">
    <!-- Tambahkan Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                                        <a href="#" onclick="showOverlay('<?php echo base_url('uploads/' . $report['bukti_file']); ?>', '<?php echo pathinfo($report['bukti_file'], PATHINFO_EXTENSION); ?>')">Lihat</a>
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

    <!-- Overlay untuk menampilkan file -->
    <div id="fileOverlay" class="overlay">
        <div class="overlay-header">
            <a id="downloadLink" href="#" download class="overlay-icon"><i class="fas fa-download"></i></a>
            <button onclick="zoomIn()" class="overlay-icon"><i class="fas fa-search-plus"></i></button>
            <button onclick="zoomOut()" class="overlay-icon"><i class="fas fa-search-minus"></i></button>
            <span class="close" onclick="closeOverlay()">&times;</span>
        </div>
        <div class="overlay-content">
            <img id="fileImage" src="" alt="Bukti File" style="display:none; max-width: 80%; max-height: 80%;">
            <iframe id="filePDF" src="" style="display:none; width: 80%; height: 80%;"></iframe>
        </div>
    </div>

    <!-- JavaScript untuk overlay -->
    <script src="<?php echo base_url('assets/js/admin_csirt.js'); ?>"></script>
    <script>
        let zoomLevel = 1;

        function showOverlay(filePath, fileType) {
            var fileImage = document.getElementById('fileImage');
            var filePDF = document.getElementById('filePDF');
            var downloadLink = document.getElementById('downloadLink');

            fileImage.style.display = 'none';
            filePDF.style.display = 'none';
            zoomLevel = 1; // Reset zoom level
            
            if (fileType === 'pdf') {
                filePDF.src = filePath;
                filePDF.style.display = 'block';
            } else {
                fileImage.src = filePath;
                fileImage.style.display = 'block';
            }

            // Set the download link
            downloadLink.href = filePath;
            downloadLink.download = filePath.split('/').pop();

            document.getElementById('fileOverlay').style.display = 'flex';
        }

        function closeOverlay() {
            document.getElementById('fileOverlay').style.display = 'none';
        }

        function zoomIn() {
            zoomLevel += 0.1;
            applyZoom();
        }

        function zoomOut() {
            zoomLevel -= 0.1;
            if (zoomLevel < 0.1) zoomLevel = 0.1; // Prevent zooming out too much
            applyZoom();
        }

        function applyZoom() {
            var fileImage = document.getElementById('fileImage');
            var filePDF = document.getElementById('filePDF');

            if (fileImage.style.display === 'block') {
                fileImage.style.transform = 'scale(' + zoomLevel + ')';
            } else if (filePDF.style.display === 'block') {
                filePDF.style.transform = 'scale(' + zoomLevel + ')';
            }
        }

        window.onclick = function(event) {
            var overlay = document.getElementById('fileOverlay');
            if (event.target === overlay) {
                overlay.style.display = 'none';
            }
        }
    </script>
</body>
</html>