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
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Pengajuan Kartu Akses</h2>
            <form method="post" action="<?= base_url('access/submit'); ?>" enctype="multipart/form-data" onsubmit="return validateForm();">
                <div class="mb-4">
                    <label for="applicantType" class="form-label">Jenis Pemohon</label>
                    <select class="form-select" id="applicantType" name="applicantType" onchange="showFormPart(this.value);" required>
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
                        <label for="facultyDepartment_mahasiswa" class="form-label">Fakultas</label>
                        <select class="form-select" id="facultyDepartment_mahasiswa" name="facultyDepartment_mahasiswa">
                            <option value="" disabled selected>Pilih Fakultas</option>
                            <!-- Fakultas options -->
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="programStudi_mahasiswa" class="form-label">Program Studi</label>
                        <input type="text" class="form-control" id="programStudi_mahasiswa" name="programStudi_mahasiswa">
                    </div>
                    <div class="mb-4">
                        <label for="payment_amount" class="form-label">Biaya Pengajuan</label>
                        <input type="text" class="form-control" id="payment_amount" value="Rp 40.000" disabled />
                    </div>
                    <div class="mb-4">
                        <label for="payment_proof" class="form-label">Upload Bukti Pembayaran</label>
                        <input type="file" class="form-control" id="payment_proof" name="payment_proof" required />
                    </div>
                </div>

                <!-- Form Dosen/Staff -->
                <div id="formDosenStaff" class="hidden">
                    <div class="mb-4">
                        <label for="nama_lengkap_dosen_staff" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap_dosen_staff" name="nama_lengkap">
                    </div>
                    <div class="mb-4">
                        <label for="nid_dosen_staff" class="form-label">NID</label>
                        <input type="text" class="form-control" id="nid_dosen_staff" name="identityNumber">
                    </div>
                    <div class="mb-4">
                        <label for="faculty_department_dosen_staff" class="form-label">Fakultas/Departemen</label>
                        <select class="form-select" id="faculty_department_dosen_staff" name="facultyDepartment">
                            <option value="" disabled selected>Pilih Fakultas/Departemen</option>
                            <!-- Fakultas/Departemen options -->
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
        function showFormPart(value) {
            var formMahasiswa = document.getElementById('formMahasiswa');
            var formDosenStaff = document.getElementById('formDosenStaff');

            formMahasiswa.classList.add('hidden');
            formDosenStaff.classList.add('hidden');

            disableFormInputs(formMahasiswa);
            disableFormInputs(formDosenStaff);

            if (value === 'Mahasiswa') {
                formMahasiswa.classList.remove('hidden');
                enableFormInputs(formMahasiswa);
            } else if (value === 'Dosen' || value === 'Staff') {
                formDosenStaff.classList.remove('hidden');
                enableFormInputs(formDosenStaff);
            }
        }

        function disableFormInputs(form) {
            var inputs = form.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.setAttribute('disabled', 'true');
            });
        }

        function enableFormInputs(form) {
            var inputs = form.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.removeAttribute('disabled');
            });
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
