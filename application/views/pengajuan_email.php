<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Form Pengajuan Pembuatan Email</h2>
        <form id="emailForm" action="<?= base_url('emailcontroller/submit_pengajuan') ?>" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">Nomor Induk Mahasiswa (NIM)</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi</label>
                <input type="text" class="form-control" id="prodi" name="prodi" required>
            </div>
            <div class="mb-3">
                <label for="emailDiajukan" class="form-label">Email yang Diajukan</label>
                <input type="email" class="form-control" id="emailDiajukan" name="emailDiajukan" required>
            </div>
            <div class="mb-3">
                <label for="emailPengguna" class="form-label">Email Pengguna</label>
                <input type="email" class="form-control" id="emailPengguna" name="emailPengguna" required>
            </div>
            <div class="mb-3">
                <label for="ktm" class="form-label">Kartu Tanda Mahasiswa (KTM)</label>
                <input type="text" class="form-control" id="ktm" name="ktm" required>
            </div>

            <!-- CAPTCHA -->
            <div class="mb-3 text-center">
                <label class="form-label">Masukkan CAPTCHA:</label>
                <div class="mb-2">
                    <img src="<?= base_url('public/captcha.php') ?>?<?= time() ?>" alt="CAPTCHA" id="captchaImage" class="img-fluid">
                </div>
                <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Masukkan CAPTCHA" required>
            </div>

            <div class="d-grid">
                <button type="submit" id="submitBtn" class="btn btn-primary" disabled>Submit</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        const form = document.getElementById('emailForm');
        const inputs = form.querySelectorAll('input');
        const submitBtn = document.getElementById('submitBtn');

        // Handle input changes
        inputs.forEach(input => {
            input.addEventListener('input', () => {
                let allFilled = true;
                inputs.forEach(field => {
                    if (field.value === '') {
                        allFilled = false;
                    }
                });

                // Enable submit button if all fields are filled
                submitBtn.disabled = !allFilled;
            });
        });
    </script>
</body>
</html>
