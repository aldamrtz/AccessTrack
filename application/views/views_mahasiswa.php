<div class="container">
    <div class="card">
        <h2>Pengajuan Kartu Akses - Mahasiswa</h2>
        <form method="post" action="<?= base_url('access/submit'); ?>" enctype="multipart/form-data" onsubmit="return validateForm();">
            <div class="mb-4">
                <label for="nama_lengkap_mahasiswa" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap_mahasiswa" name="nama_lengkap_mahasiswa" required>
            </div>
            <div class="mb-4">
                <label for="nim_mahasiswa" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim_mahasiswa" name="identityNumber_mahasiswa" required>
            </div>
            <div class="mb-4">
                <label for="fakultas" class="form-label">Fakultas</label>
                <select class="form-select" id="fakultas" name="fakultas" onchange="updateJurusan()" required>
                    <option value="" disabled selected>Pilih Fakultas</option>
                    <option value="Fakultas Sains dan Informatika">Fakultas Sains dan Informatika</option>
                    <!-- Add more options as needed -->
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
                <input type="file" class="form-control" id="payment_proof" name="payment_proof" required>
            </div>
            <div class="qr-container">
                <p>Silakan bayar melalui QR Code berikut:</p>
                <img src="<?= base_url('assets/img/qr_code_image.png'); ?>" alt="QR Code Pembayaran">
                <p><strong>Nominal:</strong> Rp 40.000</p>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2">Submit</button>
        </form>
    </div>
</div>
