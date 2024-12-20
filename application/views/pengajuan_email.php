<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengajuan Email</title>

    <link rel="icon" href="<?= base_url('assets/img/logo-unjani.png'); ?>" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #e0f5ec, #e0f5ec, #e0f5ec, #00aaff);
            background-size: cover;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            align-items: flex-start;
            height: 100vh;
            margin: 0;
            overflow: auto;
        }

        .navbar {
            background-color: white;
            height: 70px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1050;
        }

        .navbar-toggler {
            display: none;
        }

        .sidebar {
            background: linear-gradient(135deg, #13855c, #13855c, #1cc88a);
            height: 100vh;
            padding: 15px;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1100;
            width: 230px;
            transition: transform 0.3s ease;
            display: none;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .sidebar-brand-icon img {
            display: inline-block;
            width: 40px;
            height: auto;
        }

        .sidebar-brand-text {
            margin-left: 10px;
            margin-right: 3px;
            color: #ffffff;
            text-decoration: none !important;
            font-size: 18px;
        }

        .sidebar-divider {
            height: 0px;
            background-color: #ffffff !important;
        }

        .sidebar-heading {
            margin-top: 3px;
            margin-bottom: 3px;
            opacity: 0.5;
            font-size: 12px;
            font-weight: bold;
        }

        .nav-item .nav-link {
            color: #ffffff;
            text-decoration: none;
            opacity: 0.7;
            font-size: 14px;
            margin-left: -10px;
        }

        .nav-item .nav-link i {
            margin-right: 7px;
        }

        .nav-item .nav-link:hover {
            opacity: 1;
        }

        .nav-item.active .nav-link {
            opacity: 1;
            font-weight: bold;
        }

        .kembali-dashboard {
            background-color: #ffffff;
            color: #0e6b47 !important;
            font-weight: bold;
            border-radius: 5px;
            width: 100%;
            text-align: center;
            margin-left: 1px !important;
        }

        .sidebar .nav-item:last-child {
            justify-content: center;
        }

        .kembali-dashboard:hover {
            color: #1cc88a;
            text-decoration: none;
        }

        .container-fluid {
            padding: 20px;
        }

        h2 {
            margin-bottom: 30px;
            color: #0e6b47;
            font-size: 32px;
            font-weight: bold;
            text-align: center;
        }

        h2 i {
            margin-right: 15px;
        }

        .form-wrapper {
            position: static;
            width: 1000px;
            background: #ffffff;
            padding: 30px;
            margin-top: 80px;
            margin-bottom: 10px;
            margin-left: 25px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .form-container {
            align-items: center;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-group label {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            font-size: 16px;
            transition: all 0.3s ease;
            pointer-events: none;
            color: #0e6b47;
            z-index: 1;
        }

        .form-group input,
        .form-group select {
            color: #333;
            border: 1.5px solid #13855c;
            padding: 10px 15px 10px 15px;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
            z-index: 0;
        }

        .form-group input:focus,
        .form-group select:focus {
            box-shadow: 0 0 0 0.25rem rgba(0, 170, 255, 0.25);
            border-color: #00aaff;
        }

        .form-group input:not(:focus):not(:placeholder-shown)+label,
        .form-group select:not(:focus)+label {
            color: #0e6b47;
        }

        .form-group input:focus+label,
        .form-group input:not(:placeholder-shown)+label,
        .form-group select:focus+label,
        .form-group select:valid+label {
            top: -10px;
            left: 10px;
            font-size: 13px;
            background-color: #ffffff;
            padding: 0 5px;
            transform: translateY(0);
            color: #00aaff;
        }

        .form-group select:not(:focus):valid+label {
            color: #0e6b47;
        }

        .form-group input.error-border,
        .form-group select.error-border {
            border-color: #d9534f;
        }

        .form-group input.error-border:focus,
        .form-group select.error-border:focus {
            box-shadow: 0 0 0 0.2rem rgba(217, 83, 79, 0.25);
            border-color: #d9534f;
        }

        .form-group input.error-border+label,
        .form-group select.error-border+label {
            color: #d9534f !important;
        }

        .form-group input.shake+label,
        .form-group select.shake+label {
            color: #d9534f !important;
            box-shadow: none;
        }

        .input-group-text {
            background-color: #e0f5ec;
            border: 1.5px solid #13855c;
            color: #0e6b47;
        }

        .suggestion-radio {
            margin-top: -15px;
        }

        .suggestion-radio input[type="radio"] {
            cursor: pointer;
            appearance: none;
            border-color: #0e6b47;
            margin-right: 0.5rem;
        }

        .suggestion-radio input[type="radio"]:checked {
            background-color: #0e6b47;
            border-color: #0e6b47;
        }

        .suggestion-radio input[type="radio"]:focus {
            box-shadow: 0 0 0 0.25rem rgba(14, 107, 71, 0.5);
        }

        .email-group {
            margin-bottom: 37px;
        }

        .email-options {
            display: block;
            max-height: 0;
            transition: max-height 0.5s ease-out;
        }

        .email-options.show {
            max-height: 300px;
        }

        #emailSuggestions input[type="radio"] {
            margin-right: 0.25rem;
        }

        .feedback {
            font-size: 12px;
            margin-top: 4px;
        }

        .feedback.success {
            color: #0e6b47;
        }

        .feedback.error {
            color: #d9534f;
        }

        .error-border {
            border-color: #d9534f;
        }

        input[type="file"] {
            border: 1.5px solid #13855c;
            color: rgba(19, 133, 92, 0.5);
            width: 100%;
        }

        input[type="file"]:focus {
            box-shadow: 0 0 0 0.25rem rgba(0, 170, 255, 0.25);
            border-color: #00aaff;
            color: #0e6b47;
        }

        input[type="file"]::-webkit-file-upload-button {
            background-color: #e0f5ec;
            cursor: pointer;
            border-radius: 5px;
            padding: 1px 10px;
            margin-left: -7px;
            border: none;
            color: #0e6b47;
            transition: background-color 0.3s;
        }

        input[type="file"]::-webkit-file-upload-button:hover {
            background-color: rgba(0, 51, 102, 0.4);
        }

        input[type="file"].error-border {
            border-color: #d9534f;
        }

        .shake {
            animation: shake 0.5s;
            border-color: #d9534f;
            box-shadow: 0 0 0 0.2rem rgba(217, 83, 79, 0.25);
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            50% {
                transform: translateX(5px);
            }

            75% {
                transform: translateX(-5px);
            }
        }

        .btn-form {
            background: linear-gradient(135deg, #13855c, #1cc88a, #00aaff);
            color: #ffffff;
            border: none;
            border-radius: 5px;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-form:hover,
        .btn-form:active,
        .btn-form:focus {
            background: linear-gradient(135deg, #00aaff, #00aaff, #00aaff);
            color: #ffffff;
            transform: scale(1.03);
        }

        .btn-form.loading {
            background: linear-gradient(135deg, #13855c, #13855c, #13855c);
            color: transparent;
        }

        .spinner-border {
            position: absolute;
            width: 20px;
            height: 20px;
            border-width: 2px;
            border-color: #ffffff transparent transparent;
            border-radius: 50%;
            border-style: solid;
            display: none;
            animation: spinner-border 1s linear infinite;
        }

        .btn-form.loading .spinner-border {
            display: inline-block;
        }

        .btn-form .spinner-border {
            position: absolute;
            transform: translate(-50%, -50%);
        }

        .disable-interaction {
            pointer-events: none;
            cursor: not-allowed;
        }

        .modal-dialog {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            max-width: 400px;
            width: 100%;
        }

        .modal-content {
            border: none;
            border-radius: 10px;
        }

        .btn-close {
            position: absolute;
            top: 15px;
            right: 20px;
            color: #aaa;
            font-size: 15px;
            cursor: pointer;
        }

        .modal-body {
            padding: 30px;
        }

        .modal-body i {
            font-size: 100px;
            margin-top: 30px;
        }

        .modal-body p {
            font-size: 17px;
            color: #333;
        }

        .modal-body .status-text {
            font-size: 25px;
            margin-top: 15px;
            color: #13855c;
            font-weight: bold;
        }

        .modal-body .status-text.error {
            color: #dc3545;
        }

        .btn-success {
            background-color: #13855c;
            border-color: #13855c;
            color: #ffffff;
            width: 100%;
            margin-top: 30px;
        }

        .btn-success:hover {
            background-color: #0e6b47;
            color: #ffffff;
            transition: background-color 0.3s ease;
        }

        .btn-error {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #ffffff;
            width: 100%;
            margin-top: 30px;
        }

        .btn-error:hover {
            background-color: #c82333;
            color: #ffffff;
            transition: background-color 0.3s ease;
        }

        @keyframes spinner-border {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @media (max-width: 768px) {
            .form-wrapper {
                width: 100%;
                max-width: 100%;
                margin-left: 0;
            }

            .navbar-toggler {
                display: inline-block;
                position: absolute;
                top: 15px;
                left: 20px;
                z-index: 1000;
            }

            .sidebar {
                transform: translateX(-100%);
                display: block;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .form-group {
                position: relative;
                margin-bottom: 33px;
            }

            .row.mb-3 {
                margin-bottom: 1px !important;
            }
        }

        @media (max-width: 576px) {
            .form-wrapper {
                width: 100%;
                max-width: 100%;
                margin-left: 0;
            }

            .navbar-toggler {
                display: inline-block;
                position: absolute;
                top: 15px;
                left: 20px;
                z-index: 1000;
            }

            .sidebar {
                transform: translateX(-100%);
                display: block;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .form-group {
                position: relative;
                margin-bottom: 33px;
            }

            .row.mb-3 {
                margin-bottom: 1px !important;
            }
        }

        #whatsappButton {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 2000;
        }

        #whatsappButton a {
            position: relative;
            display: inline-block;
        }

        #whatsappButton a img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, background-color 0.3s ease;
            z-index: 1;
        }

        #whatsappButton a img:hover {
            transform: scale(1.1);
        }

        #whatsappButton a .tooltip-text {
            visibility: hidden;
            position: absolute;
            top: 50%;
            left: 75px;
            transform: translate(-20px, -50%);
            opacity: 0;
            background-color: rgba(255, 255, 255, 0.5);
            color: #0e6b47;
            padding: 5px 10px;
            border-radius: 4px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            white-space: nowrap;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        #whatsappButton a:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" aria-label="Toggle sidebar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <div class="sidebar d-md-block" id="sidebar">
            <a class="sidebar-brand" href="<?= site_url('EmailController'); ?>" style="text-decoration: none;">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url('assets/img/logo-unjani.png') ?>">
                </div>
                <div class="sidebar-brand-text">ACCESS TRACK</div>
            </a>
            <ul class="nav flex-column">
                <hr class="sidebar-divider">
                <div class="sidebar-heading">PENGAJUAN</div>
                <li class="nav-item active" style="margin-bottom: 5px !important;">
                    <a class="nav-link" href="<?= site_url('EmailController'); ?>" style="text-decoration: none;">
                        <i class="fas fa-envelope"></i>
                        <span>Pengajuan Email</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('EmailController/status_pengajuan_email'); ?>" style="text-decoration: none;">
                        <i class="fas fa-tasks"></i>
                        <span>Status Pengajuan Email</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link kembali-dashboard" href="<?= site_url('DashboardMahasiswa'); ?>" style="text-decoration: none;">
                        <i class="fas fa-arrow-left"></i>
                        <span>Kembali ke Dashboard</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
            </ul>
        </div>
        <div class="row form-container justify-content-center">
            <div class="col-md-8">
                <div class="form-wrapper">
                    <h2>Pengajuan Pembuatan Akun Email</h2>
                    <?= form_open_multipart('EmailController/submit'); ?>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nim" name="nim" placeholder=" " value="<?= set_value('nim'); ?>" required pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                <label for="nim" class="form-label">Nomor Induk Mahasiswa (NIM)</label>
                                <div id="nimValidationFeedback" class="feedback feedback-spacing"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-select" id="prodi" name="prodi" placeholder=" " required>
                                    <option value=""></option>
                                    <?php foreach ($program_studi as $value => $label): ?>
                                        <option value="<?= $value; ?>" <?= set_select('prodi', $value); ?>><?= $label; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label for="prodi" class="form-label">Program Studi</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder=" " value="<?= set_value('nama_lengkap'); ?>" required>
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <div id="namaLengkapFeedback" class="feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 suggestion-radio">
                        <div id="emailSuggestions">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="customEmail" name="email_option" value="custom" <?= set_radio('email_option', 'custom'); ?>>
                            <label class="form-check-label" for="customEmail" style="margin-bottom: 13px !important;">Buat username Anda sendiri</label>
                        </div>
                    </div>
                    <div id="customEmailField" class="mb-3 email-options">
                        <div class=" col-md-12">
                            <div class="form-group email-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="email_diajukan" style="z-index: 0;" name="email_diajukan" placeholder=" " value="<?= set_value('email_diajukan'); ?>" required>
                                    <label for="email_diajukan" class="form-label">Username</label>
                                    <span class="input-group-text" id="emailDomain">@if.unjani.ac.id</span>
                                </div>
                                <div id="emailValidationFeedback" class="feedback"></div>
                                <div id="emailAvailabilityFeedback" class="feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" id="email_pengguna" name="email_pengguna" placeholder=" " value="<?= set_value('email_pengguna'); ?>" required>
                                <label for="email_pengguna" class="form-label">Email Pengguna</label>
                                <div id="emailPenggunaFeedback" class="feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="file" class="form-control" id="ktm" name="ktm" placeholder=" " accept=".jpeg,.jpg,.png,.pdf" required>
                                <label for="ktm" class="form-label" style="padding-bottom: 0px;">Kartu Tanda Mahasiswa (KTM)</label>
                                <div id="ktmFeedback" class="feedback"></div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="recaptcha-token" name="recaptcha-token">
                    <button type="submit" class="btn btn-form btn-block">Kirim<div class="spinner-border"></div></button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 350px;">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <?php if ($this->session->flashdata('success')): ?>
                        <i class="fas fa-check-circle" style="color: #13855c; font-size: 100px; margin-top: 30px;"></i>
                        <p class="status-text">Terkirim!</p>
                        <p><?= $this->session->flashdata('success'); ?></p>
                    <?php elseif ($this->session->flashdata('error')): ?>
                        <i class="fas fa-exclamation-circle" style="color: #dc3545; font-size: 100px; margin-top: 30px;"></i>
                        <p class="status-text error">Gagal Terkirim!</p>
                        <p><?= $this->session->flashdata('error'); ?></p>
                    <?php endif; ?>
                    <button type="button" class="btn <?= $this->session->flashdata('error') ? 'btn-error' : 'btn-success'; ?>" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div id="whatsappButton">
        <a href="https://wa.me/+6289671432393" target="_blank">
            <img src="<?= base_url('assets/img/wa-icon.png') ?>" alt="Contact Us on WhatsApp">
            <span class="tooltip-text">Hubungi Kami</span>
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6Lf0PEQqAAAAANCvF8-NRJwRcVHMZDMbSD84j7gZ"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');

            const nimInput = document.getElementById('nim');
            const nimFeedback = document.getElementById('nimValidationFeedback');

            const namaLengkapInput = document.getElementById('nama_lengkap');
            const namaLengkapFeedback = document.getElementById('namaLengkapFeedback');

            const customEmailOption = document.getElementById('customEmail');
            const emailInput = document.getElementById('email_diajukan');
            const validationFeedback = document.getElementById('emailValidationFeedback');
            const availabilityFeedback = document.getElementById('emailAvailabilityFeedback');
            const emailSuggestions = document.getElementById('emailSuggestions');

            const emailPenggunaInput = document.getElementById('email_pengguna');
            const emailPenggunaFeedback = document.getElementById('emailPenggunaFeedback');

            const ktmInput = document.getElementById('ktm');
            const ktmFeedback = document.getElementById('ktmFeedback');

            nimInput.addEventListener('input', function() {
                const nimValue = nimInput.value;
                if (nimValue.length > 0) {
                    checkNimAvailability(nimValue);
                } else {
                    nimFeedback.textContent = '';
                    nimInput.classList.remove('error-border');
                }
            });

            function checkNimAvailability(nim) {
                $.ajax({
                    url: '<?= site_url('EmailController/check_nim_availability'); ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        nim: nim
                    },
                    success: function(response) {
                        if (response.status === 'taken') {
                            nimFeedback.textContent = 'NIM sudah terdaftar';
                            nimFeedback.className = 'feedback error';
                        } else {
                            nimFeedback.textContent = '';
                            nimInput.classList.remove('error-border');
                        }
                    }
                });
            }

            namaLengkapInput.addEventListener('input', function() {
                if (namaLengkapInput.value === '') {
                    namaLengkapFeedback.textContent = '';
                } else if (!/^[A-Za-z\s]+$/.test(namaLengkapInput.value)) {
                    namaLengkapFeedback.textContent = 'Nama lengkap hanya boleh berisi huruf dan spasi.';
                    namaLengkapFeedback.className = 'feedback error';
                } else {
                    namaLengkapFeedback.textContent = '';
                    namaLengkapInput.classList.remove('error-border');
                }
            });

            function toggleEmailField() {
                if ($('#customEmail').is(':checked')) {
                    $('#customEmailField').show();
                    $('#email_diajukan').prop('required', true);
                } else {
                    $('#customEmailField').hide();
                    $('#email_diajukan').prop('required', false);
                }
            }

            $('#prodi, #nama_lengkap').on('change keyup', updateDomain);
            $('#customEmail').change(toggleEmailField);
            $('#emailSuggestions').on('change', 'input[name="email_option"]', function() {
                toggleEmailField();
                var selectedEmail = $(this).val();
                $('#email_diajukan').val(selectedEmail);
            });

            updateDomain();
            toggleEmailField();

            $('#emailSuggestions').on('change', 'input[name="email_option"]', function() {
                var selectedEmail = $(this).val();
                $('#email_diajukan').val(selectedEmail);
                validationFeedback.textContent = '';
                availabilityFeedback.textContent = '';
                emailInput.classList.remove('error-border');
            });

            customEmailOption.addEventListener('change', function() {
                if (this.checked) {
                    document.getElementById('customEmailField').classList.add('show');
                    emailInput.value = ''; // Reset input email
                    validationFeedback.textContent = '';
                    availabilityFeedback.textContent = '';
                    emailInput.classList.remove('error-border');
                } else {
                    emailInput.value = '';
                    validationFeedback.textContent = '';
                    availabilityFeedback.textContent = '';
                    emailInput.classList.remove('error-border');
                }
            });

            emailInput.addEventListener('input', function() {
                const emailValue = emailInput.value;
                const lengthPattern = /^.{6,30}$/;
                const contentPattern = /^[a-z0-9.]+$/;
                const consecutiveDotPattern = /\.\./;
                const startEndDotPattern = /^\.|\.$/;

                if (emailValue === '') {
                    validationFeedback.textContent = '';
                    availabilityFeedback.textContent = '';
                } else if (!contentPattern.test(emailValue)) {
                    validationFeedback.textContent = 'Hanya huruf (a-z), angka (0-9), dan tanda titik (.) yang diizinkan.';
                    validationFeedback.className = 'feedback error';
                    availabilityFeedback.textContent = '';
                } else if (startEndDotPattern.test(emailValue)) {
                    validationFeedback.textContent = 'Tanda titik (.) tidak boleh di awal atau di akhir username.';
                    validationFeedback.className = 'feedback error';
                    availabilityFeedback.textContent = '';
                } else if (!lengthPattern.test(emailValue)) {
                    validationFeedback.textContent = 'Nama pengguna yang diajukan harus terdiri dari 6-30 karakter.';
                    validationFeedback.className = 'feedback error';
                    availabilityFeedback.textContent = '';
                } else if (consecutiveDotPattern.test(emailValue)) {
                    validationFeedback.textContent = 'Tanda titik (.) tidak boleh berurutan.';
                    validationFeedback.className = 'feedback error';
                    availabilityFeedback.textContent = '';
                } else {
                    validationFeedback.textContent = '';
                    checkEmailAvailability(emailValue);
                    emailInput.classList.remove('error-border');
                }
            });

            function checkEmailAvailability(emailPrefix) {
                var prodi = $('#prodi').val();
                if (emailPrefix.length > 0) {
                    $.ajax({
                        url: '<?= site_url('EmailController/check_email_availability'); ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            email_prefix: emailPrefix,
                            prodi: prodi,
                            nama_lengkap: $('#nama_lengkap').val()
                        },
                        success: function(response) {
                            var availabilityFeedback = '';
                            if (response.status === 'taken') {
                                availabilityFeedback = '<span class="feedback error">Username sudah terdaftar</span><br>';
                                if (response.suggestions.length > 0) {
                                    var suggestionsHtml = '<span class="feedback success">Saran Email: ' + response.suggestions.join(', ') + '</span>';
                                    availabilityFeedback += suggestionsHtml;
                                }
                            } else {
                                availabilityFeedback = '<span class="feedback success">Username tersedia</span>';
                                emailInput.classList.remove('error-border');
                            }
                            $('#emailAvailabilityFeedback').html(availabilityFeedback);
                        }
                    });
                } else {
                    $('#emailAvailabilityFeedback').empty();
                    emailInput.classList.remove('error-border');
                }
            }

            emailPenggunaInput.addEventListener('input', function() {
                const emailValue = emailPenggunaInput.value;
                const lengthPattern = /^.{6,30}$/;
                const contentPattern = /^[a-z0-9.@]+$/;
                const consecutiveDotPattern = /\.\./;
                const startEndDotPattern = /^\.|\.$/;

                if (emailValue === '') {
                    emailPenggunaFeedback.textContent = '';
                } else if (!contentPattern.test(emailValue)) {
                    emailPenggunaFeedback.textContent = 'Hanya huruf (a-z), angka (0-9), dan tanda titik (.) yang diizinkan.';
                    emailPenggunaFeedback.className = 'feedback error';
                } else if (startEndDotPattern.test(emailValue)) {
                    emailPenggunaFeedback.textContent = 'Tanda titik (.) tidak boleh di awal atau di akhir username.';
                    emailPenggunaFeedback.className = 'feedback error';
                } else if (!lengthPattern.test(emailValue)) {
                    emailPenggunaFeedback.textContent = 'Email harus terdiri dari 6-30 karakter.';
                    emailPenggunaFeedback.className = 'feedback error';
                } else if (consecutiveDotPattern.test(emailValue)) {
                    emailPenggunaFeedback.textContent = 'Tanda titik (.) tidak boleh berurutan.';
                    emailPenggunaFeedback.className = 'feedback error';
                } else {
                    emailPenggunaFeedback.textContent = '';
                    emailPenggunaInput.classList.remove('error-border');
                }
            });

            ktmInput.addEventListener('change', function() {
                const file = ktmInput.files[0];
                const allowedExtensions = ['image/jpeg', 'image/png', 'image/jpg'];
                const maxSize = 2 * 1024 * 1024;

                if (file) {
                    if (!allowedExtensions.includes(file.type)) {
                        ktmFeedback.textContent = 'File KTM harus dalam format .png, .jpg, atau .jpeg.';
                        ktmFeedback.className = 'feedback error';
                    } else if (file.size > maxSize) {
                        ktmFeedback.textContent = 'Ukuran file KTM tidak boleh lebih dari 2MB.';
                        ktmFeedback.className = 'feedback error';
                    } else {
                        ktmFeedback.textContent = '';
                        ktmInput.classList.remove('error-border');
                    }
                }
            });

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                form.classList.add('disable-interaction');

                const emailAvailabilityFeedback = document.getElementById('emailAvailabilityFeedback');
                const nimAvailabilityFeedback = nimFeedback.textContent
                let hasError = false;

                if (emailAvailabilityFeedback.textContent.includes('Username sudah terdaftar')) {
                    emailInput.classList.add('shake', 'error-border');
                    document.querySelector('label[for="email_diajukan"]').classList.add('shake');

                    setTimeout(() => {
                        emailInput.classList.remove('shake');
                        document.querySelector('label[for="email_diajukan"]').classList.remove('shake');
                    }, 500);
                    hasError = true;
                }

                if (validationFeedback.textContent.includes('Nama pengguna yang diajukan harus terdiri dari 6-30 karakter.') ||
                    validationFeedback.textContent.includes('Hanya huruf (a-z), angka (0-9), dan tanda titik (.) yang diizinkan.') ||
                    validationFeedback.textContent.includes('Tanda titik (.) tidak boleh di awal atau di akhir username.') ||
                    validationFeedback.textContent.includes('Tanda titik (.) tidak boleh berurutan.')) {
                    emailInput.classList.add('shake', 'error-border');
                    document.querySelector('label[for="email_diajukan"]').classList.add('shake');

                    setTimeout(() => {
                        emailInput.classList.remove('shake');
                        document.querySelector('label[for="email_diajukan"]').classList.remove('shake');
                    }, 500);

                    hasError = true;
                }

                if (nimFeedback.textContent.includes('NIM sudah terdaftar')) {
                    nimInput.classList.add('shake', 'error-border');
                    document.querySelector('label[for="nim"]').classList.add('shake', 'error-border');

                    setTimeout(() => {
                        nimInput.classList.remove('shake');
                        document.querySelector('label[for="nim"]').classList.remove('shake');
                    }, 500);
                    hasError = true;
                }

                if (namaLengkapFeedback.textContent.includes('Nama lengkap hanya boleh berisi huruf dan spasi.')) {
                    namaLengkapInput.classList.add('shake', 'error-border');
                    document.querySelector('label[for="nama_lengkap"]').classList.add('shake', 'error-border');

                    setTimeout(() => {
                        namaLengkapInput.classList.remove('shake');
                        document.querySelector('label[for="nama_lengkap"]').classList.remove('shake');
                    }, 500);
                    hasError = true;
                }

                if (emailPenggunaFeedback.textContent.includes('Hanya huruf (a-z), angka (0-9), dan tanda titik (.) yang diizinkan.') ||
                    emailPenggunaFeedback.textContent.includes('Tanda titik (.) tidak boleh di awal atau di akhir username.') ||
                    emailPenggunaFeedback.textContent.includes('Email harus terdiri dari 6-30 karakter.') ||
                    emailPenggunaFeedback.textContent.includes('Tanda titik (.) tidak boleh berurutan.')) {
                    emailPenggunaInput.classList.add('shake', 'error-border');
                    document.querySelector('label[for="email_pengguna"]').classList.add('shake', 'error-border');

                    setTimeout(() => {
                        emailPenggunaInput.classList.remove('shake');
                        document.querySelector('label[for="email_pengguna"]').classList.remove('shake');
                    }, 500);
                    hasError = true;
                }

                if (ktmFeedback.textContent.includes('File KTM harus dalam format .png, .jpg, atau .jpeg.') ||
                    ktmFeedback.textContent.includes('Ukuran file KTM tidak boleh lebih dari 2MB.')) {
                    ktmInput.classList.add('shake', 'error-border');
                    document.querySelector('label[for="ktm"]').classList.add('shake', 'error-border');

                    setTimeout(() => {
                        ktmInput.classList.remove('shake');
                        document.querySelector('label[for="ktm"]').classList.remove('shake');
                    }, 500);
                    hasError = true;
                }

                if (!hasError) {
                    const submitButton = event.target.querySelector('.btn-form');
                    submitButton.classList.add('loading');
                    submitButton.disabled = true;
                    setTimeout(() => {
                        form.submit();
                    }, 1000);
                } else {
                    form.classList.remove('disable-interaction');
                }
            });

            $('#prodi').on('change', function() {
                $('#email_diajukan').trigger('input');
            });

            function updateDomain() {
                var prodi = $('#prodi').val();
                var domain = '';
                switch (prodi) {
                    case 'Teknik Elektro S-1':
                        domain = '@te.unjani.ac.id';
                        break;
                    case 'Teknik Kimia S-1':
                        domain = '@student.unjani.ac.id';
                        break;
                    case 'Teknik Sipil S-1':
                        domain = '@ts.unjani.ac.id';
                        break;
                    case 'Magister Teknik Sipil S-2':
                        domain = '@mts.unjani.ac.id';
                        break;
                    case 'Teknik Geomatika S-1':
                        domain = '@student.unjani.ac.id';
                        break;
                    case 'Teknik Mesin S-1':
                        domain = '@tms.unjani.ac.id';
                        break;
                    case 'Teknik Industri S-1':
                        domain = '@ti.unjani.ac.id';
                        break;
                    case 'Teknik Metalurgi S-1':
                        domain = '@tme.unjani.ac.id';
                        break;
                    case 'Magister Manajemen Teknologi S-2':
                        domain = '@mmt.unjani.ac.id';
                        break;
                    case 'Akuntansi S-1':
                        domain = '@ak.unjani.ac.id';
                        break;
                    case 'Manajemen S-1':
                        domain = '@mn.unjani.ac.id';
                        break;
                    case 'Magister Manajemen S-2':
                        domain = '@mm.unjani.ac.id';
                        break;
                    case 'Ilmu Pemerintahan S-1':
                        domain = '@ip.unjani.ac.id';
                        break;
                    case 'Ilmu Hubungan Internasional S-1':
                        domain = '@hi.unjani.ac.id';
                        break;
                    case 'Magister Hubungan Internasional S-2':
                        domain = '@mhi.unjani.ac.id';
                        break;
                    case 'Ilmu Hukum S-1':
                        domain = '@hk.unjani.ac.id';
                        break;
                    case 'Magister Ilmu Pemerintahan S-2':
                        domain = '@mip.unjani.ac.id';
                        break;
                    case 'Kimia S-1':
                        domain = '@ki.unjani.ac.id';
                        break;
                    case 'Magister Kimia S-2':
                        domain = '@mk.unjani.ac.id';
                        break;
                    case 'Informatika S-1':
                        domain = '@if.unjani.ac.id';
                        break;
                    case 'Sistem Informasi S-1':
                        domain = '@si.unjani.ac.id';
                        break;
                    case 'Psikologi S-1':
                        domain = '@ps.unjani.ac.id';
                        break;
                    case 'Farmasi S-1':
                        domain = '@fa.unjani.ac.id';
                        break;
                    case 'Profesi Apoteker':
                        domain = '@student.unjani.ac.id';
                        break;
                    case 'Magister Farmasi S-2':
                        domain = '@student.unjani.ac.id';
                        break;
                    case 'Pendidikan Dokter S-1':
                        domain = '@fk.unjani.ac.id';
                        break;
                    case 'Profesi Dokter':
                        domain = '@fk.unjani.ac.id';
                        break;
                    case 'Administrasi Rumah Sakit S-1':
                        domain = '@fk.unjani.ac.id';
                        break;
                    case 'Magister Penuaan Kulit dan Estetika S-2':
                        domain = '@student.unjani.ac.id';
                        break;
                    case 'Kedokteran Gigi S-1':
                        domain = '@fkg.unjani.ac.id';
                        break;
                    case 'Profesi Dokter Gigi':
                        domain = '@fkg.unjani.ac.id';
                        break;
                    case 'Magister Keperawatan S-2':
                        domain = '@fts.unjani.ac.id';
                        break;
                    case 'Profesi Ners':
                        domain = '@fts.unjani.ac.id';
                        break;
                    case 'Ilmu Keperawatan S-1':
                        domain = '@fts.unjani.ac.id';
                        break;
                    case 'Keperawatan D-3':
                        domain = '@fts.unjani.ac.id';
                        break;
                    case 'Kesehatan Masyarakat S-1':
                        domain = '@student.unjani.ac.id';
                        break;
                    case 'Magister Kesehatan Masyarakat S-2':
                        domain = '@student.unjani.ac.id';
                        break;
                    case 'Teknologi Laboratorium Medis D-4':
                        domain = '@student.unjani.ac.id';
                        break;
                    case 'Teknologi Laboratorium Medis D-3':
                        domain = '@student.unjani.ac.id';
                        break;
                    case 'Kebidanan S-1':
                        domain = '@fts.unjani.ac.id';
                        break;
                    case 'Profesi Bidan':
                        domain = '@fts.unjani.ac.id';
                        break;
                    case 'Kebidanan D-3':
                        domain = '@fts.unjani.ac.id';
                        break;
                    default:
                        domain = '@student.unjani.ac.id';
                        break;
                }
                $('#emailDomain').text(domain);
                updateSuggestions();
            }

            function updateSuggestions() {
                var namaLengkap = $('#nama_lengkap').val();
                var prodi = $('#prodi').val();
                var isNamaLengkapValid = /^[A-Za-z\s]+$/.test(namaLengkap.trim());
                if (isNamaLengkapValid && prodi.trim()) {
                    $.ajax({
                        url: '<?= base_url('EmailController/generateSuggestions'); ?>',
                        type: 'POST',
                        data: {
                            nama_lengkap: namaLengkap,
                            prodi: prodi
                        },
                        success: function(response) {
                            var data = JSON.parse(response);
                            if (data.status === 'success') {
                                var suggestionsHtml = '';
                                data.suggestions.forEach(function(suggestion, index) {
                                    if (index < 2) {
                                        suggestionsHtml += '<div class="form-check"><input class="form-check-input" type="radio" name="email_option" id="suggestion' + (index + 1) + '" value="' + suggestion + '"><label class="form-check-label" for="suggestion' + (index + 1) + '">' + suggestion + '</label></div>';
                                    }
                                });
                                $('#emailSuggestions').html(suggestionsHtml);
                                $('.suggestion-radio').show();
                            } else {
                                $('#emailSuggestions').html('<p>Username tersedia.</p>');
                                $('.suggestion-radio').hide();
                            }
                        }
                    });
                    if ($('#customEmail').is(':checked')) {
                        $('#customEmailField').show();
                    }

                } else {
                    $('.suggestion-radio').hide();
                    $('#customEmailField').hide();
                }
            }

            <?php if ($this->session->flashdata('success') || $this->session->flashdata('error')): ?>
                var messageModal = new bootstrap.Modal(document.getElementById('messageModal'));
                messageModal.show();
                document.getElementById('messageModal').addEventListener('hidden.bs.modal', function() {
                    location.reload();
                });
            <?php endif; ?>

            grecaptcha.ready(function() {
                grecaptcha.execute('6Lf0PEQqAAAAANCvF8-NRJwRcVHMZDMbSD84j7gZ', {
                    action: 'submit'
                }).then(function(token) {
                    document.getElementById('recaptcha-token').value = token;
                });
            });

            const toggler = document.querySelector('.navbar-toggler');
            const sidebar = document.getElementById('sidebar');

            toggler.addEventListener('click', function(event) {
                sidebar.classList.toggle('show');
                event.stopPropagation();
            });

            document.addEventListener('click', function(event) {
                if (!sidebar.contains(event.target) && !toggler.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            });
        });

        document.getElementById('whatsappButton').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>

</html>