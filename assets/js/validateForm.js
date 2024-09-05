document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('bukti_file');
    const fileList = document.getElementById('fileList');
    const submitButton = document.getElementById('submit_button');
    const fileError = document.getElementById('file_error');

    // Fungsi untuk menampilkan file dan opsi untuk menghapus
    function updateFileList() {
        fileList.innerHTML = ''; // Kosongkan daftar file sebelumnya
        const files = Array.from(fileInput.files);

        files.forEach((file, index) => {
            const fileItem = document.createElement('div');
            fileItem.classList.add('file-item');

            // Icon gambar untuk file tipe gambar
            const fileIcon = document.createElement('img');
            if (file.type.startsWith('image/')) {
                fileIcon.src = URL.createObjectURL(file);
            } else {
                fileIcon.src = 'path_to_default_file_icon.png'; // Path ke icon default untuk file non-gambar
            }

            const fileName = document.createElement('span');
            fileName.textContent = file.name;

            const removeBtn = document.createElement('span');
            removeBtn.classList.add('remove-file');
            removeBtn.textContent = 'X';
            removeBtn.addEventListener('click', function () {
                removeFile(index);
            });

            fileItem.appendChild(fileIcon);
            fileItem.appendChild(fileName);
            fileItem.appendChild(removeBtn);
            fileList.appendChild(fileItem);
        });

        checkValidity(); // Validasi saat daftar file diperbarui
    }

    // Fungsi untuk menghapus file dari input
    function removeFile(index) {
        const dataTransfer = new DataTransfer();
        const files = Array.from(fileInput.files);

        files.splice(index, 1); // Hapus file dari array
        files.forEach(file => dataTransfer.items.add(file)); // Masukkan ulang file selain yang dihapus

        fileInput.files = dataTransfer.files; // Set ulang input files
        updateFileList(); // Update tampilan daftar file
    }

    // Fungsi validasi file dan aktivasi tombol submit
    function checkValidity() {
        const files = fileInput.files;
        let isValid = true;

        // Validasi jumlah file
        if (files.length > 5) {
            fileError.textContent = "* Maksimal 5 file.";
            isValid = false;
        } else {
            fileError.textContent = "";
        }

        // Aktifkan tombol submit jika validasi lolos
        if (isValid && files.length > 0) {
            submitButton.disabled = false;
            submitButton.classList.remove('disabled-button');
            submitButton.classList.add('enabled-button');
        } else {
            submitButton.disabled = true;
            submitButton.classList.remove('enabled-button');
            submitButton.classList.add('disabled-button');
        }
    }

    // Event listeners
    fileInput.addEventListener('change', updateFileList);
});