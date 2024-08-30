document.addEventListener('DOMContentLoaded', function () {
    const nipField = document.getElementById('nip');
    const emailField = document.getElementById('email_pelapor');
    const fileField = document.getElementById('bukti_file');
    const submitButton = document.getElementById('submit_button');
    const nipError = document.getElementById('nip_error');
    const emailError = document.getElementById('email_error');
    const fileError = document.getElementById('file_error');

    function checkValidity() {
        let isValid = true;

        // Validasi NIP harus angka
        if (!/^\d+$/.test(nipField.value)) {
            nipError.textContent = "* Harus diisi dengan angka";
            isValid = false;
        } else {
            nipError.textContent = "";
        }

        // Validasi Email harus mencantumkan '@'
        if (!/@/.test(emailField.value)) {
            emailError.textContent = "* Email harus mencantumkan '@'";
            isValid = false;
        } else {
            emailError.textContent = "";
        }

        // Validasi file harus diunggah
        if (fileField.files.length === 0) {
            fileError.textContent = "* Harus menyertakan bukti file";
            isValid = false;
        } else {
            fileError.textContent = "";
        }

        // Aktifkan atau nonaktifkan tombol submit
        if (isValid) {
            submitButton.disabled = false;
            submitButton.classList.remove('disabled-button');
            submitButton.classList.add('enabled-button');
        } else {
            submitButton.disabled = true;
            submitButton.classList.remove('enabled-button');
            submitButton.classList.add('disabled-button');
        }
    }

    nipField.addEventListener('input', checkValidity);
    emailField.addEventListener('input', checkValidity);
    fileField.addEventListener('change', checkValidity);
});