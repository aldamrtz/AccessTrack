<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminPengajuanController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('EmailModel');
        $this->load->model('SubDomainModel');
        $this->load->model('AdminPengajuanModel');
        $this->load->helper('url');
        $this->load->library('session');
        $this->checkLogin();
    }

    private function checkLogin()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('LoginPengajuanController');
        }
    }

    public function index()
    {
        $data['program_studi'] = $this->EmailModel->getProgramStudi();
        $data['admin_name'] = $this->session->userdata('admin_name');
        $data['profile_image'] = $this->session->userdata('profile_image');
        $all_pengajuan_email = $this->EmailModel->getAllPengajuan();

        // Filter data berdasarkan status
        $data['email_diajukan'] = array_filter($all_pengajuan_email, function ($item) {
            return $item['status_pengajuan'] == 'Diajukan';
        });
        $data['email_diproses'] = array_filter($all_pengajuan_email, function ($item) {
            return $item['status_pengajuan'] == 'Diproses';
        });
        $data['email_diverifikasi'] = array_filter($all_pengajuan_email, function ($item) {
            return $item['status_pengajuan'] == 'Diverifikasi';
        });
        $data['email_dikirim'] = array_filter($all_pengajuan_email, function ($item) {
            return $item['status_pengajuan'] == 'Selesai';
        });

        $this->load->view('data_pengajuan_email', $data);
    }

    public function data_pengajuan_email()
    {
        $data['program_studi'] = $this->EmailModel->getProgramStudi();
        if (empty($data['email_diajukan'])) {
            $data['email_diajukan'] = [];
        }
        $all_pengajuan_email = $this->EmailModel->getAllPengajuan();
        $data['email_diajukan'] = array_filter($all_pengajuan_email, function ($item) {
            return $item['status_pengajuan'] == 'Diajukan';
        });
        $data['email_diproses'] = array_filter($all_pengajuan_email, function ($item) {
            return $item['status_pengajuan'] == 'Diproses';
        });
        $data['email_diverifikasi'] = array_filter($all_pengajuan_email, function ($item) {
            return $item['status_pengajuan'] == 'Diverifikasi';
        });
        $data['email_dikirim'] = array_filter($all_pengajuan_email, function ($item) {
            return $item['status_pengajuan'] == 'Selesai';
        });

        $this->load->view('data_pengajuan_email', $data);
    }

    public function data_email_terdaftar()
    {
        $this->load->model('EmailModel'); // Load model
        $data['email_terdaftar'] = $this->EmailModel->getAllRegisteredEmails();
        $this->load->view('data_email_terdaftar', $data);
    }


    public function checkEmailExistence($email_prefix)
    {
        if ($this->EmailModel->isEmailExist($email_prefix)) {
            $this->form_validation->set_message('checkEmailExistence', 'Email yang diajukan sudah ada dalam pengajuan.');
            return FALSE;
        }
        if ($this->EmailModel->isEmailExistInRegistered($email_prefix)) {
            $this->form_validation->set_message('checkEmailExistence', 'Email sudah terdaftar, silahkan coba email lain.');
            return FALSE;
        }
        return TRUE;
    }

    public function check_email_availability()
    {
        $email_prefix = $this->input->post('email_prefix');
        $program_studi = $this->input->post('prodi');
        $domain = $this->getDomainByProdi($program_studi);

        $nama_lengkap = strtolower(str_replace(' ', '', $this->input->post('nama_lengkap')));
        $syllables = explode(' ', $this->input->post('nama_lengkap'));

        if ($this->EmailModel->isEmailExist($email_prefix) || $this->EmailModel->isEmailExistInRegistered($email_prefix)) {
            $suggestions = [];

            if (count($syllables) > 1) {
                $nama_depan = strtolower($syllables[0]);
                $nama_belakang = strtolower(implode('', array_slice($syllables, 1)));
            } else {
                $nama_depan = strtolower($nama_lengkap);
                $nama_belakang = strlen($nama_lengkap) < 6 ? $nama_lengkap . rand(1, 9) : $nama_lengkap;
            }

            $suggestionsWithDomain = [
                $nama_depan . $nama_belakang . $domain,
                $nama_belakang . $nama_depan . $domain,

                $nama_depan . '.' . $nama_belakang . $domain,
                $nama_belakang . '.' . $nama_depan . $domain,

                $nama_depan . rand(100, 999) . $domain,
                $nama_belakang . rand(100, 999) . $domain,

                $nama_depan . '.' . rand(100, 999) . $domain,
                $nama_belakang . '.' . rand(100, 999) . $domain,

                $nama_depan . $nama_belakang . rand(100, 999) . $domain,
                $nama_belakang . $nama_depan . rand(100, 999) . $domain,

                $nama_depan . '.' . $nama_belakang . rand(100, 999) . $domain,
                $nama_belakang . '.' . $nama_depan . rand(100, 999) . $domain,

                $nama_depan . $nama_belakang . '.' . rand(100, 999) . $domain,
                $nama_belakang . $nama_depan . '.' . rand(100, 999) . $domain,

                $nama_depan . substr($nama_belakang, 0, 1) . $domain,
                $nama_belakang . substr($nama_depan, 0, 1) . $domain,

                substr($nama_depan, 0, 1) . '.' . $nama_belakang . $domain,
                substr($nama_belakang, 0, 1) . '.' . $nama_depan . $domain,
            ];

            $suggestionsWithDomain = array_filter($suggestionsWithDomain, function ($suggestion) {
                $prefix = explode('@', $suggestion)[0];
                return !$this->EmailModel->isEmailExist($prefix);
            });

            $suggestionsWithoutDomain = [
                $nama_depan . $nama_belakang,
                $nama_belakang . $nama_depan,

                $nama_depan . '.' . $nama_belakang,
                $nama_belakang . '.' . $nama_depan,

                $nama_depan . rand(100, 999),
                $nama_belakang . rand(100, 999),

                $nama_depan . '.' . rand(100, 999),
                $nama_belakang . '.' . rand(100, 999),

                $nama_depan . $nama_belakang . rand(100, 999),
                $nama_belakang . $nama_depan . rand(100, 999),

                $nama_depan . '.' . $nama_belakang . rand(100, 999),
                $nama_belakang . '.' . $nama_depan . rand(100, 999),

                $nama_depan . $nama_belakang . '.' . rand(100, 999),
                $nama_belakang . $nama_depan . '.' . rand(100, 999),

                $nama_depan . substr($nama_belakang, 0, 1),
                $nama_belakang . substr($nama_depan, 0, 1),

                substr($nama_depan, 0, 1) . '.' . $nama_belakang,
                substr($nama_belakang, 0, 1) . '.' . $nama_depan,
            ];

            $existingSuggestions = array_map(function ($suggestion) {
                return explode('@', $suggestion)[0];
            }, $suggestionsWithDomain);

            $suggestionsWithoutDomain = array_filter($suggestionsWithoutDomain, function ($suggestion) use ($existingSuggestions) {
                return !in_array($suggestion, $existingSuggestions) && !$this->EmailModel->isEmailExist($suggestion);
            });

            shuffle($suggestionsWithoutDomain);

            $suggestionsWithoutDomain = array_unique($suggestionsWithoutDomain);

            while (count($suggestionsWithoutDomain) < 3) {
                $random_suffix = rand(100, 999);
                $new_suggestion = $nama_depan . $random_suffix;
                if (!in_array($new_suggestion, $suggestionsWithoutDomain) && !$this->EmailModel->isEmailExist($new_suggestion)) {
                    $suggestionsWithoutDomain[] = $new_suggestion;
                }
            }

            echo json_encode([
                'status' => 'taken',
                'suggestions' => array_slice($suggestionsWithoutDomain, 0, 3),
                'radioSuggestions' => $suggestionsWithDomain
            ]);
        } else {
            echo json_encode(['status' => 'available']);
        }
    }

    public function getDomainByProdi($prodi)
    {
        $domains = [
            'Teknik Elektro S-1' => '@te.unjani.ac.id',
            'Teknik Kimia S-1' => '@student.unjani.ac.id',
            'Teknik Sipil S-1' => '@ts.unjani.ac.id',
            'Magister Teknik Sipil S-2' => '@mts.unjani.ac.id',
            'Teknik Geomatika S-1' => '@student.unjani.ac.id',
            'Teknik Mesin S-1' => '@tms.unjani.ac.id',
            'Teknik Industri S-1' => '@ti.unjani.ac.id',
            'Teknik Metalurgi S-1' => '@tme.unjani.ac.id',
            'Magister Manajemen Teknologi S-2' => '@mmt.unjani.ac.id',
            'Akuntansi S-1' => '@ak.unjani.ac.id',
            'Manajemen S-1' => '@mn.unjani.ac.id',
            'Magister Manajemen S-2' => '@mm.unjani.ac.id',
            'Ilmu Pemerintahan S-1' => '@ip.unjani.ac.id',
            'Ilmu Hubungan Internasional S-1' => '@hi.unjani.ac.id',
            'Magister Hubungan Internasional S-2' => '@mhi.unjani.ac.id',
            'Ilmu Hukum S-1' => '@hk.unjani.ac.id',
            'Magister Ilmu Pemerintahan S-2' => '@mip.unjani.ac.id',
            'Kimia S-1' => '@ki.unjani.ac.id',
            'Magister Kimia S-2' => '@mk.unjani.ac.id',
            'Informatika S-1' => '@if.unjani.ac.id',
            'Sistem Informasi S-1' => '@si.unjani.ac.id',
            'Psikologi S-1' => '@ps.unjani.ac.id',
            'Farmasi S-1' => '@fa.unjani.ac.id',
            'Profesi Apoteker' => '@student.unjani.ac.id',
            'Magister Farmasi S-2' => '@student.unjani.ac.id',
            'Pendidikan Dokter S-1' => '@fk.unjani.ac.id',
            'Profesi Dokter' => '@fk.unjani.ac.id',
            'Administrasi Rumah Sakit S-1' => '@fk.unjani.ac.id',
            'Magister Penuaan Kulit dan Estetika S-2' => '@student.unjani.ac.id',
            'Kedokteran Gigi S-1' => '@fkg.unjani.ac.id',
            'Profesi Dokter Gigi' => '@fkg.unjani.ac.id',
            'Magister Keperawatan S-2' => '@fts.unjani.ac.id',
            'Profesi Ners' => '@fts.unjani.ac.id',
            'Ilmu Keperawatan S-1' => '@fts.unjani.ac.id',
            'Keperawatan D-3' => '@fts.unjani.ac.id',
            'Kesehatan Masyarakat S-1' => '@student.unjani.ac.id',
            'Magister Kesehatan Masyarakat S-2' => '@student.unjani.ac.id',
            'Teknologi Laboratorium Medis D-4' => '@student.unjani.ac.id',
            'Teknologi Laboratorium Medis D-3' => '@student.unjani.ac.id',
            'Kebidanan S-1' => '@fts.unjani.ac.id',
            'Profesi Bidan' => '@fts.unjani.ac.id',
            'Kebidanan D-3' => '@fts.unjani.ac.id'
        ];

        return isset($domains[$prodi]) ? $domains[$prodi] : '@student.unjani.ac.id'; // Default domain
    }

    public function updateStatusEmail()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status_pengajuan');

        $this->EmailModel->updateStatus($id, $status);
        $pengajuan = $this->EmailModel->getPengajuanById($id);
        $nama_lengkap = $pengajuan->nama_lengkap;

        if ($status == 'Diproses') {
            $subject = 'Pembaruan Status Pengajuan Email';
            $message = '<p>Halo, ' . $nama_lengkap . ',</p>';
            $message .= '<p>Ada pembaruan terbaru terkait pengajuan pembuatan akun email Anda.</p>';
            $message .= '<p>Silakan cek halaman berikut untuk mengetahui status terbaru: <a href="' . base_url('EmailController/status_pengajuan_email') . '">cek status pengajuan</a>.</p>';
            $message .= '<p>Salam hormat,</p>';
            $message .= '<p>Tim Admin</p>';
            $this->sendEmail($pengajuan->email_pengguna, $subject, $message);
        } elseif ($status == 'Diverifikasi') {
            $subject = 'Pembaruan Status Pengajuan Email';
            $message = '<p>Halo, ' . $nama_lengkap . ',</p>';
            $message .= '<p>Ada pembaruan terbaru terkait pengajuan pembuatan akun email Anda.</p>';
            $message .= '<p>Silakan cek halaman berikut untuk mengetahui status terbaru: <a href="' . base_url('EmailController/status_pengajuan_email') . '">cek status pengajuan</a>.</p>';
            $message .= '<p>Salam hormat,</p>';
            $message .= '<p>Tim Admin</p>';
            $this->sendEmail($pengajuan->email_pengguna, $subject, $message);
        }
        redirect('AdminPengajuanController/data_pengajuan_email');
    }

    public function sendEmailWithPassword()
    {
        $id = $this->input->post('id');
        $password = $this->input->post('password');
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->EmailModel->updateStatus($id, 'Selesai');
        $pengajuan = $this->EmailModel->getPengajuanById($id);
        $nama_lengkap = $pengajuan->nama_lengkap;

        $to = $pengajuan->email_pengguna;
        $subject = 'Akun Email Anda Telah Dibuat';
        $message = '<p>Halo, ' . $nama_lengkap . ',</p>';
        $message .= '<p>Kami menginformasikan bahwa akun email Anda telah berhasil dibuat.</p>';
        $message .= '<p><strong>Detail Akun:</strong></p>';
        $message .= '<p>Email: <strong>' . $pengajuan->email_diajukan . '</strong></p>';
        $message .= '<p>Password: <strong>' . $password . '</strong></p>';
        $message .= '<p>Silakan gunakan informasi ini untuk mengakses akun email Anda.</p>';
        $message .= '<p>Jika Anda memiliki pertanyaan lebih lanjut atau memerlukan bantuan, jangan ragu untuk menghubungi kami.</p>';
        $message .= '<p>Salam hormat,</p>';
        $message .= '<p>Tim Admin</p>';
        $this->sendEmail($to, $subject, $message);

        $tgl_selesai = date('Y-m-d');
        $registered_email_data = [
            'nim' => $pengajuan->nim,
            'prodi' => $pengajuan->prodi,
            'nama_lengkap' => $pengajuan->nama_lengkap,
            'email' => $pengajuan->email_diajukan,
            'password' => $hashedPassword,
            'tgl_selesai' => $tgl_selesai
        ];

        $this->EmailModel->insertToRegistered($registered_email_data);

        redirect('AdminPengajuanController/data_pengajuan_email');
    }

    public function deletePengajuanEmail()
    {
        $id = $this->input->post('id');
        if ($id) {
            $this->EmailModel->deletePengajuan($id);
        }
        redirect('AdminPengajuanController/data_pengajuan_email');
    }

    public function deleteEmailTerdaftar()
    {
        $id = $this->input->post('id');
        if ($id) {
            $this->EmailModel->deleteEmailTerdaftar($id);
        }
        redirect('AdminPengajuanController/data_email_terdaftar');
    }

    public function editPengajuanEmail()
    {
        $data['program_studi'] = $this->EmailModel->getProgramStudi();

        $nim = $this->input->post('nim');
        $prodi = $this->input->post('prodi');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $email_diajukan = $this->input->post('email_diajukan');
        $email_pengguna = $this->input->post('email_pengguna');

        $ktm = $this->input->post('current_ktm');

        if (!empty($_FILES['ktm']['name']) && $_FILES['ktm']['error'] == 0) {
            $file_extension = strtolower(pathinfo($_FILES['ktm']['name'], PATHINFO_EXTENSION));
            if (in_array($file_extension, ['jpeg', 'jpg', 'png'])) {
                $file = $_FILES['ktm']['tmp_name'];
                $fileData = file_get_contents($file);
                $ktm = 'data:application/' . $file_extension . ';base64,' . base64_encode($fileData);
            }
        }

        $this->EmailModel->updatePengajuan($nim, $prodi, $nama_lengkap, $email_diajukan, $email_pengguna, $ktm);
        redirect('AdminPengajuanController/data_pengajuan_email');
    }

    public function data_pengajuan_subdomain()
    {
        if (empty($data['subdomain_diajukan'])) {
            $data['subdomain_diajukan'] = [];
        }
        $all_pengajuan_subdomain = $this->SubDomainModel->getAllPengajuan();
        $data['subdomain_diajukan'] = array_filter($all_pengajuan_subdomain, function ($item) {
            return $item['status_pengajuan'] == 'Diajukan';
        });
        $data['subdomain_diproses'] = array_filter($all_pengajuan_subdomain, function ($item) {
            return $item['status_pengajuan'] == 'Diproses';
        });
        $data['subdomain_diverifikasi'] = array_filter($all_pengajuan_subdomain, function ($item) {
            return $item['status_pengajuan'] == 'Diverifikasi';
        });
        $data['subdomain_dikirim'] = array_filter($all_pengajuan_subdomain, function ($item) {
            return $item['status_pengajuan'] == 'Selesai';
        });

        $this->load->view('data_pengajuan_subdomain', $data);
    }

    public function data_subdomain_terdaftar()
    {
        $this->load->model('SubdomainModel');
        $data['subdomain_terdaftar'] = $this->SubdomainModel->getAllRegisteredSubdomains();
        $this->load->view('data_subdomain_terdaftar', $data);
    }

    public function checkSubDomainExistence($sub_domain)
    {
        if ($this->SubDomainModel->isSubDomainExist($sub_domain)) {
            $this->form_validation->set_message('checkSubDomainExistence', 'Subdomain sudah terdaftar');
            return FALSE;
        }
        if ($this->SubDomainModel->isSubDomainExistInRegistered($sub_domain)) {
            $this->form_validation->set_message('checkSubDomainExistence', 'Subdomain sudah terdaftar');
            return FALSE;
        }
        return TRUE;
    }

    public function check_subdomain_availability()
    {
        $sub_domain_prefix = $this->input->post('sub_domain_prefix');
        $sub_domain_prefix = str_replace(['https://', 'http://', '.unjani.ac.id'], '', $sub_domain_prefix);

        $exists = $this->SubDomainModel->checkSubDomainExists($sub_domain_prefix);

        if ($exists) {
            echo json_encode(['status' => 'taken']);
        } else {
            echo json_encode(['status' => 'available']);
        }
    }

    public function updateStatusSubDomain()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status_pengajuan');

        $this->SubDomainModel->updateStatus($id, $status);
        $pengajuan = $this->SubDomainModel->getPengajuanById($id);
        $penanggung_jawab = $pengajuan->penanggung_jawab;

        if ($status == 'Diproses') {
            $subject = 'Pembaruan Status Pengajuan Subdomain';
            $message = '<p>Halo, ' . $penanggung_jawab . ',</p>';
            $message .= '<p>Ada pembaruan terbaru terkait pengajuan pembuatan subdomain Anda.</p>';
            $message .= '<p>Silakan cek halaman berikut untuk mengetahui status terbaru: <a href="' . base_url('SubdomainController/status_pengajuan_subdomain') . '">cek status pengajuan</a>.</p>';
            $message .= '<p>Salam hormat,</p>';
            $message .= '<p>Tim Admin</p>';
            $this->sendEmail($pengajuan->email_penanggung_jawab, $subject, $message);
        } elseif ($status == 'Diverifikasi') {
            $subject = 'Pembaruan Status Pengajuan Subdomain';
            $message = '<p>Halo, ' . $penanggung_jawab . ',</p>';
            $message .= '<p>Ada pembaruan terbaru terkait pengajuan pembuatan subdomain Anda.</p>';
            $message .= '<p>Silakan cek halaman berikut untuk mengetahui status terbaru: <a href="' . base_url('SubdomainController/status_pengajuan_subdomain') . '">cek status pengajuan</a>.</p>';
            $message .= '<p>Salam hormat,</p>';
            $message .= '<p>Tim Admin</p>';
            $this->sendEmail($pengajuan->email_penanggung_jawab, $subject, $message);
        } elseif ($status == 'Selesai') {
            $subject = 'Subdomain Anda Telah Dibuat';
            $message = '<p>Halo, ' . $penanggung_jawab . ',</p>';
            $message .= '<p>Kami menginformasikan bahwa subdomain Anda telah berhasil dibuat.</p>';
            $message .= '<p><strong>Detail:</strong></p>';
            $message .= '<p>Subdomain: <strong>' . $pengajuan->sub_domain . '</strong></p>';
            $message .= '<p>Jika Anda memiliki pertanyaan lebih lanjut atau memerlukan bantuan, jangan ragu untuk menghubungi kami.</p>';
            $message .= '<p>Salam hormat,</p>';
            $message .= '<p>Tim Admin</p>';
            $this->sendEmail($pengajuan->email_penanggung_jawab, $subject, $message);

            $tgl_selesai = date('Y-m-d');
            $registered_subdomain_data = [
                'nomor_induk' => $pengajuan->nomor_induk,
                'unit_kerja' => $pengajuan->unit_kerja,
                'penanggung_jawab' => $pengajuan->penanggung_jawab,
                'sub_domain' => $pengajuan->sub_domain,
                'tgl_selesai' => $tgl_selesai
            ];
            $this->SubDomainModel->insertToRegistered($registered_subdomain_data);
        }

        redirect('AdminPengajuanController/data_pengajuan_subdomain');
    }

    public function deletePengajuanSubdomain()
    {
        $id = $this->input->post('id');
        if ($id) {
            $this->SubDomainModel->deletePengajuan($id);
        }
        redirect('AdminPengajuanController/data_pengajuan_subdomain');
    }

    public function deleteSubdomainTerdaftar()
    {
        $id = $this->input->post('id');
        if ($id) {
            $this->SubDomainModel->deleteSubdomainTerdaftar($id);
        }
        redirect('AdminPengajuanController/data_subdomain_terdaftar');
    }

    public function editPengajuanSubdomain()
    {
        $id_pengajuan_subdomain = $this->input->post('id_pengajuan_subdomain');
        $nomor_induk = $this->input->post('nomor_induk');
        $unit_kerja = $this->input->post('unit_kerja');
        $penanggung_jawab = $this->input->post('penanggung_jawab');
        $email_penanggung_jawab = $this->input->post('email_penanggung_jawab');
        $kontak_penanggung_jawab = $this->input->post('kontak_penanggung_jawab');
        $sub_domain = $this->input->post('sub_domain');
        $ip_pointing = $this->input->post('ip_pointing');
        $keterangan = $this->input->post('keterangan');

        // Update data di database
        $this->subDomainModel->updatePengajuan($id_pengajuan_subdomain, $nomor_induk, $unit_kerja, $penanggung_jawab, $email_penanggung_jawab, $kontak_penanggung_jawab, $sub_domain, $ip_pointing, $keterangan);

        redirect('AdminPengajuanController/data_pengajuan_subdomain');
    }

    public function sendEmail($to, $subject, $message)
    {
        $this->load->library('email');

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'aldaamorita@gmail.com', // Ganti dengan email kamu
            'smtp_pass' => 'iftxvtcfydxwalsy',        // Ganti dengan password email kamu
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1',
            'wordwrap'  => TRUE
        );

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from('aldaamorita@gmail.com', 'Admin Unjani');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }
}
