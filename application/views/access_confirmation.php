<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pengajuan Kartu Akses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5fa;
        }

        .card {
            background-color: #ffffff;
            border-radius: 8px;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #5a189a;
            font-weight: bold;
        }

        .list-group-item {
            border: none;
            background-color: transparent;
            font-size: 16px;
            color: #5a189a;
        }

        .btn-primary {
            background-color: #6a0dad;
            border-color: #6a0dad;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #4b0082;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary {
            background-color: #a7a7cc;
            border-color: #a7a7cc;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #8a8aab;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Konfirmasi Pengajuan Kartu Akses</h2>
            <div id="applicationSummary">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Jenis Pemohon:</strong> <?= $jenis_pemohon; ?></li>
                    <li class="list-group-item"><strong>Nama Lengkap:</strong> <?= $nama_lengkap; ?></li>
                    <li class="list-group-item"><strong>NIM/NID/NIP:</strong> <?= $nim_nid_nip; ?></li>
                    <li class="list-group-item"><strong>Fakultas/Departemen:</strong> <?= $fakultas_departemen; ?></li>
                    <?php if($jenis_pemohon === 'Mahasiswa'): ?>
                        <li class="list-group-item"><strong>Program Studi:</strong> <?= $program_studi; ?></li>
                    <?php endif; ?>
                    <li class="list-group-item"><strong>Email:</strong> <?= $email; ?></li>
                </ul>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <a href="<?= base_url('access'); ?>" class="btn btn-secondary">Edit Pengajuan</a>
                <a href="<?= base_url('access/success'); ?>" class="btn btn-primary">Konfirmasi dan Ajukan</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
