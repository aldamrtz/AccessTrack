<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Kartu Akses</title>
    <!-- Memuat CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Internal -->
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
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Pengajuan Kartu Akses</h2>
            <form method="post" action="<?= base_url('access/submit'); ?>">
                <!-- Pilih Jenis Pemohon -->
                <div class="mb-3">
                    <label for="applicantType" class="form-label">Jenis Pemohon</label>
                    <select class="form-select" id="applicantType" name="applicantType" onchange="showFormPart(this.value);" required>
                        <option value="" disabled selected>Pilih jenis pemohon</option>
                        <option value="Mahasiswa">Mahasiswa</option>
                        <option value="Dosen">Dosen</option>
                    </select>
                </div>

                <!-- Form untuk Mahasiswa -->
                <div id="formMahasiswa" style="display: none;">
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="identityNumber">
                    </div>
                    <div class="mb-3">
                        <label for="facultyDepartment" class="form-label">Fakultas/Departemen</label>
                        <input type="text" class="form-control" id="facultyDepartment" name="facultyDepartment">
                    </div>
                    <div class="mb-3">
                        <label for="programStudi" class="form-label">Program Studi</label>
                        <input type="text" class="form-control" id="programStudi" name="programStudi">
                    </div>
                </div>

                <!-- Form untuk Dosen -->
                <div id="formDosen" style="display: none;">
                    <div class="mb-3">
                        <label for="nama_lengkap_dosen" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap_dosen" name="nama_lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="nid" class="form-label">NID</label>
                        <input type="text" class="form-control" id="nid" name="identityNumber">
                    </div>
                    <div class="mb-3">
                        <label for="facultyDepartmentDosen" class="form-label">Fakultas/Departemen</label>
                        <select class="form-select" id="facultyDepartmentDosen" name="facultyDepartmentDosen">
                            <option value="" disabled selected>Pilih Fakultas/Departemen</option>
                            <option value="Fakultas Teknik">Fakultas Teknik</option>
                            <option value="Fakultas Ekonomi">Fakultas Ekonomi</option>
                            <option value="Fakultas Hukum">Fakultas Hukum</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan">
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <!-- Keterangan Pengajuan -->
                <div class="mb-3">
                    <label for="keteranganPengajuan" class="form-label">Keterangan Pengajuan</label>
                    <textarea class="form-control" id="keteranganPengajuan" name="keteranganPengajuan" rows="4"></textarea>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <!-- JavaScript untuk Menampilkan Form Berdasarkan Jenis Pemohon -->
    <script>
        function showFormPart(value) {
            if (value === 'Mahasiswa') {
                document.getElementById('formMahasiswa').style.display = 'block';
                document.getElementById('formDosen').style.display = 'none';
            } else if (value === 'Dosen') {
                document.getElementById('formMahasiswa').style.display = 'none';
                document.getElementById('formDosen').style.display = 'block';
            } else {
                document.getElementById('formMahasiswa').style.display = 'none';
                document.getElementById('formDosen').style.display = 'none';
            }
        }
    </script>
</body>
</html>
