<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelaporan Insiden CSIRT</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/csirt_report.css'); ?>">
    <!-- Link Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="<?php echo base_url('assets/js/validateForm.js'); ?>" defer></script>
    <link rel="icon" href="<?php echo base_url('assets/img/Unjani.png'); ?>">
</head>
<body>
    <div class="container">
        <img src="<?php echo base_url('assets/img/Unjani.png'); ?>" alt="Unjani Logo" class="logo">
        <h2>Pelaporan Insiden CSIRT</h2>
        <form action="<?php echo site_url('csirt/submit_report'); ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <label for="email_pelapor">Email Pelapor</label>
            <input type="email" name="email_pelapor" id="email_pelapor" required>
            <div id="email_error" class="error-message"></div>

            <label for="nama_pelapor">Nama Pelapor</label>
            <input type="text" name="nama_pelapor" id="nama_pelapor" required>

            <label for="nip">NIP</label>
            <input type="text" name="nip" id="nip" required>
            <div id="nip_error" class="error-message"></div>

            <label for="fakultas">Fakultas</label>
            <input type="text" name="fakultas" id="fakultas" required>

            <label for="jurusan">Prodi</label>
            <input type="text" name="jurusan" id="jurusan" required>

            <label for="nama_website">Nama Website</label>
            <input type="text" name="nama_website" id="nama_website" required>

            <label for="deskripsi_masalah">Deskripsi Masalah</label>
            <textarea name="deskripsi_masalah" id="deskripsi_masalah" rows="4" required></textarea>

            <label for="bukti_file">Bukti File</label>
            <input type="file" name="bukti_file[]" id="bukti_file" accept=".png, .jpg, .jpeg, .pdf" multiple>
            <div id="file_error" class="error-message"></div>

            <!-- Display the selected files with "X" button to remove -->
            <div id="file-list" class="file-list"></div>

            <button type="submit" id="submit_button" class="disabled-button" disabled>Kirim Laporan</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileInput = document.getElementById('bukti_file');
            const fileList = document.getElementById('file-list');
            const submitButton = document.getElementById('submit_button');
            const fileError = document.getElementById('file_error');
            let filesArray = []; // Menyimpan file yang dipilih

            // Fungsi untuk menampilkan file yang dipilih dan memungkinkan penghapusan
            function updateFileList() {
                fileList.innerHTML = ''; // Kosongkan daftar file sebelumnya
                filesArray.forEach((file, index) => {
                    const fileItem = document.createElement('div');
                    fileItem.classList.add('file-item');

                    const fileIcon = document.createElement('span');
                    fileIcon.textContent = file.name; // Menampilkan nama file

                    const removeBtn = document.createElement('span');
                    removeBtn.classList.add('remove-file');
                    removeBtn.innerHTML = '<i class="fas fa-times"></i>'; // Ikon Font Awesome
                    removeBtn.addEventListener('click', function () {
                        removeFile(index);
                    });

                    fileItem.appendChild(fileIcon);
                    fileItem.appendChild(removeBtn);
                    fileList.appendChild(fileItem);
                });

                checkValidity(); // Validasi saat daftar file diperbarui
            }

            // Fungsi untuk menghapus file yang dipilih
            function removeFile(index) {
                filesArray.splice(index, 1); // Hapus file dari array
                updateFileList(); // Update tampilan daftar file
            }

            // Fungsi untuk menambah file ke filesArray saat file dipilih ulang
            function handleFileSelect() {
                const newFiles = Array.from(fileInput.files); // Mengambil file baru yang dipilih
                filesArray = filesArray.concat(newFiles); // Menambahkan file baru ke filesArray
                updateFileList(); // Memperbarui daftar file yang ditampilkan
            }

            // Fungsi validasi file
            function checkValidity() {
                let isValid = true;

                // Validasi jumlah file
                if (filesArray.length > 5) {
                    fileError.textContent = "* Maksimal 5 file.";
                    isValid = false;
                } else {
                    fileError.textContent = "";
                }

                // Aktifkan tombol submit jika validasi lolos
                if (isValid && filesArray.length > 0) {
                    submitButton.disabled = false;
                    submitButton.classList.remove('disabled-button');
                    submitButton.classList.add('enabled-button');
                } else {
                    submitButton.disabled = true;
                    submitButton.classList.remove('enabled-button');
                    submitButton.classList.add('disabled-button');
                }
            }

            fileInput.addEventListener('change', handleFileSelect); // Menangani pemilihan file

            // Validasi Form
            function validateEmail() {
                const email = document.getElementById('email_pelapor').value;
                if (!email.includes('@')) {
                    document.getElementById('email_error').textContent = "* Email harus mengandung '@'.";
                    return false;
                }
                document.getElementById('email_error').textContent = "";
                return true;
            }

            function validateNIP() {
                const nip = document.getElementById('nip').value;
                const nipPattern = /^[0-9]+$/; // Hanya angka
                if (!nipPattern.test(nip)) {
                    document.getElementById('nip_error').textContent = "* NIP harus berisi angka.";
                    return false;
                }
                document.getElementById('nip_error').textContent = "";
                return true;
            }

            // Validasi Form
            function validateForm() {
                const isEmailValid = validateEmail();
                const isNIPValid = validateNIP();
                return isEmailValid && isNIPValid;
            }
        });
    </script>
</body>
</html>