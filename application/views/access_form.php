<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Kartu Akses</title>
    <!-- Bootstrap CSS -->
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

        .form-label {
            font-weight: 600;
            color: #5a189a;
        }

        .form-control, .form-select {
            border-radius: 6px;
            border: 1px solid #ced4da;
            padding: 10px;
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
            <h2 class="text-center mb-4">Pengajuan Kartu Akses</h2>
            <form method="post" action="<?= base_url('access/submit'); ?>" enctype="multipart/form-data">
                <!-- Nama Lengkap -->
                <div class="mb-3">
                    <label for="fullName" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" required>
                </div>

                <!-- NIM/NID/NIP -->
                <div class="mb-3">
                    <label for="identityNumber" class="form-label">NIM/NID/NIP</label>
                    <input type="text" class="form-control" id="identityNumber" name="identityNumber" required>
                </div>

                <!-- Fakultas/Departemen -->
                <div class="mb-3">
                    <label for="facultyDepartment" class="form-label">Fakultas/Departemen</label>
                    <select class="form-select" id="facultyDepartment" name="facultyDepartment" required>
                        <option value="" disabled selected>Pilih Fakultas/Departemen</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Fakultas Ekonomi">Fakultas Ekonomi</option>
                        <option value="Fakultas Hukum">Fakultas Hukum</option>
                    </select>
                </div>

                <!-- Program Studi (Hanya untuk Mahasiswa) -->
                <div class="mb-3" id="studyProgramGroup" style="display: none;">
                    <label for="studyProgram" class="form-label">Program Studi</label>
                    <select class="form-select" id="studyProgram" name="studyProgram">
                        <option value="" disabled selected>Pilih Program Studi</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Manajemen">Manajemen</option>
                        <option value="Ilmu Hukum">Ilmu Hukum</option>
                    </select>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <!-- Tombol Submit -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
