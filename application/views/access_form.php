<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Kartu Akses</title>
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

        /* Perbaikan untuk elemen form yang tidak bisa difokuskan */
        .hidden {
            visibility: hidden;
            height: 0;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        .visible {
            visibility: visible;
            height: auto;
            margin-bottom: 15px; /* atau tambahkan margin sesuai kebutuhan */
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Pengajuan Kartu Akses</h2>
            <form method="post" action="<?= base_url('access/submit'); ?>">
                <div class="mb-3">
                    <label for="applicantType" class="form-label">Jenis Pemohon</label>
                    <select class="form-select" id="applicantType" name="applicantType" onchange="showFormPart(this.value);" required>
                        <option value="" disabled selected>Pilih jenis pemohon</option>
                        <option value="Mahasiswa">Mahasiswa</option>
                        <option value="Dosen">Dosen</option>
                        <option value="Staff">Staff</option>
                    </select>
                </div>

                <div id="formMahasiswa" class="hidden">
                    <div class="mb-3">
                        <label for="nama_lengkap_mahasiswa" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap_mahasiswa" name="nama_lengkap_mahasiswa" tabindex="1">
                    </div>
                    <div class="mb-3">
                        <label for="nim_mahasiswa" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim_mahasiswa" name="identityNumber_mahasiswa" tabindex="2">
                    </div>
                    <div class="mb-3">
                        <label for="facultyDepartment_mahasiswa" class="form-label">Fakultas/Departemen</label>
                        <input type="text" class="form-control" id="facultyDepartment_mahasiswa" name="facultyDepartment_mahasiswa" tabindex="3">
                    </div>
                    <div class="mb-3">
                        <label for="programStudi_mahasiswa" class="form-label">Program Studi</label>
                        <input type="text" class="form-control" id="programStudi_mahasiswa" name="programStudi_mahasiswa" tabindex="4">
                    </div>
                </div>

                <div id="formDosen" class="hidden">
                    <div class="mb-3">
                        <label for="nama_lengkap_dosen" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap_dosen" name="nama_lengkap_dosen" tabindex="1">
                    </div>
                    <div class="mb-3">
                        <label for="nid_dosen" class="form-label">NID</label>
                        <input type="text" class="form-control" id="nid_dosen" name="identityNumber_dosen" tabindex="2">
                    </div>
                    <div class="mb-3">
                        <label for="facultyDepartment_dosen" class="form-label">Fakultas/Departemen</label>
                        <input type="text" class="form-control" id="facultyDepartment_dosen" name="facultyDepartment_dosen" tabindex="3">
                    </div>
                    <div class="mb-3">
                        <label for="jabatan_dosen" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan_dosen" name="jabatan_dosen" tabindex="4">
                    </div>
                </div>

                <div id="formStaff" class="hidden">
                    <div class="mb-3">
                        <label for="nama_lengkap_staff" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap_staff" name="nama_lengkap_staff" tabindex="1">
                    </div>
                    <div class="mb-3">
                        <label for="nip_staff" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="nip_staff" name="identityNumber_staff" tabindex="2">
                    </div>
                    <div class="mb-3">
                        <label for="facultyDepartment_staff" class="form-label">Fakultas/Departemen</label>
                        <input type="text" class="form-control" id="facultyDepartment_staff" name="facultyDepartment_staff" tabindex="3">
                    </div>
                    <div class="mb-3">
                        <label for="divisi_staff" class="form-label">Divisi</label>
                        <input type="text" class="form-control" id="divisi_staff" name="divisi_staff" tabindex="4">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="keteranganPengajuan" class="form-label">Keterangan Pengajuan</label>
                    <textarea class="form-control" id="keteranganPengajuan" name="keteranganPengajuan" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script>
        function showFormPart(value) {
            var formMahasiswa = document.getElementById('formMahasiswa');
            var formDosen = document.getElementById('formDosen');
            var formStaff = document.getElementById('formStaff');

            // Menyembunyikan semua form terlebih dahulu
            formMahasiswa.className = 'hidden';
            formDosen.className = 'hidden';
            formStaff.className = 'hidden';

            // Menampilkan form sesuai jenis pemohon
            if (value === 'Mahasiswa') {
                formMahasiswa.className = 'visible';
            } else if (value === 'Dosen') {
                formDosen.className = 'visible';
            } else if (value === 'Staff') {
                formStaff.className = 'visible';
            }
        }
    </script>
</body>
</html>
