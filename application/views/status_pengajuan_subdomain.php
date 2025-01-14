<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Status Pengajuan Subdomain</title>

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

        .btn-keluar {
            margin-left: auto;
            background-color: #0e6b47;
            color: #ffffff;
            margin-top: -13px !important;
        }

        .btn-keluar:hover {
            background-color: #13855c;
            color: #ffffff;
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
            color: #333;
            font-weight: bold;
        }

        .btn-ya {
            background-color: #dc3545;
            color: #ffffff;
            width: 70px;
            margin-top: 30px;
        }

        .btn-ya:hover {
            background-color: #c82333;
            color: #ffffff;
            transition: background-color 0.3s ease;
        }

        .btn-tidak {
            background-color: #13855c;
            color: #ffffff;
            width: 70px;
            margin-top: 30px;
        }

        .btn-tidak:hover {
            background-color: #0e6b47;
            color: #ffffff;
            transition: background-color 0.3s ease;
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
            width: 267px;
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
            text-shadow: #ffffff
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

        .form-wrapper {
            position: static;
            width: 962px;
            background: #ffffff;
            padding: 30px;
            margin-top: 80px;
            margin-bottom: 7px;
            margin-left: 63px;
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

        .form-group .keterangan-label {
            position: absolute;
            top: 25%;
            left: 15px;
            transform: translateY(-50%);
            font-size: 16px;
            transition: all 0.3s ease;
            pointer-events: none;
            color: #0e6b47;
            z-index: 1;
        }

        .form-group input,
        .form-group textarea {
            color: #333;
            border-color: #0e6b47;
            padding: 10px 15px 10px 15px;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
            z-index: 0;
        }

        .form-group input:not(:focus):not(:placeholder-shown)+label,
        .form-group textarea:not(:focus):not(:placeholder-shown)+label {
            color: #0e6b47;
        }

        .form-group input:focus+label,
        .form-group input:not(:placeholder-shown)+label,
        .form-group textarea:focus+label,
        .form-group textarea:not(:placeholder-shown)+label {
            top: -10px;
            left: 10px;
            font-size: 13px;
            background-color: #ffffff;
            padding: 0 5px;
            transform: translateY(0);
            color: #0e6b47;
        }

        .form-group input:disabled,
        .form-group textarea:disabled {
            background-color: white;
            pointer-events: none;
            cursor: not-allowed;
        }

        .nav-tabs {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin-bottom: 35px;
            margin-top: 10px;
            border-color: #0e6b47;
        }

        .nav-tabs .nav-link {
            margin-left: -1px;
            color: #0e6b47;
            font-size: 15px;
            font-weight: bold;
            width: 100px;
            border-top: 5px solid transparent;
        }

        .nav-tabs .nav-link.active {
            border-color: #0e6b47;
            border-top: 5px solid #0e6b47;
            color: #0e6b47 !important;
            opacity: 1;
            border-bottom-color: white;
        }

        .nav-tabs .nav-link:hover {
            color: #0e6b47;
            border-color: #0e6b47;
        }

        .status-box {
            margin-top: -10px;
        }

        .status-history {
            padding: 20px;
            background-color: #f0f0f0;
            margin-bottom: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        h4 {
            font-weight: bold;
            color: #333;
        }

        .h4-data {
            font-weight: bold;
            color: #333;
            margin-top: -10px;
            margin-bottom: 25px;

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
                    <span class="navbar-toggler-icon"></span> <!-- Icon burger -->
                </button>
                <a data-bs-toggle="modal" data-bs-target="#logoutModal" href="<?= site_url('EmailController/logoutStatus'); ?>" class="btn btn-keluar">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw"></i> Keluar
                </a>
            </div>
        </nav>

        <!-- Sidebar -->
        <div class="sidebar d-md-block" id="sidebar">
            <a class="sidebar-brand" href="<?= site_url('SubDomainController'); ?>" style="text-decoration: none;">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url('assets/img/logo-unjani.png') ?>">
                </div>
                <div class="sidebar-brand-text">ACCESS TRACK</div>
            </a>
            <ul class="nav flex-column">
                <hr class="sidebar-divider">
                <div class="sidebar-heading">PENGAJUAN</div>
                <li class="nav-item" style="margin-bottom: 5px !important;">
                    <a class="nav-link" href="<?= site_url('SubDomainController'); ?>" style="text-decoration: none;">
                        <i class="fas fa-globe"></i>
                        <span>Pengajuan Subdomain</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('SubDomainController/status_pengajuan_subdomain'); ?>" style="text-decoration: none;">
                        <i class="fas fa-tasks"></i>
                        <span>Status Pengajuan Subdomain</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <?php
                    $user_role = $this->session->userdata('id_role');
                    $dashboard_url = '';

                    if (in_array($user_role, ['4'])) {
                        $dashboard_url = site_url('DashboardTendik');
                    } elseif (in_array($user_role, ['5'])) {
                        $dashboard_url = site_url('DashboardDosen');
                    }
                    ?>
                    <a class="nav-link kembali-dashboard" href="<?= $dashboard_url; ?>" style="text-decoration: none;">
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
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="status-tab" data-bs-toggle="tab" data-bs-target="#status" type="button" role="tab" aria-controls="status" aria-selected="true">Status</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="data-tab" data-bs-toggle="tab" data-bs-target="#data" type="button" role="tab" aria-controls="data" aria-selected="false">Data</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="status" role="tabpanel" aria-labelledby="status-tab">
                            <div class="status-box">
                                <h4>Status Pengajuan</h4>
                                <p>Informasi di bawah ini merupakan update pengajuan anda terkini</p>
                                <div id="status-history">
                                    <?php
                                    $bulan = [
                                        1 => 'Januari',
                                        'Februari',
                                        'Maret',
                                        'April',
                                        'Mei',
                                        'Juni',
                                        'Juli',
                                        'Agustus',
                                        'September',
                                        'Oktober',
                                        'November',
                                        'Desember'
                                    ];

                                    foreach ($status_history_subdomain as $status):
                                        $date = new DateTime($status['tgl_update']);
                                        $hari = $date->format('d');
                                        $bulanIndo = $bulan[(int)$date->format('m')];
                                        $tahun = $date->format('Y');
                                        $jam = $date->format('H:i');
                                    ?>
                                        <div class="status-history">
                                            <p>Status: <strong><?= $status['status']; ?></strong></p>
                                            <p><?= "$hari $bulanIndo $tahun, $jam"; ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="data" role="tabpanel" aria-labelledby="data-tab">
                            <h4 class="h4-data">Data Pengajuan</h4>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" min="7" class="form-control" id="nomor_induk" name="nomor_induk" placeholder=" " value="<?= $pengajuan_subdomain->nomor_induk; ?>" disabled pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                        <label for="nomor_induk" class="form-label">Nomor Induk (NIP/NID)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="prunit_kerjaodi" name="unit_kerja" placeholder=" " value="<?= $pengajuan_subdomain->unit_kerja; ?>" disabled>
                                        <label for="unit_kerja" class="form-label">Unit Kerja</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" placeholder=" " value="<?= $pengajuan_subdomain->penanggung_jawab; ?>" disabled>
                                        <label for="penanggung_jawab" class="form-label">Penanggung Jawab</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email_penanggung_jawab" name="email_penanggung_jawab" placeholder=" " value="<?= $pengajuan_subdomain->email_penanggung_jawab; ?>" disabled>
                                        <label for="email_penanggung_jawab" class="form-label">Email Penanggung Jawab</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" min="7" class="form-control" id="kontak_penanggung_jawab" name="kontak_penanggung_jawab" placeholder=" " value="<?= $pengajuan_subdomain->kontak_penanggung_jawab; ?>" disabled pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                        <label for="kontak_penanggung_jawab" class="form-label">Kontak Penanggung Jawab</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class=" col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="sub_domain" style="z-index: 0;" name="sub_domain" placeholder=" " value="<?= $pengajuan_subdomain->sub_domain; ?>" disabled>
                                        <label for="sub_domain" class="form-label">Subdomain yang Diajukan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="ip_pointing" name="ip_pointing" placeholder=" " value="<?= $pengajuan_subdomain->ip_pointing; ?>" disabled>
                                        <label for="ip_pointing" class="form-label">IP Pointing</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="keterangan" rows="3" name="keterangan" placeholder=" " disabled><?= $pengajuan_subdomain->keterangan; ?></textarea>
                                        <label for="keterangan" class="form-label keterangan-label">Keterangan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 350px;">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <i class="fas fa-exclamation-circle" style="color: #dc3545; font-size: 100px; margin-top: 30px;"></i>
                    <p class="status-text">Konfirmasi Logout</p>
                    <p>Apakah Anda yakin ingin keluar dari halaman ini?</p>
                    <a class="btn btn-ya" href="<?= site_url('SubDomainController/logoutStatus'); ?>">Ya</a>
                    <button type="button" class="btn btn-tidak" data-bs-dismiss="modal">Tidak</button>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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

            activateSavedTab();

            function saveActiveTab(tabId) {
                localStorage.setItem('activeTab', tabId);
            }

            function activateSavedTab() {
                const activeTabId = localStorage.getItem('activeTab');
                if (activeTabId) {
                    const tabTrigger = document.querySelector(`button[data-bs-target="${activeTabId}"]`);
                    if (tabTrigger) {
                        const tab = new bootstrap.Tab(tabTrigger);
                        tab.show();

                        // Hide other tab panes
                        const tabPanes = document.querySelectorAll('.tab-pane');
                        tabPanes.forEach(pane => {
                            pane.classList.remove('show', 'active');
                        });
                        const activePane = document.querySelector(activeTabId);
                        if (activePane) {
                            activePane.classList.add('show', 'active');
                        }
                    }
                }
            }

            document.addEventListener('shown.bs.tab', function(event) {
                const tabId = event.target.getAttribute('data-bs-target');
                saveActiveTab(tabId);
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