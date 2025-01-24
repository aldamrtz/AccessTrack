<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmailModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function get_user_data($id_user)
    {
        $this->db->select('id_user, nama_lengkap');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function insert($data)
    {
        if ($this->db->get_where('pengajuan_email', ['nim' => $data['nim']])->num_rows() > 0) {
            return FALSE;
        } else {
            if (!isset($data['tgl_Pengajuan'])) {
                $data['tgl_pengajuan'] = date('Y-m-d H:i:s');
            }
            return $this->db->insert('pengajuan_email', $data);
        }
    }

    public function isNimTaken($nim)
    {
        $this->db->where('nim', $nim);
        $query1 = $this->db->get('pengajuan_email');
        $this->db->where('nim', $nim);
        $query2 = $this->db->get('email_terdaftar');
        return $query1->num_rows() > 0 || $query2->num_rows() > 0;
    }

    public function isEmailExist($email_prefix)
    {
        $this->db->like('email_diajukan', $email_prefix . '@', 'after');
        $query = $this->db->get('pengajuan_email');
        return $query->num_rows() > 0;
    }

    public function isEmailExistInRegistered($email_prefix)
    {
        $this->db->like('email', $email_prefix . '@', 'after');
        $query = $this->db->get('email_terdaftar');
        return $query->num_rows() > 0;
    }

    public function insertToRegistered($data)
    {
        return $this->db->insert('email_terdaftar', $data);
    }

    public function getAllRegisteredEmails()
    {
        $this->db->select('nim, fakultas, prodi, nama_lengkap, email, password, tgl_selesai');
        $query = $this->db->get('email_terdaftar');
        return $query->result_array();
    }

    public function getAllPengajuan()
    {
        $this->db->order_by('tgl_pengajuan', 'ASC');
        $query = $this->db->get('pengajuan_email');
        return $query->result_array();
    }

    public function getPengajuanByStatus($status)
    {
        $this->db->where('status_pengajuan', $status);
        $this->db->order_by('tgl_pengajuan', 'ASC');
        return $this->db->get('pengajuan_email')->result_array();
    }

    public function updateStatus($id, $status)
    {
        $this->db->where('nim', $id);
        $this->db->update('pengajuan_email', array('status_pengajuan' => $status));
        $this->db->insert('status_history_email', array('nim' => $id, 'status' => $status));
    }

    public function getStatusHistory($nim)
    {
        $this->db->where('nim', $nim);
        $this->db->order_by('tgl_update', 'ASC'); // pastikan ada kolom tgl_update di tabel
        return $this->db->get('status_history_email')->result_array();
    }

    public function insertStatusHistoryEmail($data)
    {
        return $this->db->insert('status_history_email', $data);
    }

    public function getPengajuanById($id)
    {
        $query = $this->db->get_where('pengajuan_email', array('nim' => $id));
        return $query->row();
    }

    public function checkEmailAndCode($email_pengguna, $kode_pengajuan)
    {
        $this->db->where('email_pengguna', $email_pengguna);
        $query = $this->db->get('pengajuan_email');

        if ($query->num_rows() == 0) {
            return 'email_not_found';
        }

        $this->db->where('kode_pengajuan', $kode_pengajuan);
        $query = $this->db->get('pengajuan_email');

        if ($query->num_rows() == 0) {
            return 'kode_salah';
        }

        return 'success';
    }

    public function getPengajuanByEmailAndCode($email_pengguna, $kode_pengajuan)
    {
        $this->db->where('email_pengguna', $email_pengguna);
        $this->db->where('kode_pengajuan', $kode_pengajuan);
        $query = $this->db->get('pengajuan_email');
        return $query->row();
    }

    public function updatePengajuan($nim, $fakultas, $prodi, $nama_lengkap, $email_diajukan, $email_pengguna, $ktm)
    {
        $data = [
            'fakultas' => $fakultas,
            'prodi' => $prodi,
            'nama_lengkap' => $nama_lengkap,
            'email_diajukan' => $email_diajukan,
            'email_pengguna' => $email_pengguna,
            'ktm' => $ktm
        ];

        $this->db->where('nim', $nim);
        $this->db->update('pengajuan_email', $data);
    }


    public function deletePengajuan($nim)
    {
        $this->db->where('nim', $nim);
        $this->db->delete('status_history_email');

        $this->db->where('nim', $nim);
        $this->db->delete('pengajuan_email');

        $this->db->where('nim', $nim);
        return $this->db->delete('email_terdaftar');
    }


    public function deleteEmailTerdaftar($nim)
    {
        $this->db->where('nim', $nim);
        $this->db->delete('status_history_email');

        $this->db->where('nim', $nim);
        $this->db->delete('pengajuan_email');

        $this->db->where('nim', $nim);
        return $this->db->delete('email_terdaftar');
    }

    public function getFakultas()
    {
        return [
            'Fakultas Teknik' => 'Fakultas Teknik',
            'Fakultas Sains dan Informatika' => 'Fakultas Sains dan Informatika',
            'Fakultas Ekonomi dan Bisnis' => 'Fakultas Ekonomi dan Bisnis',
            'Fakultas Ilmu Sosial dan Ilmu Politik' => 'Fakultas Ilmu Sosial dan Ilmu Politik',
            'Fakultas Kedokteran' => 'Fakultas Kedokteran',
            'Fakultas Psikologi' => 'Fakultas Psikologi',
            'Fakultas Farmasi' => 'Fakultas Farmasi',
            'Fakultas Teknologi Manufaktur' => 'Fakultas Teknologi Manufaktur',
            'Fakultas Kedokteran Gigi' => 'Fakultas Kedokteran Gigi',
            'Fakultas Ilmu dan Teknologi Kesehatan' => 'Fakultas Ilmu dan Teknologi Kesehatan'
        ];
    }

    public function getProgramStudi()
    {
        return [
            'Fakultas Teknik' => [
                'Teknik Elektro S-1',
                'Teknik Kimia S-1',
                'Teknik Sipil S-1',
                'Magister Teknik Sipil S-2',
                'Teknik Geomatika S-1'
            ],
            'Fakultas Sains dan Informatika' => [
                'Kimia S-1',
                'Magister Kimia S-2',
                'Informatika S-1',
                'Sistem Informasi S-1'
            ],
            'Fakultas Ekonomi dan Bisnis' => [
                'Akuntansi S-1',
                'Manajemen S-1',
                'Magister Manajemen S-2'
            ],
            'Fakultas Ilmu Sosial dan Ilmu Politik' => [
                'Ilmu Pemerintahan S-1',
                'Ilmu Hubungan Internasional S-1',
                'Magister Hubungan Internasional S-2',
                'Ilmu Hukum S-1',
                'Magister Ilmu Pemerintahan S-2'
            ],
            'Fakultas Kedokteran' => [
                'Pendidikan Dokter S-1',
                'Profesi Dokter',
                'Administrasi Rumah Sakit S-1',
                'Magister Penuaan Kulit dan Estetika S-2'
            ],
            'Fakultas Psikologi' => [
                'Psikologi S-1'
            ],
            'Fakultas Farmasi' => [
                'Farmasi S-1',
                'Profesi Apoteker',
                'Magister Farmasi S-2'
            ],
            'Fakultas Teknologi Manufaktur' => [
                'Teknik Mesin S-1',
                'Teknik Industri S-1',
                'Teknik Metalurgi S-1',
                'Magister Manajemen Teknologi S-2'
            ],
            'Fakultas Kedokteran Gigi' => [
                'Kedokteran Gigi S-1',
                'Profesi Dokter Gigi'
            ],
            'Fakultas Ilmu dan Teknologi Kesehatan' => [
                'Magister Keperawatan S-2',
                'Profesi Ners',
                'Ilmu Keperawatan S-1',
                'Keperawatan D-3',
                'Kesehatan Masyarakat S-1',
                'Teknologi Laboraturium Medis D-4',
                'Teknologi Laboraturium Medis D-3',
                'Kebidanan S-1',
                'Profesi Bidan',
                'Kebidanan D-3',
                'Magister Kesehatan Masyarakat S-2'
            ],
        ];
    }
}
