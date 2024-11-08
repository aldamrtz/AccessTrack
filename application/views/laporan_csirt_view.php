<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan CSIRT</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan_csirt_view.css'); ?>">
    <link rel="icon" href="<?php echo base_url('assets/img/Unjani.png'); ?>">
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
                            <th class="column-nama">Nama Pelapor</th>
                            <th class="column-nip">NIP</th>
                            <th class="column-fakultas">Fakultas</th>
                            <th class="column-jurusan">Prodi</th>
                            <th class="column-website">Nama Website</th>
                            <th class="column-deskripsi">Deskripsi Masalah</th>
                            <th class="column-tanggal">Tanggal Pelaporan</th>
                            <th class="column-status">Status</th>
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
                                <td><?php echo date('d M Y', strtotime($report['tanggal_pelaporan'])); ?></td>
                                <td><?php echo ucfirst($report['status']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <button id="printButton" class="btn-print">Print PDF</button>
        <?php endif; ?>
    </div>

    <script src="<?php echo base_url('assets/js/laporan_csirt.js'); ?>"></script>
    <script>
    document.getElementById('printButton').addEventListener('click', function() {
        // Store the content to print
        var contentToPrint = document.querySelector('table').innerHTML;
        var originalContent = document.body.innerHTML;

        // Create the print view with absolute paths for images
        document.body.innerHTML = `
        <html>
        <head>
            <title>Cetak Laporan Pengajuan Domain</title>
            <style>
                body {
                    font-family: 'Nunito', sans-serif;
                    color: #000;
                    margin: 20px;
                }
                .header {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: 20px;
                }
                .header img {
                    max-height: 100px;
                }
                .header .left {
                    text-align: left;
                }
                .header .center {
                    text-align: center;
                    flex-grow: 2;
                }
                .header .center h1 {
                    margin: 0;
                    font-size: 24px;
                    font-weight: bold;
                }
                .header .center p {
                    margin: 0;
                    font-size: 14px;
                }
                .header .right {
                    text-align: right;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }
                table, th, td {
                    border: 1px solid black;
                }
                th, td {
                    padding: 6px 10px;
                    text-align: left;
                    word-wrap: break-word;
                    white-space: normal;
                }
                th {
                    background-color: #000000;
                    color: white;
                }
                h1 {
                    text-align: center;
                    margin-bottom: 20px;
                }
            </style>
        </head>
        <body>
            <div class="header">
                <div class="left">
                    <img src="<?php echo base_url('assets/img/undraw_posting_photo.svg'); ?>" alt="Logo Left">
                </div>
                <div class="center">
                    <h1>YAYASAN KARTIKA EKA PAKSI</h1>
                    <p>UNIVERSITAS JENDERAL ACHMAD YANI (UNJANI)</p>
                    <p>Kampus Cimahi: Jl. Terusan Jend. Sudirman www.unjani.ac.id Cimahi Telp. (022) 6631861-8656190 Fax. (022) 6652069</p>
                    <p>Kampus Bandung: Jl. Gatot Subroto www.unjani.ac.id Bandung Telp. (022) 7312741 Fax. (022) 7312741</p>
                </div>
                <div class="right">
                    <img src="<?php echo base_url('assets/img/Unjani.png'); ?>" alt="Logo Right" type="img/png">
                </div>
            </div>
            <h1>Laporan Insiden CSIRT</h1>
            <table>
                ${contentToPrint}
            </table>
        </body>
        </html>
        `;

        // Print the page (User can choose "Save as PDF" in the print dialog)
        window.print();

        // Restore the original content after printing
        document.body.innerHTML = originalContent;
        location.reload(); // Reload the page to restore the event listeners
    });
    </script>
</body>
</html>