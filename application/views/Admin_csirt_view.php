<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Laporan CSIRT</title>
    <link rel="stylesheet" href="assets/css/admin_csirt.css">
    <!-- Tambahkan Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="assets/img/Unjani.png" type="img/png">
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
        <?php 
        $fileArray = explode(',', $report['bukti_file']); // Pecah string file
        ?>
        <a href="#" onclick="handleFileArray(<?php echo htmlspecialchars(json_encode($fileArray)); ?>)">Lihat Bukti File</a>
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
            <button id="prevBtn" class="overlay-icon" onclick="prevFile()" style="display:none;"><i class="fas fa-chevron-left"></i></button>
            <a id="downloadLink" href="#" download class="overlay-icon"><i class="fas fa-download"></i></a>
            <button onclick="zoomIn()" class="overlay-icon"><i class="fas fa-search-plus"></i></button>
            <button onclick="zoomOut()" class="overlay-icon"><i class="fas fa-search-minus"></i></button>
            <button id="nextBtn" class="overlay-icon" onclick="nextFile()" style="display:none;"><i class="fas fa-chevron-right"></i></button>
            <span class="close" onclick="closeOverlay()">&times;</span>
        </div>
        <div class="overlay-content">
            <img id="fileImage" src="" alt="Bukti File" style="display:none; max-width: 90%; max-height: 90%;">
        </div>
        <!-- Tombol navigasi file -->
        <div class="overlay-footer">
            <button id="prevPageBtn" class="btn btn-navigate" onclick="prevFile()" style="display:none;"><< Sebelumnya</button>
            <button id="nextPageBtn" class="btn btn-navigate" onclick="nextFile()" style="display:none;">Berikutnya >></button>
        </div>
    </div>

    <script src="<?php echo base_url('assets/js/admin_csirt.js'); ?>"></script>
    <script>
        let zoomLevel = 1;
        let currentFileIndex = 0;
        let filesArray = [];

        function handleFileArray(fileArray) {
            filesArray = fileArray;
            currentFileIndex = 0; // Reset index
            showFile(currentFileIndex);
            if (filesArray.length > 1) {
                document.getElementById('prevBtn').style.display = 'inline-block';
                document.getElementById('nextBtn').style.display = 'inline-block';
                document.getElementById('prevPageBtn').style.display = 'inline-block';
                document.getElementById('nextPageBtn').style.display = 'inline-block';
            } else {
                document.getElementById('prevBtn').style.display = 'none';
                document.getElementById('nextBtn').style.display = 'none';
                document.getElementById('prevPageBtn').style.display = 'none';
                document.getElementById('nextPageBtn').style.display = 'none';
            }
        }

        function showFile(index) {
            var filePath = "<?php echo base_url('uploads/'); ?>" + filesArray[index];
            var fileType = filesArray[index].split('.').pop();

            if (fileType === 'pdf') {
                window.open(filePath, '_blank');
            } else {
                showOverlay(filePath);
            }
        }

        function showOverlay(filePath) {
            var fileImage = document.getElementById('fileImage');
            var downloadLink = document.getElementById('downloadLink');

            fileImage.style.display = 'none';
            zoomLevel = 1; // Reset zoom level

            fileImage.src = filePath;
            fileImage.style.display = 'block';

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
            if (zoomLevel < 0.1) zoomLevel = 0.1;
            applyZoom();
        }

        function applyZoom() {
            var fileImage = document.getElementById('fileImage');
            fileImage.style.transform = 'scale(' + zoomLevel + ')';
        }

        function nextFile() {
            if (currentFileIndex < filesArray.length - 1) {
                currentFileIndex++;
                showFile(currentFileIndex);
            }
        }

        function prevFile() {
            if (currentFileIndex > 0) {
                currentFileIndex--;
                showFile(currentFileIndex);
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