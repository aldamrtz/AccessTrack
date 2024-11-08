<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Kartu Akses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8f5;
            font-family: 'Arial', sans-serif;
        }
        .card {
            background-color: #fff;
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-top: 2rem;
        }
        h2 {
            color: #2e7d32;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .form-label {
            font-weight: 600;
            color: #2e7d32;
        }
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 12px;
            box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.05);
        }
        .form-control:focus, .form-select:focus {
            border-color: #388e3c;
            box-shadow: 0 0 8px rgba(56, 142, 60, 0.3);
        }
        .btn-primary {
            background-color: #388e3c;
            border-color: #388e3c;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #2e7d32;
            box-shadow: 0 4px 12px rgba(46, 125, 50, 0.4);
        }
        .hidden {
            display: none;
        }
        .container {
            max-width: 700px;
        }
        .qr-container {
            text-align: center;
            margin-top: 20px;
        }
        .qr-container img {
            width: 150px;
            height: 150px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Pengajuan Kartu Akses</h2>
            <form id="mainForm" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
                <div class="mb-4">
                    <label for="applicantType" class="form-label">Jenis Pemohon</label>
                    <select class="form-select" id="applicantType" name="applicantType" onchange="updateFormAction(this.value); showFormPart(this.value);" required>
                        <option value="" disabled selected>Pilih jenis pemohon</option>
                        <option value="Mahasiswa">Mahasiswa</option>                      
                        <option value="Dosen">Dosen</option>
                        <option value="Staff">Staff</option>
                    </select>
                </div>

                <!-- Form Mahasiswa -->
                <div id="formMahasiswa" class="hidden">
                    <div class="mb-4">
                        <label for="nama_lengkap_mahasiswa" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap_mahasiswa" name="nama_lengkap_mahasiswa">
                    </div>
                    <div class="mb-4">
                        <label for="nim_mahasiswa" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim_mahasiswa" name="identityNumber_mahasiswa">
                    </div>
                    <div class="mb-4">
                        <label for="fakultas" class="form-label">Fakultas</label>
                        <select class="form-select" id="fakultas" name="fakultas" onchange="updateJurusan('jurusan')" required>
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
                    <div class="mb-4">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select class="form-select" id="jurusan" name="jurusan" required>
                            <option value="" disabled selected>Pilih Jurusan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="payment_proof" class="form-label">Upload Bukti Pembayaran</label>
                        <input type="file" class="form-control" id="payment_proof" name="payment_proof" required />
                    </div>

                    <!-- QR Code untuk Pembayaran -->
                    <div class="qr-container">
                        <p>Silakan bayar melalui QR Code berikut:</p>
                        <img src="<?= base_url('assets/img/qr_code_image.png'); ?>" alt="QR Code Pembayaran" width="200" height="200">
                        <p><strong>Nominal:</strong> Rp 40.000</p>
                    </div>
                </div>

                <!-- Form Dosen/Staff -->
                <div id="formDosenStaff" class="hidden">
                    <div class="mb-4">
                        <label for="nama_lengkap_dosen_staff" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap_dosen_staff" name="nama_lengkap">
                    </div>
                    <div class="mb-4">
                        <label for="nid_dosen_staff" class="form-label">NID/NIP</label>
                        <input type="text" class="form-control" id="nid_dosen_staff" name="identityNumber">
                    </div>
                    <div class="mb-4">
                        <label for="faculty_department_dosen_staff" class="form-label">Fakultas/Departemen</label>
                        <select class="form-select" id="faculty_department_dosen_staff" name="facultyDepartment" onchange="updateJurusan('jurusan_dosen_staff')">
                            <option value="" disabled selected>Pilih Fakultas/Departemen</option>
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
                    <div class="mb-4">
                        <label for="jurusan_dosen_staff" class="form-label">Jurusan</label>
                        <select class="form-select" id="jurusan_dosen_staff" name="jurusan_dosen_staff">
                            <option value="" disabled selected>Pilih Jurusan</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="jabatan_dosen_staff" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan_dosen_staff" name="jabatan">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-4">
                    <label for="keteranganPengajuan" class="form-label">Keterangan Pengajuan</label>
                    <textarea class="form-control" id="keteranganPengajuan" name="keteranganPengajuan" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">Submit</button>
            </form>
        </div>
    </div>

    <script>
        const jurusanList = {
            "Fakultas Sains dan Informatika": [
                "Teknik Informatika S-1", "Sistem Informasi S-1", "Kimia S-1"
            ],
            "Fakultas Teknik Metalurgi": [
                "Teknik Metalurgi S-1"
            ],
            "Fakultas Teknik": [
                "Teknik Elektro S-1", "Teknik Kimia S-1", "Teknik Sipil S-1", 
                "Magister Teknik Sipil S-2", "Teknik Geomatika S-1", "Teknik Mesin S-1", "Teknik Industri S-1"
            ],
            "Fakultas Ekonomi dan Bisnis": [
                "Akuntansi S-1", "Manajemen S-1", "Magister Manajemen S-2"
            ],
            "Fakultas Ilmu Sosial dan Ilmu Politik": [
                "Ilmu Pemerintahan S-1", "Ilmu Hub. Internasional S-1", 
                "Magister Hub. Internasional S-2", "Ilmu Hukum S-1", "Magister Ilmu Pemerintahan S-2"
            ],
            "Fakultas Farmasi": [
                "Farmasi S-1", "Profesi Apoteker", "Magister Farmasi S-2"
            ],
            "Fakultas Kedokteran": [
                "Pendidikan Dokter S-1", "Profesi Dokter"
            ],
            "Fakultas Kedokteran Gigi": [
                "Kedokteran Gigi S-1", "Profesi Dokter Gigi"
            ],
            "Fakultas Ilmu Teknologi Kesehatan": [
                "Administrasi Rumah Sakit S-1", "Magister Penuaan Kulit dan Estetika S-2", 
                "Magister Keperawatan S-2", "Profesi Ners", "Ilmu Keperawatan S-1", "Keperawatan D-3", 
                "Kesehatan Masyarakat S-1", "Teknologi Laboratorium Medis D-4", 
                "Teknologi Laboratorium Medis D-3", "Kebidanan S-1", "Profesi Bidan"
            ],
            "Fakultas Psikologi": [
                "Psikologi S-1"
            ]
        };

        function showFormPart(value) {
            var formMahasiswa = document.getElementById('formMahasiswa');
            var formDosenStaff = document.getElementById('formDosenStaff');
            var fakultasField = document.getElementById('fakultas');
            var jurusanField = document.getElementById('jurusan');
            var jurusanDosenField = document.getElementById('jurusan_dosen_staff');
            var paymentProofField = document.getElementById('payment_proof');

            formMahasiswa.classList.add('hidden');
            formDosenStaff.classList.add('hidden');
            fakultasField.required = false;
            jurusanField.required = false;
            paymentProofField.required = false;
            jurusanDosenField.required = false;

            if (value === 'Mahasiswa') {
                formMahasiswa.classList.remove('hidden');
                fakultasField.required = true;
                jurusanField.required = true;
                paymentProofField.required = true;
            } else if (value === 'Dosen' || value === 'Staff') {
                formDosenStaff.classList.remove('hidden');
                jurusanDosenField.required = true;
            }
        }

        function updateFormAction(value) {
            const form = document.getElementById('mainForm');
            if (value === 'Mahasiswa') {
                form.action = "<?= base_url('access/submit_mahasiswa'); ?>";
            } else if (value === 'Dosen') {
                form.action = "<?= base_url('access/submit_dosen'); ?>";
            } else if (value === 'Staff') {
                form.action = "<?= base_url('access/submit_staff'); ?>";
            }
        }

        function updateJurusan(selectId) {
            const fakultas = document.getElementById('fakultas').value || document.getElementById('faculty_department_dosen_staff').value;
            const jurusanSelect = document.getElementById(selectId);
            jurusanSelect.innerHTML = '<option value="" disabled selected>Pilih Jurusan</option>'; 

            if (jurusanList[fakultas]) {
                jurusanList[fakultas].forEach(jurusan => {
                    const option = document.createElement('option');
                    option.value = jurusan;
                    option.textContent = jurusan;
                    jurusanSelect.appendChild(option);
                });
            }
        }

        function validateForm() {
            var applicantType = document.getElementById('applicantType').value;

            if (applicantType === 'Mahasiswa') {
                var paymentProof = document.getElementById('payment_proof');
                if (paymentProof.files.length === 0) {
                    alert('Harap unggah bukti pembayaran.');
                    return false;
                }
            }
            return true;
        }
    </script>
</body>
</html>
