<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Access_model');
    }

    public function form()
    {
        $this->load->view('access_form');
    }

    public function submit()
    {
        $applicantType = $this->input->post('applicantType');
        $email = $this->input->post('email');
        $keterangan = $this->input->post('keteranganPengajuan');

        // Menambahkan tanggal pengajuan saat ini menggunakan date()
        $data = [
            'applicant_type' => $applicantType,
            'email' => $email,
            'keterangan_pengajuan' => $keterangan,
            'status' => 'pending',
            'tanggal_pengajuan' => date('Y-m-d H:i:s') // Mengisi dengan waktu saat ini
        ];

        // Pengisian data berdasarkan jenis pemohon
        if ($applicantType == 'Mahasiswa') {
            $data['nama_lengkap'] = $this->input->post('nama_lengkap_mahasiswa');
            $data['identity_number'] = $this->input->post('identityNumber_mahasiswa');
            $data['faculty_department'] = $this->input->post('facultyDepartment_mahasiswa');
            $data['program_studi'] = $this->input->post('programStudi_mahasiswa');

            // Proses upload bukti pembayaran
            if (isset($_FILES['payment_proof']) && $_FILES['payment_proof']['error'] === UPLOAD_ERR_OK) {
                $config['upload_path'] = './uploads/';  // Folder upload
                $config['allowed_types'] = 'jpg|jpeg|png|pdf';
                $config['file_name'] = time() . '_' . $_FILES['payment_proof']['name'];  // Menambahkan timestamp ke nama file

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('payment_proof')) {
                    $uploadData = $this->upload->data();
                    $data['payment_proof'] = 'uploads/' . $uploadData['file_name'];  // Simpan path yang benar
                } else {
                    $this->session->set_flashdata('error', 'Gagal mengunggah bukti pembayaran.');
                    redirect('access/form');
                }
            } else {
                $this->session->set_flashdata('error', 'Bukti pembayaran wajib diunggah.');
                redirect('access/form');
            }
        } elseif ($applicantType == 'Dosen' || $applicantType == 'Staff') {
            $data['nama_lengkap'] = $this->input->post('nama_lengkap');
            $data['identity_number'] = $this->input->post('identityNumber');
            $data['faculty_department'] = $this->input->post('facultyDepartment');
            $data['jabatan'] = $this->input->post('jabatan');
        }

        // Memastikan nama lengkap tidak kosong
        if (empty($data['nama_lengkap'])) {
            $this->session->set_flashdata('error', 'Nama lengkap tidak boleh kosong.');
            redirect('access/form');
        } else {
            // Simpan semua data ke dalam database
            if ($this->Access_model->insert_pengajuan($data)) {
                redirect('access/confirmation');
            } else {
                $this->session->set_flashdata('error', 'Gagal menyimpan data.');
                redirect('access/form');
            }
        }
    }

    public function confirmation()
    {
        $this->load->view('access_confirmation');
    }

    public function approval_list()
    {
        $data['pending'] = $this->Access_model->get_pengajuan_by_status('pending');
        $data['approved'] = $this->Access_model->get_pengajuan_by_status('approved');
        $this->load->view('approval', $data);
    }

    public function approve($id)
    {
        $this->Access_model->update_status($id, 'approved');
        redirect('access/approval_list');
    }

    public function reject($id)
    {
        $this->Access_model->update_status($id, 'rejected');
        redirect('access/approval_list');
    }

    public function laporan()
    {
        $data['mahasiswa'] = $this->Access_model->get_pengajuan_by_type('Mahasiswa');
        $data['dosen'] = $this->Access_model->get_pengajuan_by_type('Dosen');
        $data['staff'] = $this->Access_model->get_pengajuan_by_type('Staff');
        $this->load->view('admin_laporan', $data);
    }

    public function hapus_pengajuan($id)
    {
        if ($this->Access_model->delete_pengajuan($id)) {
            redirect('access/approval_list');
        } else {
            show_error('Pengajuan tidak dapat dihapus.');
        }
    }

    public function export_excel()
    {
        require_once APPPATH . 'third_party/PHPExcel/Classes/PHPExcel.php';
        $excel = new PHPExcel();
        $excel->getProperties()->setCreator("Your Name")
            ->setLastModifiedBy("Your Name")
            ->setTitle("Data Pengajuan")
            ->setSubject("Data Pengajuan")
            ->setDescription("Laporan Pengajuan Akses");

        $pendingData = $this->Access_model->get_pengajuan_by_status('pending');
        $approvedData = $this->Access_model->get_pengajuan_by_status('approved');

        $excel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', 'Nama Lengkap')
            ->setCellValue('C1', 'Email')
            ->setCellValue('D1', 'Keterangan')
            ->setCellValue('E1', 'Status');

        $row = 2;
        foreach ($pendingData as $data) {
            $excel->getActiveSheet()->setCellValue('A' . $row, $data['id_KA'])
                ->setCellValue('B' . $row, $data['nama_lengkap'])
                ->setCellValue('C' . $row, $data['email'])
                ->setCellValue('D' . $row, $data['keterangan_pengajuan'])
                ->setCellValue('E' . $row, 'Pending');
            $row++;
        }

        foreach ($approvedData as $data) {
            $excel->getActiveSheet()->setCellValue('A' . $row, $data['id_KA'])
                ->setCellValue('B' . $row, $data['nama_lengkap'])
                ->setCellValue('C' . $row, $data['email'])
                ->setCellValue('D' . $row, $data['keterangan_pengajuan'])
                ->setCellValue('E' . $row, 'Approved');
            $row++;
        }

        $excel->getActiveSheet()->setTitle('Data Pengajuan');
        $excel->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="DataPengajuan.xls"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        $writer->save('php://output');
        exit;
    }
}
