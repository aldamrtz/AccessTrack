<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengajuan Kartu Akses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5fa;
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Laporan Pengajuan Kartu Akses</h2>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#mahasiswa">Mahasiswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#dosen">Dosen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#staff">Staff</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane container active" id="mahasiswa">
                <!-- Laporan Mahasiswa content here -->
            </div>
            <div class="tab-pane container fade" id="dosen">
                <!-- Laporan Dosen content here -->
            </div>
            <div class="tab-pane container fade" id="staff">
                <!-- Laporan Staff content here -->
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
