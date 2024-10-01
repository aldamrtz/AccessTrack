<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengajuan Kartu Akses</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #6c757d;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: #fff;
            border-radius: 0.25rem 0.25rem 0 0;
        }
        .nav-tabs .nav-link {
            color: #007bff;
        }
        table {
            margin-top: 20px;
        }
        table thead {
            background-color: #007bff;
            color: #ffffff;
        }
        table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }
        table tbody tr:hover {
            background-color: #e9ecef;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
        }
        .tab-content {
            padding-top: 20px;
        }
        .btn-print {
            background-color: #28a745;
            color: #ffffff;
            border-radius: 8px;
            font-size: 16px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-print:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center">Laporan Pengajuan Kartu Akses</h2>

        <!-- Button Cetak -->
        <div class="text-center mb-4">
            <button id="printButton" class="btn btn-print">Cetak Laporan PDF</button>
        </div>

        <!-- Tabs untuk memilih Mahasiswa, Dosen, atau Staff -->
        <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="#mahasiswa" data-toggle="tab">Mahasiswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#dosen" data-toggle="tab">Dosen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#staff" data-toggle="tab">Staff</a>
            </li>
        </ul>

        <div class="tab-content">
            <!-- Tab Mahasiswa -->
            <div class="tab-pane active" id="mahasiswa">
                <h3 class="text-center">Data Mahasiswa</h3>
                <table class="table table-bordered table-hover dataTable">
                <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Nama Lengkap</th>
        <th>Email</th>
        <th>Program Studi</th>
        <th>Tanggal Pengajuan</th>
        <th>Bukti Pembayaran</th> <!-- Tambahan Kolom Bukti Pembayaran -->
    </tr>
</thead>
<tbody>
    <?php foreach ($mahasiswa as $mhs): ?>
    <tr>
        <td><?= $mhs['id_KA']; ?></td>
        <td><?= $mhs['nama_lengkap']; ?></td>
        <td><?= $mhs['email']; ?></td>
        <td><?= $mhs['program_studi']; ?></td>
        <td><?= $mhs['tanggal_pengajuan']; ?></td>
        <td>
            <?php if ($mhs['payment_proof']): ?>
                <a href="<?= base_url('uploads/' . $mhs['payment_proof']); ?>" target="_blank">Lihat Bukti</a>
            <?php else: ?>
                Tidak ada bukti
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>

                </table>
            </div>

            <!-- Tab Dosen -->
            <div class="tab-pane" id="dosen">
                <h3 class="text-center">Data Dosen</h3>
                <table class="table table-bordered table-hover dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Fakultas/Departemen</th>
                            <th>Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($dosen)): ?>
                            <?php foreach ($dosen as $row): ?>
                                <tr>
                                    <td><?= $row['id_KA']; ?></td>
                                    <td><?= $row['nama_lengkap']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['faculty_department']; ?></td>
                                    <td><?= $row['jabatan']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Data tidak ditemukan</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Tab Staff -->
            <div class="tab-pane" id="staff">
                <h3 class="text-center">Data Staff</h3>
                <table class="table table-bordered table-hover dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Fakultas/Departemen</th>
                            <th>Divisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($staff)): ?>
                            <?php foreach ($staff as $row): ?>
                                <tr>
                                    <td><?= $row['id_KA']; ?></td>
                                    <td><?= $row['nama_lengkap']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['faculty_department']; ?></td>
                                    <td><?= $row['divisi']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Data tidak ditemukan</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Script Cetak -->
    <script>
        document.getElementById('printButton').addEventListener('click', function() {
            // Store the content to print
            var contentToPrint = document.querySelector('.tab-content').innerHTML;
            var originalContent = document.body.innerHTML;

            // Create the print view
            document.body.innerHTML = `
            <html>
            <head>
                <title>Cetak Laporan Pengajuan Kartu Akses</title>
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
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-top: 20px;
                    }
                    table, th, td {
                        border: 1px solid black;
                    }
                    th, td {
                        padding: 8px;
                        text-align: left;
                    }
                    th {
                        background-color: #f2f2f2;
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
                        <img src="assets/img/undraw_posting_photo.svg" alt="Logo Left">
                    </div>
                    <div class="center">
                        <h1>YAYASAN KARTIKA EKA PAKSI</h1>
                        <p>UNIVERSITAS JENDERAL ACHMAD YANI (UNJANI)</p>
                        <p>Kampus Cimahi: Jl. Terusan Jend. Sudirman www.unjani.ac.id Cimahi Telp. (022) 6631861-8656190 Fax. (022) 6652069</p>
                        <p>Kampus Bandung: Jl. Gatot Subroto www.unjani.ac.id Bandung Telp. (022) 7312741 Fax. (022) 7312741</p>
                    </div>
                    <div class="right">
                        <img src="assets/img/Unjani.png" alt="Logo Right">
                    </div>
                </div>
                <h1>Laporan Pengajuan Kartu Akses</h1>
                <table>
                    ${contentToPrint}
                </table>
            </body>
            </html>
            `;

            // Print the page
            window.print();

            // Restore the original content after printing
            document.body.innerHTML = originalContent;
            location.reload(); // Reload the page to restore the event listeners
        });
    </script>
</body>
</html>
