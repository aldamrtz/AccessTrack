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
                        <option value="Staf">Staf</option>
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
                        <label for="facultyDepartment" class="form-label">Fakultas</label>
                        <select class="form-select" id="facultyDepartmentDosenStaf" name="facultyDepartmentDosenStaf">
                            <option value="" disabled selected>Pilih Fakultas</option>
                            <option value="Fakultas Sains dan Informatika">Fakultas Sains dan Informatika</option>
                            <option value="Fakultas Teknik Metalurgi">Fakultas Teknik Metalurgi</option>
                            <option value="Fakultas Teknik">Fakultas Teknik</option>
                            <option value="Fakultas Ekonomi dan Bisnis">Fakultas Ekonomi dan Bisnis</option>
                            <option value="Fakultas Ilmu Sosial dan Ilmu Politik">Fakultas Ilmu Sosial dan Ilmu Politik</option>
                            <option value="Fakultas Farmasi">Fakultas Farmasi</option>
                            <option value="Fakultas Kedokteran">Fakultas Kedokteran</option>
                            <option value="Fakultas Kedokteran Gigi">Fakultas Kedokteran Gigi</option>
                            <option value="Fakultas Ilmu Teknologi Kesehatan">Fakultas Ilmu Teknologi Kesehatan</option>
                            <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="programStudi" class="form-label">Program Studi</label>
                        <input type="text" class="form-control" id="programStudi" name="programStudi">
                    </div>
                </div>

                <!-- Form untuk Dosen dan Staf -->
                <div id="formDosenStaf" style="display: none;">
                    <div class="mb-3">
                        <label for="nama_lengkap_dosen_staf" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap_dosen_staf" name="nama_lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="nid_staf" class="form-label">NID</label>
                        <input type="text" class="form-control" id="nid_staf" name="identityNumber">
                    </div>
                    <div class="mb-3">
                        <label for="facultyDepartmentDosenStaf" class="form-label">Fakultas/Departemen</label>
                        <select class="form-select" id="facultyDepartmentDosenStaf" name="facultyDepartmentDosenStaf">
                            <option value="" disabled selected>Pilih Fakultas/Departemen</option>
                            <option value="Fakultas Teknik">Fakultas Teknik</option>
                            <option value="Fakultas Ekonomi">Fakultas Ekonomi</option>
                            <option value="Fakultas Hukum">Fakultas Hukum</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan_staf" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan_staf" name="jabatan">
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
                document.getElementById('formDosenStaf').style.display = 'none';
            } else if (value === 'Dosen' || value === 'Staf') {
                document.getElementById('formMahasiswa').style.display = 'none';
                document.getElementById('formDosenStaf').style.display = 'block';
            } else {
                document.getElementById('formMahasiswa').style.display = 'none';
                document.getElementById('formDosenStaf').style.display = 'none';
            }
        }
    </script>
</body>
</html>